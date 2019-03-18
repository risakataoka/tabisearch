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
          ->from($this->user->email)
          ->from_name($this->user->name)
          ->subject('サイトからのお問い合わせ')
          ->type($this->user->type)
          ->gender($this->user->gender)
          ->body($this->user->body)
          ->view('emails.contactFromUser');
    }
}
