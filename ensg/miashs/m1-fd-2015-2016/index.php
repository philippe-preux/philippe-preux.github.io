<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <title>Algorithmes fondamentaux de fouille de données, 
    master 1 MIASHS, Université de Lille 3</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css"
    href="./ma.css" media="all" />
  <link rel="shortcut icon" type="image/x-icon" 
	href="http://www.grappa.univ-lille3.fr/~ppreux/img/site.ico" />
</head>

<body vlink="#551A8B">

<div class="ensg">
<div class="titreDuModule">
  Algorithmes fondamentaux de fouille de données
</div>
<div class="formation">
  Master MIASHS<br/>
  Université de Lille 3<br/>
  Semestre 1
</div>

<ul>
  <li><a href="#obj">Objectifs de ce module</a></li>
  <li><a href="#calendrier">Calendrier</a></li>
  <li><a href="#tps">Mise en pratique</a></li>
  <li><a href="#cc">Contrôle de connaissances</a></li>
</ul>

<h3 id="obj">Objectifs de ce module</h3>

<p>

Ce module a pour objectif de présenter le processus de fouille de données, d'en étudier les concepts et méthodes fondamentales et leur mise en application.

<br/>

Ce module est en deux parties, l'une enseignée par Christos Dimitrakakis, l'autre par moi-même.

</p>


<h3 id="calendrier">Calendrier</h3>

<p>

Mes séances se déroulent le mardi matin et le vendredi après-midi, en début de semestre.

</p>

<h3 id="tps">Mise en pratique</h3>

<p>

La mise en pratique se fait dans l'environnement R.

</p>

<ul>
  <li>Introduction à R&nbsp;: <a href="tps/introduction-a-R/">partie I</a>, <a href="tps/introduction-a-R/index2.php">partie II</a>.
<?php
  if (time () <= strtotime("1 June 2016")) {
    echo ("<a href='tps/introduction-a-R/index2.avec-corrections.php'>Correction de la partie II</a>");
  }
?>
  </li>
  <li>Optionnel&nbsp;: <a href="tps/graphiques/graphiques-libres.php">Si vous avez fini les deux parties du TP d'introduction à R (et seulement dans ce cas-là).</a></li>
  <li><a href="tps/graphiques/">Faire des graphiques</a>.
<?php
  if (time () <= strtotime ("1 June 2016")) {
    echo ("<a href='tps/graphiques/index.avec-corrections.php'>Correction</a>");
  }
?>
  </li>
  <li>Optionnel&nbsp;: <a href="http://www.grappa.univ-lille3.fr/~ppreux/ensg/aeac/tps/bandits/">Si vous avez fini les trois TP précédents (et seulement dans ce cas-là).</a></li>
  <li><a href="tps/clustering/">Le <i>clustering</i></a>.
<?php
  if (time () <= strtotime ("1 June 2016")) {
    echo ("<a href='tps/clustering/index.avec-corrections.php'>Correction</a>");
  }
?>
</li>
  <li><a href="http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/segmentation-hierarchique">Le <i>clustering</i> hiérarchique</a>.
<?php
  if (time () <= strtotime ("1 June 2016")) {
    echo ("<a href='http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/fouilleDeDonneesII/tp/segmentation-hierarchique/index.avec-corrections.php'>Correction</a>");
  }
?>
</li>
  <li>Optionnel&nbsp;: <a href="tps/clustering/tp-libre.php">Si vous avez fini les deux parties du TP de clustering (et seulement dans ce cas-là).</a></li>
  <li><a href="./tps/acp">Une méthode de projection&nbsp;: l'analyse en composante principale</a></li>
<!-- 
     spectral
     kohonen
     ACP
     MDS
-->
  <!--li><a href="tps/projection/">Projection</a></li-->
  <!--li><a href="tps/rassoc/">Règles d'association</a></li-->
  <!--li><a href="tps/"></a></li-->
</ul>

<h3 id="cc">Contrôle de connaissances</h3>

<p>

Le contrôle est continu. Il est constitué de 2 notes, une par partie du cours (Ch. Dimitrakakis et moi-même). 

<br/>
<br/>

Le contrôle sur ma partie de cours aura lieu&nbsp;:

</p>

<ul>
  <li>le jeudi 19 novembre de 10h à 11h30 pour les SCE. 
<!--?php
  if (time () <= strtotime ("10 June 2016 10:00:00")) {
    echo ("<a href='http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/m1/tps/cc/cca.correction.2015.pdf'>Correction</a>");
  }
?-->
<!--?php
  if (time () >= strtotime ("19 November 2015 10:00:00")) {
    echo ("<a href='http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/m1/tps/cc/cca.Prenom.Nom.2015.odt'>le sujet est là</a>");
  }
?-->
</li>
  <li>le vendredi 20 novembre de 13h30 à 15h pour les Stat et WA.
<!--?php
  if (time () <= strtotime ("10 June 2016 13:30:00")) {
    echo ("<a href='http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/m1/tps/cc/ccb.correction.2015.pdf'>Correction</a>");
  }
?-->
  </li>
  <li>session 2&nbsp;: le lundi 6 juin de 9h à 11h.
<!--?php
  if (time () >= strtotime ("6 June 2016 9:00:00")) {
    echo ("<a href='http://www.grappa.univ-lille3.fr/~ppreux/ensg/miashs/m1/session2.Prénom.Nom.odt'>le sujet est là</a>");
  }
?-->
  </li>
</ul>

<p>

Tout document autorisé.

</p>

<hr/>

<p>

<font size="-1">
  <a href="http://www.grappa.univ-lille3.fr/~ppreux">Retour à ma page web.</a>
</font>

<br/>

<a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.grappa.univ-lille3.fr/~ppreux/img/valid-xhtml10"
       alt="Valid XHTML 1.0!" height="15" width="44" />
</a>

<a href="http://jigsaw.w3.org/css-validator/">
  <img style="border:0;width:44px;height:15px"
       src="http://www.grappa.univ-lille3.fr/~ppreux/img/vcss" 
       alt="Valid CSS!" />
</a>
</p>

</div>

</body>
</html>
