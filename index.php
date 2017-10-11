<?php
	include 'includes/fonctions.php';
	include 'includes/session.php';
  include 'includes/constantes.php';
  include './includes/identifiants.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Site du Savoir | SiteduSavoir.com </title>
  <meta charset="UTF-8"/>
  <meta name="description" content="Site du Savoir , Une nouvelle communauté de programmeur sympatique, partages de connaissances et astuces"/>
  <meta name="author" content="MalnuxStarck"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="icon" href="sitedusavoir.png" type="image/png"/>
</head>

  <?php
      if(isset($_SESSION['level'],$_SESSION['id'],$_SESSION['pseudo']))
      {
        $lvl = (int)$_SESSION['level'];
        $id =  (int)$_SESSION['id'];
        $pseudo = $_SESSION['pseudo'];
      }
      else
      {
        $lvl = 1;
        $id = 0;
        $pseudo = '';
      }


      spl_autoload_register('chargerClass');

      include_once './includes/menu.php' ;
      $managerMembre->reconnected_from_cookie();

      /* Qui est en ligne */

      $ip = ip2long($_SERVER['REMOTE_ADDR']);
      $memberDatas= array("online_id" => $id , "online_ip" => $ip);
      $memberOnline = new WhoIsOnline($memberDatas);

      $managerWhosIsOnline = new ManagerWhoIsOnline($bdd);
      $managerWhosIsOnline->updateWhoIsOnline($memberOnline);
      $managerWhosIsOnline->deleteWhoIsOnline();


  ?>

         <ul class="fildariane">
            <li><a href="../index.php">Accueil</a></li>
         </ul>
        <div class="page">
          <h1 class="titre"> Bienvenue sur le Site du Savoir </h1>

          <ul class="presentation">
            <li class="presentation__block">
              <a class="presentation__link" href="" alt="">Forum</a>
              <p class="presentation__text">
                Le Forum est la partie la plus communataire.  elle permet au membre du site d'y discuter, chercher de l'aide, proposer des modifications, signaler des bugs.Plusieurs forum y sont present: On en trouve un forum dedies pour les jeux videos, un forum general, et un forum dedie a l'informatique.
              </p>
            </li>
            <li class="presentation__block">
              <a class="presentation__link" href="" alt="">Tutos</a>
              <p class="presentation__text">
                Venez nous apprendre des nouvelles choses, que vous soyez informaticien ou non, vous possedez peut etre un domaine que vous maitrisez, venez nous en faire profiter. Partager votre savoir et aider les autres a s'ameliorer.
              </p>
            </li>
            <li class="presentation__block">
              <a class="presentation__link" href="" alt="">Blog</a>
              <p class="presentation__text">
                Le blog est une autre partie du site tres importante. Elle permet de vous tenir au courant de l'activites du site. Entre autres les nouvelles fonctionnalites apporte, les propositions d'amelioration, et notament les sortis de s versions du sites.
              </p>
            </li>
            <li class="presentation__block">
              <a class="presentation__link" href="" alt="">Social</a>
              <p class="presentation__text">
                Social, Reseau social tres basique, sans aucune pretention, vous pouvez faires des statuts, des publications, partages votre humeurs vos photos. Vous pouvez creer des groupes, les administrer, ajouter d'autres administrateurs, publier du contenu.
              </p>
            </li>
          </ul>
        </div>
     <?php
         include  "./includes/footer.php";
      ?>

</body>
</html>
