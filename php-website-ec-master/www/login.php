<?php
if (isset($_GET["username"])) {
  $username = $_GET["username"];
  $password = code($_GET["password"]);

  $pdo = getPDO();
  $sta = $pdo->query("select * from user where"
    . " username = '$username' and"
    . " password = '$password'");
  $res = $sta->fetch();
  if ($res !== false) {
    setUser($res);
    redirect($_SERVER['HTTP_REFERER']);
  }
}
// ligne 7 "select *" =mauvaise pratique.
// $username et $ password, directement mis dans la requête.
// Pose problème car pas de validation ni d'aissinisement.
// Risque d'injection SQL.
// Il faut donc utiliser des requêtes préparées.

include "headers.php";
?><form method="get" action="">
  <h2>Connexion</h2>
  <input type="hidden" name="page" value="login" />
  <p>Nom utilisateur <input type="text" name="username" /></p>
  <p>Mot de passe <input type="password" name="password" /></p>
  <input type="submit" />
</form>
<?php
include "footers.php";
