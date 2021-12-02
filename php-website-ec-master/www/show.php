<?php
require_once "utils.php";

include "headers.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  $pdo = getPDO();
  $sta = $pdo->query("select * from posts where id = '$id'");
  $row = $sta->fetch();

  if ($row != false) {
    echo '<h2>' . $row["title"] . '</h2>';
    echo '<div class="summary">' . $row["summary"] . '</div>';
    echo $row["body"];
  }

  if (getUser() != null) {
    echo '<p><a href="?page=delete&id=' . $id . '">supprimer</a></p>';
  }
}

include "footers.php";
