<?php
require_once "utils.php";

$page = "list";
if (isset($_GET["page"])) {
  $page = $_GET["page"];
}

require "./$page.php";
