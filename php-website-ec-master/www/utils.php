<?php

function redirect($url)
{
  http_response_code(302);
  header('Location: ' . $url);
}

function getPDO()
{
  $config = parse_ini_file("config.ini", TRUE);

  return new PDO(
    "mysql" .
      ":dbname=" . $config["database"]["database"] .
      ";host="   . $config["database"]["hostname"],
    $config["database"]["username"],
    $config["database"]["password"],
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  );
}

define("CODE_SECRET", 13);

// faille détecté ligne 25
// Il faudrait stocker le 13 dans une base de donnée et l'appeler de cette dernière.
// define("CS",random()); Ne fonctionnerait pas.Problème de récupération de la clè.
// Mieux vaut utiliser le hacshage avec du salage.
// (SHA-256/512 ou alors SHA3).
// la ligne 25 ne devrais pas être dans l'application.

function code($data)
{
  return shell_exec("./codage " . CODE_SECRET . " '$data'");
}

// ligne 35, sensible aux injections de commandes.
// execute une commande systéme prenant en compte une entree utilisateur.
// HAUTEMENT DANGEREUX !!
// Une solution est d'utiliser une méthode php mais peut poser des problèmes de performances.
// Une autre est d'assainir l'entrée utilisateur avec par exemple des expressions régulières.

function setUser($user)
{
  setcookie("user", serialize($user));
}

function getUser()
{
  if (!isset($_COOKIE["user"])) {
    return null;
  }
  return unserialize($_COOKIE["user"]);
}
