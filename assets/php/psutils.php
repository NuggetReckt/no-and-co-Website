<?php

class PsUtils
{
    function get_files(): void
    {
        $username = $_SESSION['user'];

        $dir = dir("/users/$username");

        if (is_dir($dir)) {
            $do = opendir($dir);

            while (($file = readdir($do)) !== false) {
                echo "file: $file \n, type: ", filetype($dir . $file), "\n";
            }
            closedir($do);
        }
        /*else  {
            echo "            <div class='pop-up-message' id='pop-up-fail'>\n";
            echo "                <span>Les fichiers sont inexistants ou le dossier n'existe pas. Veuillez contacter un administrateur.</span>\n";
            echo "            </div>\n";
        }*/
    }
}
