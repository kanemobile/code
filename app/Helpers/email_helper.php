<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

use PHPMailer\PHPMailer\PHPMailer;

if (!function_exists('sendEmail')) {

    function sendEmail($to, $subject, $body) {
//        $tabDate = explode('/', $date);
//        $date = $tabDate[2] . '-' . $tabDate[1] . '-' . $tabDate[0];
//        $date = date('Y-m-d', strtotime($date));
//        return $date;

        $mail = new PHPMailer(true);
        // Server settings
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'mail.sidel@uadb.edu.sn';
        $mail->Password = 'merciuadb';
        // Sender &amp; Recipient
        $mail->From = 'mail.sidel@uadb.edu.sn';
        $mail->FromName = 'CRI';
        $mail->addAddress($to);
        // Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject = $subject;
        //$body = 'This is a test message sent by <b>Online Web Tutor</b>';
        $mail->Body = $body;

        //dd($mail);

        if ($mail->send()) {

//            echo 'Mail sent successfully';
//            exit;
            return true;
        } else {

//            echo 'Failed to send email';
//            exit;
            return false;
        }
    }

}