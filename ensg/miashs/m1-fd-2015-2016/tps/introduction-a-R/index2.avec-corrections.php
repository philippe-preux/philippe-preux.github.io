<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Introduction à R (partie 2)</title>
  <link href="./ma.css" 
	rel="stylesheet" type="text/css" media="all" />
  <link rel="shortcut icon" type="image/x-icon" 
	href="http://www.grappa.univ-lille3.fr/~ppreux/img/site.ico" />
</head>

<body>

<div class="tpR">

<h1>Introduction à R (partie 2)</h1>

<p>

Ce TP est la suite du <a href="./index.php">précédent</a>. On reprend
le jeu de données sommeil que l'on a rencontré lors du 1<sup>er</sup>
TP.

<br/>
<br/>

Table des matières&nbsp;:

</p>

<ul>
  <li><a href="#select">Sélection de données et d'attributs dans un <i>data frame</i></a></li>
  <li><a href="#cor">Étude de la corrélation entre les attributs</a></li>
  <li><a href="#tc">Tables de contigence</a></li>
  <!--li><a href="#"></a></li>
  <li><a href="#"></a></li-->
</ul>

<h2 id="select">Sélection de données et d'attributs dans un <i>data frame</i></h2>

<p>

On peut facilement sélectionner des lignes (données) ou des colonnes (attributs) d'un <i>data frame</i> selon un critère quelconque. Ce qui suit va être très utilisé dans les TPs par la suite.

<br/>

On utilise des crochets <kbd>[</kbd> pour spécifier les lignes/colonnes à sélection. La forme générale est&nbsp;:

</p>

<pre>> sommeil [lignes-à-sélectionner, colonnes-à-sélectionner]
</pre>

<p>

Par exemple&nbsp;:

</p>

<ul>
  <li>sélection des données numéro 3, 5, 7 et 18&nbsp;:
    <pre>> sommeil [c (3, 5, 7, 18), ]</pre>
    aucune colonne n'ait spécifié, ce qui signifie que l'on sélectionne toutes les colonnes.
  </li>
  <li>sélection des colonnes 2, 3 et 7&nbsp;:
    <pre>> sommeil [, c (2, 3, 7)]</pre>
    aucune ligne n'ait spécifié, ce qui signifie que l'on sélecitonne toutes les données
  </li>
  <li>sélection des colonnes 2 et 7 pour les données dont le numéro est pair&nbsp;:
    <pre>> sommeil [seq (from = 2, to = nrow (sommeil), by = 2), c (2, 7)]</pre>
  </li>
  <li>sélection des données dont l'attribut <kbd>Predation</kbd> vaut 2&nbsp;:
    <pre>> sommeil [sommeil$Predation == 2, ]</pre>
  </li>
  <li>sélection des données dont l'attribut <kbd>Predation</kbd> vaut 2 et l'attribut <kbd>Brain.Weight</kbd> est inférieur ou égal à 3&nbsp;:
    <pre>> sommeil [(sommeil$Predation == 2) & (sommeil$Brain.Weight <= 3), ]</pre>
  </li>
  <li>le nom (attribut <kbd>Species</kbd>) des données dont l'attribut <kbd>Predation</kbd> vaut 2 ou l'attribut <kbd>Brain.Weight</kbd> est inférieur ou égal à 3&nbsp;:
    <pre>> sommeil [(sommeil$Predation == 2) | (sommeil$Brain.Weight <= 3), 1]</pre>
    ou&nbsp;:
    <pre>> sommeil [(sommeil$Predation == 2) | (sommeil$Brain.Weight <= 3), "Species"]</pre>
    ou encore&nbsp;:
    <pre>> sommeil$Species [(sommeil$Predation == 2) | (sommeil$Brain.Weight <= 3)]</pre>
    Avec cette dernière notation, on commence par sélectionner l'attribut <kbd>Species</kbd> puis on sélectionne les lignes correspondant au critère avec les crochets.
  </li>
</ul>

<p>

Pour obtenir le numéro des données sélectionnées, on utilise la fonction <kbd>which</kbd> appliquée au critère de sélection&nbsp;:

</p>

<pre>> which ((sommeil$Predation == 2) | (sommeil$Brain.Weight <= 3))</pre>

<p>

Le résultat est un vecteur d'indices que l'on peut utiliser comme on veut. Par exemple, on le stocke dans un objet nommé <kbd>v</kbd>&nbsp;:

</p>

<pre>> v <- which ((sommeil$Predation == 2) | (sommeil$Brain.Weight <= 3))</pre>

<p>

et utiliser ensuite ce vecteur pour sélectionner les élements de <kbd>sommeil</kbd>, par exemple&nbsp;:

</p>

<pre>> sommeil$Species [v]</pre>

<div class="exercices">
  <ul>
    <li>Combien y a-t-il d'espèces dans le jeu de données dont le poids est supérieur à 100 kg&nbsp;? Quelles sont-elles&nbsp;?
<div class="correction">
<ul>
  <li>on obtient le nombre d'espèces par&nbsp;:
<pre>> length(which(sommeil$Body.Weight>100))
</pre></li>
  <lI>et leur nom par&nbsp;:
<pre>> sommeil$Species[which(sommeil$Body.Weight>100)]
</pre></li>
</ul>
</div></li>
    <li>Combien y a-t-il d'espèces dans le jeu de données dont le poids du cerveu représente plus de 0,1 % du poids total de l'animal&nbsp;? Quelles sont-elles&nbsp;?
<div class="correction">
<ul>
  <li>on obtient le nombre d'espèces par&nbsp;:
<pre>> which (sommeil$Body.Weight/sommeil$Brain.Weight/1000>0.001)
</pre></li>
  <lI>et leur nom par&nbsp;:
<pre>> sommeil$Species [which(sommeil$Body.Weight/sommeil$Brain.Weight/1000>0.001)]
</pre></li>
</ul>
</div></li>
    <li>Quelles sont les espèces animales du jeu de données qui passent plus de la moitié de la journée à dormir&nbsp;?
<div class="correction">
<ul>
  <lI>on obtient la réponse à cette question par&nbsp;:
<pre>> sommeil$Species [which (sommeil$Sleep>12)]
</pre>
Remarque&nbsp;: <pre>> sommeil$Species [sommeil$Sleep>12]</pre>
renvoie des NAs. Le <kbd>which()</kbd> les filtre.
  </li>
</ul>
</div></li>
    <li>Ces espèces dorment-elles en lieu sûr&nbsp;? Qu'est ce qui vous permet de le dire&nbsp;?</li>
<div class="correction">
<ul>
  <li>on regarde l'attribut <kbd>Sleep.exposure</kbd> qui donne cette information&nbsp;:
<pre>> sommeil$Sleep.exposure [which (sommeil$Sleep>12)]
</pre>
La plupart on une valeur faible (1 ou 2) ce qui signifie que ces espèces dorment dans des lieux sûrs.
  </li>
</ul>
</div></li>
    <li>Comment faites-vous pour connaître le nombre de données dont l'attribut <kbd>Predation</kbd> vaut 2 ou l'attribut <kbd>Brain.Weight</kbd> est inférieur ou égal à 10&nbsp;?
<div class="correction">
<ul>
  <li>
<pre>> which ((sommeil$Predation == 2) | (sommeil$Brain.Weight < 10))
</pre></li>
</ul>
</div></li>
  </ul>
</div>

<h2 id="cor">Étude de la corrélation entre les attributs</h2>

<p>

Par corrélation entre deux attributs, on sous-entend comme toujours quand cela n'est pas spécifiée, linéaire, c'est-à-dire le rapport entre les valeurs de deux attributs. On a vu précédemment la fonction <kbd>cor()</kbd> pour calculer le coefficient de corrélation entre deux attributs. 

<br/>

Avant de calculer des coefficients de corrélation linéaire, lire <a href="http://www.grappa.univ-lille3.fr/~ppreux/fouille/significativite-coefficient-correlation-lineaire.php">cette page</a> où j'explique coment interprêter la valeur de ce coefficient.

</p>

<div class="exercices">
  <ul>
    <li>Les attributs <kbd>Dreaming</kbd> et <kbd>Non.Dreaming</kbd> sont-ils corrélés linéairement&nbsp;?
<div class="correction">
<ul>
  <li>la commande&nbsp;:
<pre>> cor (sommeil$Dreaming, sommeil$Non.Dreaming)
</pre>
  renvoie <kbd>NA</kbd>. Il faut spécifier qu'il faut retirer ces <kbd>NA</kbd> comme suit&nbsp;:
<pre>> cor (sommeil$Dreaming, sommeil$Non.Dreaming, use = "pairwise.complete.obs")
</pre>
  ce qui donne 0,51. Ces deux attributs sont donc corrélés linéairement car nous avons plus de 12 paires de données.
  </li>
</ul>
</div>
</li>
<!--
Comment y a-t-il de paires complètes :
> length (which ((! is.na (sommeil$Dreaming)) & (! is.na (sommeil$Non.Dreaming))))
[1] 48
ou plus simple, en utilisant la fonction complete.cases ()
> length (which (complete.cases(sommeil$Dreaming, sommeil$Non.Dreaming)))
[1] 48
 -->
    <li>On peut s'attendre à ce que les prédateurs dorment mieux (sommeil profond, paradoxal) que les proies dont on s'attend à ce qu'elles ne dorment que d'un &oelig;il (rêvent peu). Les prédateurs ont une valeur d'attribut <kbd>Predation</kbd> élevée, les proies en ont une valeur faible.
      <br/>
      Calculez ce coefficient de corrélation linéaire.
<div class="correction">
  <ul>
    <li>
<pre>> cor (sommeil$Dreaming, sommeil$Predation, use = "pairwise.complete.obs")
)
</pre>
  donne la valeur -0,45. Comme l'attribut <kbd>Predation</kbd> est d'autant plus petit que l'espèce est prédatrice, cette corrélation négative signifie que les espèces prédatrices rêvent plus que les proies. De plus, cette valeur est significative car nous avons plus de 15 paires de données.
</li>
</ul>
</div>
    </li>
    <li>De même, on peut s'attendre à ce que les proies dorment dans des endroits plus protégés que les prédateurs. <kbd>Sleep.exposure</kbd> est un indice mesurant la sûreté de lieu de sommeil (1 = sûr, 5 = pas sûr).
      <br/>
      Calculez le coefficient de corrélation linéaire entre cet indice et la durée de sommeil profond.
<div class="correction">
<ul>
  <li>
<pre>> cor (sommeil$Dreaming, sommeil$Sleep.exposure, use = "pairwise.complete.obs")
</pre>
ce qui donne -0,51. Pour la même raison que précédemment, ce coefficient confirme l'hypothèse. À nouveau, le nombre de paires de données est suffisant pour que cette valeur soit significative.
</li>
</ul>
</div>
    </li>
  </ul>
</div>

<h3>Matrice de corrélations</h3>

<p>

On s'intéresse à déterminer le coefficient de corrélation linéaire pour chaque couple d'attributs&nbsp;; on obtient la matrice de corrélations. <kbd>cor()</kbd> s'appliquer à un <i>data frame</i>, du moment que tous les attributs en sont des nombres.

</p>

<div class="exercice">
  <p>
    Calculez la matrice de corrélations pour le jeu de données sommeil. Prenez soin d'éliminer les données ayant des valeurs inconnues et prenez soin aussi de ne considérer que les attributs numériques.
  </p>
<div class="correction">
<pre>> cor (sommeil [,-1], use = "pairwise.complete.obs")
</pre>
</div>
</div>

<h3>Variations sur la corrélation linéaire</h3>

<p>

L'attribut <kbd>Species</kbd> contient le nom de l'espèce animale. <kbd>read.csv()</kbd> l'a considéré comme un facteur (un attribut nominal). C'est plutôt une chaîne de caractères. On transforme cet attribut en chaîne de caractère en tapant la commande&nbsp;:
</p>
<pre>> sommeil$Species <- as.character(sommeil$Species)</pre>
<p>
Faites-le.
</p>

<div class="exercice">
  <p>
    La fonction <kbd>nchar()</kbd> fournit le nombre de caractères d'une chaîne de caractères. Par exemple <kbd>nchar ("hello world!")</kbd> renvoie 12.
    </p>
  <ul>
    <li>Déterminez le coefficient de corrélation linéaire entre le nombre de caractères du nom de l'espèce et les autres attributs.</li>
    <li>Vous pouvez ajouter cette information au <i>data frame</i> en tapant par exemple&nbsp;:
    <pre>> sommeil$lg.nom.espece <- ...</pre>
    <br/>
    Cette commande ajoute un nouvel attribut au <i>data frame</i> et lui donne la valeur spécifiée par <kbd>...</kbd> (je vous laisse compléter).
<div class="correction">
<pre>> sommeil$lg.nom.espece <- nchar (sommeil$Species)
</pre>
</div>
</li>
    <li>Calculez la valeur du coefficient de corrélation linéaire entre le nombre de caractères du nom de l'espèce et tous les autres attributs avec une seule commande.
    <br/>
    Obtenez un affichage tel que&nbsp;:
    <br/>
    <pre>  Body.Weight   Brain.Weight   Non.Dreaming       Dreaming          Sleep 
    0.08158730     0.03118650     0.12794411     0.29249502     0.20348594 
      Lifespan      Gestation      Predation Sleep.exposure     Endangered 
   -0.36658928    -0.11486060    -0.07672917    -0.33721379    -0.22823030 
 lg.nom.espece 
    1.00000000
</pre>
<div class="correction">
<pre>> cor (sommeil$lg.nom.espece, sommeil[, 1], use = "pairwise.complete.obs")
</pre>
</div>
</li></ul>
</div>

<div class="exercice">
  <p>
    On observe régulièrement des corrélations linéaires impliquant le log d'une quantité plutôt que la quantité elle-même.
  </p>
  <ul>
    <li>Mesurez le coefficient de corrélation entre le poids moyen et la durée de vie.
<div class="correction">
<pre>> cor (sommeil$Lifespan, sommeil$Body.Weight, use = "pairwise.complete.obs")
</pre>
<p>
donne 0,30.
</p>
</div>
</li>
    <li>Mesurez ce coefficient entre le log de ces deux attributs.
<div class="correction">
<pre>>  cor (log(sommeil$Lifespan), log(sommeil$Body.Weight), use = "pairwise.complete.obs")

</pre>
</div>
<p>
donne 0,71.
</p>
</li>
    <li>Mesurez ce coefficient entre le log de l'un de ces deux attributs et l'autre (tel quel, pas son log).
<div class="correction">
<pre>> cor (log(sommeil$Lifespan), sommeil$Body.Weight, use = "pairwise.complete.obs")
</pre>
<p>
donne 0,28 et
</p>
<pre>> cor (sommeil$Lifespan, log(sommeil$Body.Weight), use = "pairwise.complete.obs")
</pre>
<p>
donne 0,61.
</p>
</div>
</li>
    <li>Concluez.
<div class="correction">
<p> 
Très clairement, les logarithme des attributs sont bien plus corrélés linéairement que les attributs d'origine.
</p>
</div>
</li>
    <li>Ce log que vous calculez, en quelle base l'est-il&nbsp;? Si vous le calculez dans une autre base, cela change-t-il le résultat&nbsp;? (Aide&nbsp;: si nécessaire, regardez la page d'aide de la fonction <kbd>log()</kbd>.)
<div class="correction">
<p>
Le logarithme calculé est le logarithme naturel (ou népérien). 
<br/>
Le résultat est le même quelle que soit la base utilisée puisqu'un changement de base pour le calcul du logarithme revient simplement à multiplier le logarithme par une constante.
</p>
</div>
</li>
  </ul>
</div>

<!--
titi <- (sommeil$Gestation > 0) & (sommeil$Dreaming > 0)
cor (log (sommeil$Gestation [titi]), log (sommeil$Dreaming [titi]), 
     use = "pairwise.complete.obs")
cor ( (sommeil$Gestation [titi]), log (sommeil$Dreaming [titi]), 
     use = "pairwise.complete.obs")
cor (log (sommeil$Gestation [titi]),  (sommeil$Dreaming [titi]), 
     use = "pairwise.complete.obs")
cor (log (sommeil$Gestation [titi]),  (sommeil$Dreaming [titi]), 
     use = "pairwise.complete.obs")

titi3 <- (sommeil$Body.Weight > 0) & (sommeil$Lifespan > 0)
cor (log (sommeil$Body.Weight [titi3]), log (sommeil$Lifespan [titi3]), 
     use = "pairwise.complete.obs")
# 0.7078945
cor (log (sommeil$Body.Weight [titi3]),  (sommeil$Lifespan [titi3]), 
     use = "pairwise.complete.obs")
# 0.6144529
cor ( (sommeil$Body.Weight [titi3]), log (sommeil$Lifespan [titi3]), 
     use = "pairwise.complete.obs")
# 0.2771688
cor (sommeil$Body.Weight [titi3], sommeil$Lifespan [titi3], 
     use = "pairwise.complete.obs")
# 0.3024503

titi2 <- which (sommeil$Dreaming > 0)
cor (sommeil$Dreaming [titi2], sommeil$Endangered [titi2], use = "pairwise.complete.obs")
# -0.6057735
cor (log (sommeil$Dreaming [titi2]), sommeil$Endangered [titi2], use = "pairwise.complete.obs")
# -0.6901164
cor (sommeil$Dreaming [titi2], log (sommeil$Endangered [titi2]), use = "pairwise.complete.obs")
# -0.6048351
cor (log (sommeil$Dreaming [titi2]), log (sommeil$Endangered [titi2]), use = "pairwise.complete.obs")
# -0.6582309
-->

<h2 id="tc">Tables de contingence</h2>

<div class="exercice">
<p>

Il est courant d'avoir besoin de calculer une table de contingence, c'est-à-dire pour un attribut discret, le nombre de données ayant chacune des valeurs de cet attribut.

<br/>

La fonction <kbd>table()</kbd> renvoie une table de contingence. Utilisez la page d'aide de cette fonction pour obtenir la table de contigence pour l'attribut <kbd>Predation</kbd>.
</p>

<div class="correction">
<pre>> table (sommeil$Predation)
</pre>
</div>
</div>


</div>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2030719; 
var sc_invisible=1; 
var sc_partition=18; 
var sc_security="2ee406dd"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img src="http://c19.statcounter.com/counter.php?sc_project=2030719&java=0&security=2ee406dd&invisible=0" alt="" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

</body>
</html>