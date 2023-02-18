<?php

function getViewHomePage()
{
    require_once __DIR__ . './../templates/homePageTemp.php';
}

function loginOrRegister()
{
    if (!isset($_SESSION['pseudo']) && empty($_SESSION['pseudo'])) {
        $btnLogin = "<a href=\"./?action=login\" class=\"button\">Se connecter</a>";
        $btnregister = "<a href=\"./?action=register\" class=\"button\">S'inscrire</a>";
    }
    return $btnLogin . $btnregister;
}

function getViewPublication()
{
    if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
        require_once __DIR__ . './../view/publicationView.php';
    }
}


