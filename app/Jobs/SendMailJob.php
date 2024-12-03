<?php

namespace App\Jobs;

use App\Models\SentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = env('MAIL_PORT');
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($this->data['from'], 'Mailer');
            $mail->addAddress($this->data['to']);
            if (!empty($this->data['cc'])) {
                $mail->addCC($this->data['cc']);
            }
            $mail->Subject = $this->data['subject'];
            $mail->Body    = $this->data['body'];

            $mail->send();
            Log::info('Email has been sent successfully.');

        } catch (Exception $e) {
            Log::error('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }

    public function getJobId()
    {
        // TODO: Implement getJobId() method.
    }

    public function getRawBody()
    {
        // TODO: Implement getRawBody() method.
    }
}
