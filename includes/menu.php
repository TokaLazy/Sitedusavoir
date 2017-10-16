<?php

if (session_status() == PHP_SESSION_NONE)
{
  session_start();
}

$managerMembre = new ManagerMembre($bdd);

$donnees = $managerMembre->infosMembre($id);
$membre  = new Membre($donnees);

$avatar = $membre->avatar();

?>

<body>
  <header class="header">
    <h1 class="header__logo"><a href="./index.php">Site du Savoir</a></h1>

    <nav class="header__nav">
      <a href="../forum/index.php">Forum</a>
      <a href="../tutoriels/index.php">Tutoriels</a>
      <a href="../blog/index.php">Blog</a>
    </nav>

    <form class="header__search" action="../search.php" method="get">
      <div class="header__search-bar">
        <input type="text" name="q" placeholder="Rechercher">
        <button type="submit">
          <img src="../images/icones/search.png" alt="">
        </button>
      </div>
    </form>

    <?php if (!$id) : ?>

    <ul class="header__subscribe">
      <li><a href="../register.php">S'inscrire</a></li>
      <li><a href="../connexion.php">Se connecter</a></li>
    </ul>

    <?php else : ?>

    <ul class="header__member">
      <li class="header__avatar">
        <a href="../membre/voirmonprofil.php?id=<?=$id?>">
          <img src="../images/avatars/<?=$avatar?>" alt="avatar">
        </a>
        <div class="header__menu">
          <ul>
            <li><a href="../membre/editerprofil.php?id=<?=$id?>">Parametres</a></li>
            <li><a href="../membre/amis.php">Amis</a></li>
            <li><a href="../membre/messagesprives.php">Messages</a></li>
            <li><a href="../membre/notifications.php">Notiffications</a></li>
            <li><a href="../membre/mescontenus.php">Mes Contenus</a></li>
            <li><a href="../deconnexion.php">Se deconnecter</a></li>
          </ul>
        </div>
      </li>
    </div>

    <?php endif; ?>

  </header>

  <?php if (isset($_SESSION['flash'])) : ?>
    <?php foreach ($_SESSION['flash'] as $key => $message) : ?>
      <div class="alert-<?=$key?>">
        <?=$message?>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

<?php

unset($_SESSION['flash']);
