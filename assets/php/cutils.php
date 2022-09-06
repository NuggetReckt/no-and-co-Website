<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/**
 * @property $user_mail
 * @property $obj
 * @property $msg
 */
class CUtils
{
    //public string $admin_mail = "noel.morrow@no-and-co.com";
    public string $admin_mail = "corto.morrow@gmail.com";
    public string $auto_mail = "no-reply@no-and-co.com";

    public function mail_sender($user_mail, $obj, $msg): void
    {
        $this->user_mail = $user_mail;
        $this->obj = $obj;
        $this->msg = $msg;

        $mailer1 = new PHPMailer(true);
        //$mailer2 = new PHPMailer(true);

        //$username = $this->auto_mail;
        $username = "corto.m@noskillworld.fr";
        $host = "mail49.lwspanel.com"; //to be filled
        $passwd = "Upk6d7sx"; //to be filled
        $port = 465;

        if (!($user_mail == null && $obj == null && $msg == null)) {

            try {
                $mailer1->SMTPDebug = SMTP::DEBUG_SERVER;
                //$mailer2->SMTPDebug = SMTP::DEBUG_SERVER;
                $mailer1->isSMTP();
                //$mailer2->isSMTP();
                $mailer1->Host = $host;
                //$mailer2->Host = $host;
                $mailer1->SMTPAuth = true;
                //$mailer2->SMTPAuth = true;
                $mailer1->Username = $username;
                //$mailer2->Username = $username;
                $mailer1->Password = $passwd;
                //$mailer2->Password = $passwd;
                $mailer1->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                //$mailer2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mailer1->Port = $port;
                //$mailer2->Port = $port;

                $mailer1->setFrom($username);
                //$mailer2->setFrom($this->auto_mail);
                $mailer1->addAddress($this->admin_mail);
                //$mailer2->addAddress($this->user_mail);

                $mailer1->isHTML(true);
                //$mailer2->isHTML(true);
                $mailer1->Subject = $obj;
                //$mailer2->Subject = "Récapitulatif de votre message:". $obj;
                $mailer1->Body = $this->setAdminBody();
                //$mailer2->Body = $this->setUserBody();

                $mailer1->send();
                //$mailer2->send();
                header("Location: contact.php?mail_sent");
            } catch (Exception $e) {
                header("Location: contact.php?error");
                //echo "Message could not be sent. Mailer Error: {$mailer1->ErrorInfo}";
            }
        } else {
            //Les champs ne peuvent pas être vides !
            header("Location: contact.php?error=2");
        }
    }

    public function setAdminBody(): string
    {
        return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml' lang='fr'>
<head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap' rel='stylesheet'>
    <title>mail</title>
</head>
<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'
      style='text-align: center; color: white; font-family: Roboto Condensed, sans-serif'>
<table bgcolor='#1a1a1a' width='100%' border='0' cellpadding='0' cellspacing='0'>
    <tbody>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <a href='https://no-and-co.com'>
                <img src='https://no-and-co.com/no-and-co_files/logo.png' alt='logo' width='350'>
            </a>
        </td>
    </tr>
    <tr>
        <td height='10'>&nbsp;</td>
    </tr>
    <tr>
        <td style='font-size: 35px; color: #1394C3'>
            Nouveau message !
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <span style='color: #1394C3'>De :</span> $this->user_mail
        </td>
    </tr>
    <tr>
        <td>
            <span style='color: #1394C3'>Objet :</span> $this->obj
        </td>
    </tr>
    <tr>
        <td>
            <div style='margin: 0 20vw'>
                <span style='color: #1394C3'>Message :</span><br>
                $this->msg
            </div>
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            Copyright © No&Co 2022
            <br>
            Développé avec ❤ par Corto Morrow
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    </tbody>
</table>
</body>
</html>";
    }

    public function setUserBody(): string
    {
        return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml' lang='fr'>
<head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap' rel='stylesheet'>
    <title>mail</title>
</head>
<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'
      style='text-align: center; color: white; font-family: Roboto Condensed, sans-serif'>
<table bgcolor='#1a1a1a' width='100%' border='0' cellpadding='0' cellspacing='0'>
    <tbody>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <a href='https://no-and-co.com'>
                <img src='https://no-and-co.com/no-and-co_files/logo.png' alt='logo' width='350'>
            </a>
        </td>
    </tr>
    <tr>
        <td height='10'>&nbsp;</td>
    </tr>
    <tr>
        <td style='font-size: 35px; color: #1394C3'>
            Récapitulatif de votre message
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <span style='color: #1394C3'>Objet :</span> $this->obj
        </td>
    </tr>
    <tr>
        <td>
            <div style='margin: 0 20vw'>
                <span style='color: #1394C3'>Votre message :</span><br>
                $this->msg
            </div>
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <span style='color: #1394C3'>Merci pour votre message !</span><br>
            <span style='color: #1394C3'>Vous aurez une réponse dans les plus brefs délais.</span>
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    <tr>
        <td>
            Copyright © No&Co 2022
            <br>
            Développé avec ❤ par Corto Morrow
        </td>
    </tr>
    <tr>
        <td height='30'>&nbsp;</td>
    </tr>
    </tbody>
</table>
</body>
</html>";
    }
}