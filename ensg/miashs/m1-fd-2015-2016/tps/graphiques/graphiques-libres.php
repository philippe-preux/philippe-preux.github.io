<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Graphiques en R (partie 0)</title>
  <link href="./ma.css" 
	rel="stylesheet" type="text/css" media="all" />
  <link rel="shortcut icon" type="image/x-icon" 
	href="http://www.grappa.univ-lille3.fr/~ppreux/img/site.ico" />
</head>

<body>

<div class="tpR">

<h1>Graphiques en R</h1>

<p>

Pour celles et ceux qui sont en avance, je vous laisse chercher comment générer les graphiques qui suivent (à l'identique). On travaille sur le jeu de données sommeil vu précédemment.

<br/>

En guise d'aide pour vous lancer&nbsp;: utiliser la commande <kbd>plot()</kbd> pour les premiers graphiques. Ensuite cherchez, utilisez l'aide, ...

</p>

<h2>Afficher un attribut</h2>

<p>

Faites le graphique suivant de l'attribut </kbd>Sleep</kbd>.

</p>

<img src="Sleep.png" width = "500"/>

<p>

Ajoutez-y couleur et légendes.

</p>

<img src="Sleep.couleur.png" width = "500"/>

<h2>Un attribut par rapport à un autre</h2>

<p>

Faites le graphique suivant de l'attribut <kbd>Dreaming</kbd> en fonction de </kbd>Sleep</kbd>.

</p>

<img src="dreaming.vs.Sleep.png" width = "500"/>

<p>

La même chose en indiquant les noms des espèces à la place des cercles.

</p>

<img src="dreaming.vs.Sleep.espèces.png" width = "500"/>


<p>

La même chose avec la droite de régression.

</p>

<img src="droite-de-régression.png" width = "500"/>

<h2>Histogramme</h2>

<p>

L'histogramme de l'attribut Sleep pour visualiser la répartition de ses valeurs dans le jeu de données.

</p>

<img src="histo.Sleep.png" width = "500"/>

<p>

La même chose sauf que l'on indique des proportions et non plus des effectifs (en ordonnées).

</p>

<img src="histo-avec-prop.Sleep.png" width = "500"/>

<p>

La même chose à laquelle on ajoute une estimation de la densité.

</p>

<img src="histo-avec-prop-et-densité.Sleep.png" width = "500"/>

<h2>Camembert</h2>

<p>

Le camembert, quoique populaire, est une mauvaise manière de représenter des proportions. Néanmoins, générez le camembert suivant pour l'attribut <kbd>Sleep.exposure</kbd>.

</p>

<img src="camembert.Sleep.exposure.png" width = "500"/>

<p>

Même chose pour <kbd>Sleep</kbd>.

</p>

<img src="camembert.png" width = "500"/>

</div>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2030719; 
var sc_invisible=1; 
var sc_partition=18; 
var sc_security="2ee406dd"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c19.statcounter.com/counter.php?sc_project=2030719&java=0&security=2ee406dd&invisible=0" alt="" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

</body>
</html>