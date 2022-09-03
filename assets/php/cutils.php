<?php

/**
 * @property $user_mail
 * @property $obj
 * @property $msg
 */

class CUtils
{
    public string $admin_mail = "noel.morrow@no-and-co.com";

    public function mail_sender($user_mail, $obj, $msg): void
    {
        $this->user_mail = $user_mail;
        $this->obj = $obj;
        $this->msg = $msg;

        if (!($user_mail == null && $obj == null && $msg == null)) {

            $msg_formatted_admin = "
            <body>
            <p id='mail-msg'>$msg</p>
            
            <style>
            body {
            background-color: #1a1a1a;
            margin: 0 100px;
            text-align: center;
            }
            #mail-msg {
            color: white;
            font-family: police_custom, sans-serif;
            }
            
            @font-face {
            font-family: police_custom;
            src: url('../fonts/MusticaPro-SemiBold.otf') format('opentype');
            }
            </style>
            </body>
            ";

            $msg_formatted_user = "";

            $headers = "From: no-reply@no-and-co.com";
            $headers .= "Content-Type: text/html; charset=utf-8";

            //the mail the admin receives
            mail($this->admin_mail, $obj, $msg_formatted_admin, $headers);
            //the mail the user receives
            mail($user_mail, $obj, $msg_formatted_user, $headers);

        } else {
            //Les champs ne peuvent pas être vides !
            header("Location: login.php?error=2");
        }
    }
}