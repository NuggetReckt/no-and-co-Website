<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once "database/secrets.php";

/**
 * @property $user_mail
 * @property $obj
 * @property $msg
 */
class CUtils
{
    private string $admin_mail = ADMIN_MAIL;
    private string $auto_mail = AUTO_MAIL;
    private string $passwd = ADMIN_PASS;
    private string $host = "localhost";
    private int $port = 465;

    public function __construct()
    {
        ini_set("default_charset", "UTF-8");
    }

    public function mail_sender($user_mail, $obj, $msg): void
    {
        $this->user_mail = $user_mail;
        $this->obj = $obj;
        $this->msg = $msg;


        $mailer1 = new PHPMailer(true);

        if (!($user_mail == null && $obj == null && $msg == null)) {
            try {
                $mailer1->SMTPDebug = SMTP::DEBUG_SERVER;
                $mailer1->isSMTP();
                $mailer1->Host = $this->host;
                $mailer1->SMTPAuth = true;
                $mailer1->Username = $this->auto_mail;
                $mailer1->Password = $this->passwd;
                $mailer1->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mailer1->Port = $this->port;
                $mailer1->setFrom($this->auto_mail);
                $mailer1->addAddress($this->admin_mail);
                $mailer1->isHTML();
                $mailer1->Subject = $obj;
                $mailer1->Body = $this->setAdminBody();

                //$mailer2->SMTPDebug = SMTP::DEBUG_SERVER;
                //$mailer2->isSMTP();
                //$mailer2->Host = $this->host;
                //$mailer2->SMTPAuth = true;
                //$mailer2->Username = $this->username;
                //$mailer2->Password = $this->passwd;
                //$mailer2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                //$mailer2->Port = $this->port;
                //$mailer2->setFrom($this->auto_mail);
                //$mailer2->addAddress($this->user_mail);
                //$mailer2->isHTML();
                //$mailer2->Subject = "Récapitulatif de votre message:". $obj;
                //$mailer2->Body = $this->setUserBody();

                $mailer1->send();
                //$mailer2->send();

                header("Location: contact.php?mail_sent");
            } catch (Exception $e) {
                header("Location: contact.php?error");
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