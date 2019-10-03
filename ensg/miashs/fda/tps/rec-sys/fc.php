<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Recommandation par filtrage collaboratif</title>
  <link href="./ma.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<div class="tpR">
<h1>Recommandation par filtrage collaboratif</h1>

<p>

L'objectif est de mettre en pratique ce qui a été vu en cours
concernant la factorisation de matrices dans le cadre des systèmes de
notation de produits.

</p>

<h2 id="PbEtDonnees">Le problème et les données</h2>

<h3 id="Pb">Le problème</h3>

<p>

On va travailler avec des données issues du système de recommandation
de films <a href="http://movielens.umn.edu">MovieLens</a>. Plusieurs
jeux de données sont disponibles sur le site
de <a href="http://www.grouplens.org/node/12">GroupLens</a>. Ces jeux
de données diffèrent par leur taille et vous travaillerez avec le plus
petit pour mettre au point vos programmes. Néanmoins, vos programmes
doivent aussi fonctionner avec les deux autres jeux de données.

<br/>
<br/>

<a href="http://movielens.umn.edu">MovieLens</a> est un site
communautaire de recommandation de films. Les utilisateurs de ce site
notent des films de 1 à 5. Ils peuvent également demander des
suggestions de films étant donnés les notations qu'ils ont fournies.

<br/>

Chaque utilisateur est décrit par quelques attributs&nbsp;: 

</p>

<ul>
  <li>un numéro d'identification,</li>
  <li>son âge,</li>
  <li>son sexe,</li>
  <li>son métier,</li>
  <li>son code postal (USA).</li>
</ul>

<p>

Chaque film est décrit par&nbsp;:

</p>

<ul>
  <li>un numéro d'identification,</li>
  <li>son titre,</li>
  <li>sa date de sortie au cinéma,</li>
  <li>son genre.</li>
</ul>

<p>

On dispose alors d'une liste de notes sous la forme&nbsp;: 

</p>

<ul>
  <li>identifiant d'utilisateur,</li>
  <li>identifiant de film,</li>
  <li>note attribuée par cet utilisateur à ce film,</li>
  <li>information de date&nbsp;: nombre de secondes écoulées depuis le
    1/1/1970.</li>
</ul>

<p>

Dans le plus petit jeu de données, il y a 100.000 notes, provenant de
943 utilisateurs pour 1682 films. Les autres jeux de données en
comptent respectivement 1 million et 10 millions.

<br/>
<br/>

L'objectif est de pouvoir sélectionner des films pour un
utilisateur. Les recommandations peuvent concerner des films qui
devraient lui plaire, mais aussi des films qui ne lui plairont
probablement pas.

<br/>

Pour cela, on va appliquer ce que l'on a vu en cours concernant la
factorisation de matrices non négatives.

</p>

<h2 id="factorisation">Factorisation de matrices</h2>

<p>

On va appliquer la méthode de factorisation de matrices non négatives
vue en cours pour effectuer des recommentations.

</p>

<ul>
  <li>implanter la méthode de descente de gradient stochastique pour la factorisation de matrices vue en cours.</li>
  <li>l'appliquer sur l'un des jeux de données 100 K&nbsp;: <a href="http://www.grappa.univ-lille3.fr/~ppreux/ensg/mocad/tp/completion-matrices/ml-100k/u1.base">prenez celui-ci</a>. Prenez K=10, &eta;=0,001.</li>
  <li>mesurez l'erreur sur <a href="http://www.grappa.univ-lille3.fr/~ppreux/ensg/mocad/tp/completion-matrices/ml-100k/u1.test">ce jeu de données</a></li>
  <li>à chaque itération, mesurer l'erreur quadratique moyenne sur chacun des deux ensembles (apprentissage et test) et la stocker pour pouvoir ensuite dessiner leur diminution.</li>
</ul>

<p>

L'algorithme vu en cours est le suivant&nbsp;:
(on suppose que vous avez récupéré les deux fichiers <kbd><code>u1.base</code></kbd> et <kbd><code>u1.test</code></kbd>)

</p>

<ul>
  <li>créer deux matrices U et V et les initialiser avec des nombres aléatoires uniformément distribués.</li>
  <li><b>Répéter</b>&nbsp;:
    <ul>
      <li><b>Pour</b> chacune des notes (u, i, r) de <kbd><code>u1.base</code></kbd>&nbsp;:
        <ul>
          <li>calculer la note prédite pour (u, i)&nbsp;: r (u, i) &#8592; U<sub>u</sub> V<sub>i</sub></li></li>
          <li>calculer l'erreur de prédiction&nbsp;: e  &#8592; r - r (u, i)</li>
          <li>mettre à jour les matrices U et V&nbsp;:

	    <ul>
              <li>U<sub>u</sub> &#8592; U<sub>u</sub> + &eta; e V<sub>i</sub></li>
              <li>V<sub>i</sub> &#8592; V<sub>i</sub> + &eta; e U<sub>u</sub></li>
            </ul></li>
        </ul></li>
      <li>E &#8592; erreur de prédiction sur <kbd><code>u1.test</code></kbd> (on mesure l'écart-type de l'erreur quadratique moyenne, <i>i.e.</i> la RMSE)</li>
      <li><b>Si</b> E ne diminue presque plus, quitter la boucle <b>Répéter</b> (<kbd><code>break</code></kbd>)</li>
    </ul></li>
</ul>

<p>

Deux points auxquels il faut prêter attention&nbsp;:

</p>

<ul>
  <li>&eta; doit toujours rester petit par rapport à l'erreur e. Aussi, ajouter un mécanisme pour que &eta; soit toujours au moins 10 fois plus petit que e.</li>
  <li>les données d'apprentissage (les notes (u, i, r)) doivent être parcourues dans des ordres différents à chaque itération de la boucle <b>Répéter</b>. Il faut les «&nbsp;mélanger&nbsp;».</li>
</ul>

<p>

Une fois que cette <a href="./correction.fc.R">première version</a> fonctionne, il y a plein de petits trucs pour en améliorer ses performances. Par exemple&nbsp;:

</p>

<ul>
  <li>estimer non pas la note, mais l'écart à la moyenne de la note. Pour cela, on calcule la note moyenne &mu; dans les données d'apprentissage et on cherche les matrices U et V qui approxime au mieux r - &mu; (au lieu de r). Autrement dit, la note prédite pour (u, i) devient &mu; + U<sub>u</sub> V<sub>i</sub></li>
  <li>utiliser la mise à jour suivante&nbsp;:
    <ul>
      <li>U<sub>u</sub> &#8592; U<sub>u</sub> + &eta; (e V<sub>i</sub> - &lambda; U<sub>u</sub>)</li>
      <li>V<sub>i</sub> &#8592; V<sub>i</sub> + &eta; (e U<sub>u</sub> - &lambda; V<sub>i</sub>)</li>
  </ul>
    où &lambda; est une valeur petite, 0,02 par exemple.
  </li>
  <li>prendre K = 30</li>
</ul>

<h2 id="recommandation">Recommandation</h2>

<p>

Écrire une fonction qui recommande 5 films qu'il n'a pas notés à un utilisateur identifié par son numéro.

</p>

</div>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2030719; 
var sc_invisible=1; 
var sc_partition=18; 
var sc_security="2ee406dd"; 
</script>

<script type="text/javascript" language="javascript" src="index_fichiers/counter.js"></script><noscript><a
href="http://www.statcounter.com/" target="_blank"><img
src="http://c19.statcounter.com/counter.php?sc_project=2030719&java=0&security=2ee406dd&invisible=0"
alt="" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

</body>
</html>

<!--
http://sifter.org/~simon/journal/20061211.html

http://sifter.org/~simon/journal/20070817.html
-->

