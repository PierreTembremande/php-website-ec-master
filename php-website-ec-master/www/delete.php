<?php
require_once "utils.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $pdo = getPDO();
  $sta = $pdo->query("delete from posts where id = '$id'");
  redirect("/");
}
