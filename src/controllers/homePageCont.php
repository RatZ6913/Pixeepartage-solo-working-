<?php

function getViewHomePage()
{
    if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])) {

        require_once __DIR__ . './../templates/homePageConnectTemp.php';
    } else {
        require_once __DIR__ . './../templates/homePageTemp.php';
    }
}


