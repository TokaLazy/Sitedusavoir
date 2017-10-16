<?php

$count_online = 0;

//Décompte des visiteurs

$managerWhoIsOnline = new ManagerWhoIsOnline($bdd);
$count_visiteurs = $managerWhoIsOnline->nombresDeVisiteursEnLigne();

//Décompte des membres

$texte_a_afficher = "<br />Liste des personnes en ligne : ";

$membresEnLigneEtMessage = $managerWhoIsOnline->nombresDeMembresEnLigne();
$count_membres = $membresEnLigneEtMessage["nombre"] ;

$count_online = $count_visiteurs + $count_membres;
$texte_a_afficher .= $membresEnLigneEtMessage["texte_a_afficher"];

?>

<footer class="footer">
  <div class="footer__online">
    <h2 class="footer__title">Qui est en ligne ?</h2>
    <p>
      Il y a actuellement <?=$count_online?> connectés, dont <?=$count_membres?> membres et <?=$count_visiteurs?> invités <?=$texte_a_afficher?>
    </p>
  </div>
  <div class="footer__about">
    <h2 class="footer__title">Site du Savoir</h2>
    <p>
      Site du Savoir est un projet opensource c'est a dire libre, tout le monde peut y participer. Il consiste a reunir les pogrammers du monde et a s'entraider entre eux via le site.
    </p>
  </div>
  <div class="footer__contact">
    <h2 class="footer__title">Me contacter</h2>
    <ul>
      <li><a href="https://www.facebook.com/abdoulmalikhamidou">Facebook</a></li>
      <li><a href="https://twitter.com/AbdoulMalikH">Twitter</a></li>
      <li><a href="https://github.com/malnuxstarck">Github</a></li>
      <li><a href="http://malnuxstarck.alwaysdata.net">Siteperso</a></li>
    </ul>
  </div>
  <div class="footer__copyright">
    Site du Savoir Tous droits reservés &copy copyright <?=date('Y')?>
  </div>
</footer>
