<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <title>Fouille de donn�es</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <link rel="stylesheet" type="text/css"
    href="./ma.css" 
    media="screen" />
</head>

<body vlink="#551A8B">

<div class="titreDuModule">
  Fouille de donn�es <br/>
</div>

<p>

Cette page concerne mes enseignements de fouille de donn�es.

</p>

<h2 id="poly">Notes de cours</h2>

<p>

Pour acc�der � la derni�re version de mes <a
    href="http://www.grappa.univ-lille3.fr/~ppreux/Documents/notes-de-cours-de-fouille-de-donnees.pdf">Notes
    de cours de cours de fouille de donn�es</a> (master 1 et 2,
    version de septembre 2008).

<br/>

La version 3 est en cours de mise au point&nbsp;; elle sera mise en
ligne durant l'�t� 2010...

<br/>
<br/>

Historique des changements depuis la version initiale&nbsp;:

</p>

<ul>
  <li>mai 2011&nbsp;: corrections dans le chapitre sur les machines � vecteurs
    supports</li>
  <li>2008&nbsp;: l'annexe E sur la comparaison des performances de deux 
    algorithmes a �t� retir�e (en cours de r�-�criture).</li>
  <li>2007&nbsp;: correction d'erreur dans la d�finition de l'inertie au
    chapitre segmentation de donn�es et quelques corrections tr�s
    mineures dans ce chapitre quant aux r�sultats exp�rimentaux&nbsp;;
    correction d'une erreur dans la d�finition de l'entropie dans le
    cas multi-classes (chapitre arbres de d�cision)</li>
  <li>2006&nbsp;: grosse r�-�criture du chapitre sur la classification
    bay�sienne pour �tre vraiment dans un cadre bay�sien</li>
</ul>

<p>

Statut juridique de ce polycopi�&nbsp;: il est sous <a
href="http://www.gnu.org/copyleft/fdl.html">licence GFDL</a>.

</p>

<h2 id="manip">Mise en pratique</h2>

<p>

J'utilise <a href="http://www.R-project.org">R</a> comme environnement
logiciel support pour mes cours de fouille de donn�es.

<br/>
<br/>

Ci-dessous, des pointeurs vers des sujets de TP abordant les
diff�rents points de mon cours&nbsp;:

</p>


<ul>
  <li><a href="../ensg/miashs/fouilleDeDonneesI/tp/introduction-a-R/">d�couverte de R</a>&nbsp;; voir aussi <a href="../ensg/m1psycho/">g�n�ralit�s sur R</a></li>
  <li><a href="../ensg/miashs/fouilleDeDonneesI/tp/arbres-de-decision/">classification supervis�e par arbres de d�cision</a></li>
  <li><a href="../ensg/miashs/fouilleDeDonneesI/tp/piece">exercice de probabilit�s</a></li>
  <li>segmentation de donn�es (classification non supervis�e)&nbsp;:
    <ul>
      <li><a href="../ensg/miashs/fouilleDeDonneesII/tp/k-moyennes/">segmentation de donn�es par les k-moyennes</a>&nbsp;;</li>
  <li><a href="../ensg/miashs/fouilleDeDonneesII/tp/segmentation-hierarchique/">segmentation hi�rarchique ascendante de donn�es</a>&nbsp;;</li>
  <li><a href="../ensg/miashs/fouilleDeDonneesII/tp/k-medianes/">segmentation par les k-m�dianes</a>&nbsp;;</li>
  <li><a href="../ensg/miashs/fouilleDeDonneesII/tp/exploration-visuelle/">exploration visuelle des donn�es</a></li>
    </ul></li>
  <li><a href="../ensg/miashs/fouilleDeDonneesIII/tp/preparation-des-donnees/">pr�paration des donn�es</a></li>
  <li><a href="../ensg/miashs/fouilleDeDonneesIII/tp/reduction-dimension/">r�duction de dimension</a> (ACP, MDS)</li>
  <li>visualisation de donn�es avec gobi&nbsp;: 
    <ul>
      <li><a href="./gobi/tp-gobi.html">d�couverte de Gobi</a>,</li>
      <li><a href="./gobi/tp-gobi4.html">une ACP dans Gobi</a>,</li>
      <li><a href="./gobi/tp-gobi5.html">repr�sentation d'un graphe</a>,</li>
      <li><a href="./gobi/tp-gobi6.html">analyse de dissmilarit�</a>.</li>
    </ul>

    Gobi est ici utilis� ind�pendemment de R. Le paquet Rggobi permet
    maintenant d'utiliser directement Gobi depuis R.</li>
</ul>


<p>

Pour plus d'info sur mon cours, voir <a
  href="../ensg">mes pages enseignement</a>.

</p>

<h2 id="divers liens">Divers liens</h2>


<ul>
  <li><a href="../papiers/man.pdf">Machines � noyau&nbsp;: une courte introduction (ou �&nbsp;SVM d�crypt�es&nbsp;�, ou �&nbsp;SVMs pour les nuls&nbsp;�)</a></li>
  <li><a href="http://en.wikibooks.org/wiki/Statistics">wikibook on Statistics</a></li>
  <li><a href="http://en.wikibooks.org/wiki/Statistical_Analysis:_an_Introduction_using_R">Statistical Analysis: an Introduction using R</a></li>
  <li><a href="http://www.grappa.univ-lille3.fr/~ppreux/pmwiki/index.php?n=Main.R">ma page sur R</a></li>
  <li><a href="http://www.burns-stat.com/pages/Tutor/spreadsheet_addiction.html">Pourquoi Excel ne doit pas �tre utilis� d�s que l'on veut faire un travail s�rieux</a></li>
</ul>

<!--
<br/>
<br/>

<a href="http://validator.w3.org/check?uri=referer">
   <img src="img/valid-xhtml10"
        alt="Valid XHTML 1.0!" height="15" width="44" /></a>
<a href="http://jigsaw.w3.org/css-validator/check?uri=referer">
   <img style="border:0;width:44px;height:15px"
        src="img/vcss" 
        alt="Valid CSS!" /></a>
-->


<?php
  include ("/home/ppreux/public_html/.log.access");
?>


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
