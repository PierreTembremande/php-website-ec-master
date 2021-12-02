<?php
require_once "utils.php";

if (isset($_POST["title"])) {
  $pdo = getPDO();
  $sta = $pdo->query(
    "insert into posts (title, summary, body)"
      . " values "
      . "('" . $_POST["title"] . "',"
      . " '" . $_POST["summary"] . "',"
      . " '" . $_POST["body"] . "')"
  );

  $id = $pdo->lastInsertId();
  redirect("?page=show&id=$id");
}

include "headers.php";
?>
<form method="post" action="">
  <h2>Publication</h2>

  <input type="hidden" name="page" value="add" />

  <p>Titre <input type="text" name="title" /></p>
  <p>Résumé <textarea name="summary"></textarea></p>
  <p>Contenu <textarea name="body"></textarea></p>

  <input type="submit" />
</form>
<?php
include "footers.php";
