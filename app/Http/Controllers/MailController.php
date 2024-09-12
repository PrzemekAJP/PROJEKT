<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    // Metoda wysyłająca e-mail
    public function sendEmail(Request $request)
    {
        // Dane z formularza
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Konfiguracja serwera SMTP
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST'); // Host SMTP z pliku .env
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME'); // E-mail z pliku .env
            $mail->Password = env('MAIL_PASSWORD'); // Hasło z pliku .env
            $mail->SMTPSecure = env('MAIL_ENCRYPTION'); // Szyfrowanie z pliku .env
            $mail->Port = env('MAIL_PORT'); // Port SMTP z pliku .env

            // Ustawienia nadawcy i odbiorcy
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); // Adres i nazwa nadawcy z pliku .env
            $mail->addAddress($email); // Email odbiorcy

            // Treść wiadomości
            $mail->isHTML(true); // Format wiadomości w HTML
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Wysyłanie wiadomości
            $mail->send();
            return back()->with('success', 'Wiadomość została wysłana!');
        } catch (Exception $e) {
            return back()->with('error', 'Nie udało się wysłać wiadomości. Błąd: ' . $mail->ErrorInfo);
        }
    }
}