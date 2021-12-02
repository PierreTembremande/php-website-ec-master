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

function code($data)
{
  return shell_exec("./codage " . CODE_SECRET . " '$data'");
}

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
