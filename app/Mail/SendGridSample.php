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

    public function build()
    {
        return $this
            ->view('auth.email.pre_register')
            ->subject('subject')
            ->from('from@example.com')
            ->to('risakataoka6@gmail.com')
            ->sendgrid([
                'personalizations' => [
                    [
                        'substitutions' => [
                            ':myname' => 's-ichikawa',
                        ],
                    ],
                ],
            ]);
    }
}
