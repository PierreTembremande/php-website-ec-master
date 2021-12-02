<?php
require_once "utils.php";

if (isset($_FILES["content"])) {
  move_uploaded_file(
    $_FILES["content"]["tmp_name"],
    $_FILES['content']['name']
  );

  redirect("/");
}

include "headers.php";
?>
<form method="post" action="?page=upload" enctype="multipart/form-data">
  <h2>Upload</h2>
  <p>Fichier <input type="file" name="content" /></p>
  <input type="submit" />
</form>
<?php
include "footers.php";
