<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ContactController extends Controller
{
    public function submit()
    {
        $email = \Config\Services::email();
        $request = \Config\Services::request();

        $emailConfig = new \Config\Email();

        $email->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
        $email->setTo('jeneallevalenin@gmail.com'); // Receiver email

        $email->setSubject('New Contact Information');

        $message = '
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
            <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Contact Form Information</h2>
            <p><strong>Name:</strong> ' . htmlspecialchars($request->getPost("name")) . '</p>
            <p><strong>Email:</strong> <a href="mailto:' . htmlspecialchars($request->getPost("email")) . '">' . htmlspecialchars($request->getPost("email")) . '</a></p>
            <p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($request->getPost("message"))) . '</p>
            <p style="text-align: center; font-size: 14px; color: #888;">
                <em>This message was sent from your website contact form.</em>
            </p>
        </div>';

        $email->setMessage($message);

        if ($email->send()) {
            return redirect()->to(base_url('contact'))->with('success', 'Message sent successfully!');
        } else {
            return redirect()->to(base_url('contact'))->with('error', 'Failed to send message. Please try again.');
        }
    }
}