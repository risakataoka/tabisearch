<?
namespace App\Mail;
use Sichikawa\LaravelSendgridDriver\SendGrid;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendGridSample extends Mailable
{
    use SendGrid;
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
      return $this
          ->to($this->user->email)
          ->from('tabisearch@example.com')
          ->subject('【site】仮登録が完了しました')
          ->view('auth.email.pre_register')
          ->with(['token' => $this->user->email_verify_token,]);
    }
}
// $from     = new Email('From名', 'abc@gmail.com');
// $to       = new Email('to名', 'risakataoka6@gmail.com');
// $subject  = 'テストタイトル';
// $content  = new Content(
//     'text/plain',
//     'テスト本文'
// );
// $mail     = new Mail($from, $subject, $to, $content);
// $sendGrid = new \SendGrid(env("SENDGRID_API_KEY"));
// \Debugbar::info(env("SENDGRID_API_KEY"));
// $response = $sendGrid->client->mail()->send()->post($mail);
// \Debugbar::info($response);
