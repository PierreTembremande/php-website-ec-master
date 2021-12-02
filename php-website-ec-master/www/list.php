<?php
require_once "utils.php";

include "headers.php";

$pdo = getPDO();
$posts = $pdo->query("select * from posts order by id desc");

foreach ($posts as $post) {
  $id = $post["id"];
  echo '<h2>' . $post["title"] . "</h2>";
  echo $post["summary"];
  echo '<p><a href="?page=show&id=' . $id . '">en savoir plus</a></p>';
}

include "footers.php";

// ligne 7 ne pas utiliser de "select *".
// choisir les champs voulues.
