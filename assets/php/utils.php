<?php

class Utils
{
    function Project($projectname, $link, $desc, $day, $month, $annee): void
    {

        $date = new DateTime();
        $date->setDate($annee, $month, $day);

        echo "\n        <div class='project-content'>\n";
        echo "            <a href='$link'><h2 class='title-project'>$projectname</h2></a>\n";
        echo "            <p class='desc-project'>$desc</p>\n";
        echo "            <span class='date-project'>Le ";
        echo $date->format('d/m/Y'), "</span>";
        echo "\n        </div>\n";
    }
}