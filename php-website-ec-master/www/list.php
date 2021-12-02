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

// Ici la ligne 7 va nous poser problème. 
// Effectivement on utilise directement un query. 
// De plus 
