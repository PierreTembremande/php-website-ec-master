<html>

<head>
  <title>The Blog</title>
</head>

<body>
  <h1><a href="/">The Blog</a></h1>
  <?php if (getUser() != null) { ?>
    <a href="?page=logout">Se Déconnecter</a>
    <a href="?page=add">Publier</a>
    <a href="?page=upload">Upload</a>
  <?php } else { ?>
    <a href="?page=login">Se connecter</a>
  <?php } ?>