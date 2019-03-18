<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Contact;
use SendGrid\Content;
use SendGrid\Email;
use SendGrid\Mail;
use App\Mail\SendGridSample;

class ContactsController extends Controller
{
  public function index()
  {
      $types = Contact::$types;
      $genders = Contact::$genders;

      return view('contacts.index', compact('types', 'genders'));
  }

  public function confirm(ContactRequest $request)
  {
      $contact = new Contact($request->all());

      // 「お問い合わせ種類（checkbox）」を配列から文字列に
      $type = '';
      if (isset($request->type)) {
        $type = implode(', ',$request->type);
      }

      return view('contacts.confirm', compact('contact', 'type'));
  }

  public function complete(ContactRequest $request)
  {
    $input = $request->except('action');

    if ($request->action === '戻る') {
        return redirect()->action('ContactsController@index')->withInput($input);
    }

    // チェックボックス（配列）を「,」区切りの文字列に
    if (isset($request->type)) {
        $request->merge(['type' => implode(', ', $request->type)]);
    }

    // データを保存
    Contact::create($request->all());

    // 二重送信防止
    $request->session()->regenerateToken();
    // 送信メール
    $from     = new Email('tabisearch', 'tabisearch@example.com');
    $to       = new Email($request->name, $request->email);
    $subject  = 'お問い合わせありがとうございました。';
    $content = new Content(
        'text/html',
        'お問い合わせを受付いたしました。'
    );
    $mail     = new Mail($from, $subject, $to,$content);
    $sendGrid = new \SendGrid(env("SENDGRID_API_KEY"));
    \Debugbar::info($mail);
    $response = $sendGrid->client->mail()->send()->post($mail);
    \Debugbar::info($from,$to,$subject,$response,$content);

    // 受信メール
    $from     = new Email($request->name, $request->email);
    $to       = new Email('サイト運営者', 'risakataoka6@gmail.com');
    $subject  = 'サイトからのお問い合わせ。';
    $sendData = ['from'=>$request->email, 'from_name'=>$request->name, 'subject'=>'サイトからのお問い合わせ', 'type'=>$request->type,
    'gender'=>$request->gender, 'body'=>$request->body];
    $content = new Content(
        'text/html',
          view('emails.contactFromUser', $sendData)->render()
    );
    $mail     = new Mail($from, $subject, $to,$content);
    $sendGrid = new \SendGrid(env("SENDGRID_API_KEY"));
    \Debugbar::info($mail);
    $response = $sendGrid->client->mail()->send()->post($mail);
    \Debugbar::info($from,$to,$subject,$response,$content);

    // // 送信メール
    // \Mail::send(new \App\Mail\Contact([
    //     'to' => $request->email,
    //     'to_name' => $request->name,
    //     'from' => 'from@example.com',
    //     'from_name' => 'MySite',
    //     'subject' => 'お問い合わせありがとうございました。',
    //     'type' => $request->type,
    //     'gender' => $request->gender,
    //     'body' => $request->body
    // ],'to'));
    //
    // // 受信メール
    // \Mail::send(new \App\Mail\Contact([
    //     'to' => 'kataoka@gmail.com',
    //     'to_name' => 'MySite',
    //     'from' => $request->email,
    //     'from_name' => $request->name,
    //     'subject' => 'サイトからのお問い合わせ',
    //     'type' => $request->type,
    //     'gender' => $request->gender,
    //     'body' => $request->body
    // ], 'from'));
    return view('contacts.complete');
  }


}
