<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <title>Big Data</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <link rel="stylesheet" type="text/css" href="ma.css" />
  <link rel="shortcut icon" type="image/x-icon" href="img/site.ico" />
  <!-- l'icone vient de http://findicons.com/icon/140381/folder_if# -->
</head>

<body>
<div class="research">

<div style="visibility: hidden; left: 277px; top: 271px;"
     id="curseur" class="infobulle">
</div>

<?php
  $numero = intval ($_GET["numero"]);

  $lastDiapo = 213;
  if ($numero > $lastDiapo)
    $numero = $lastDiapo;
  if ($numero < 0)
    $numero = 0;
  $whole = ($_SERVER["PHP_SELF"]);

  echo "<div class=\"titreDuModule\">";
  echo "Big Data, diapo ";
  echo $numero + 1;
  echo "</div>";

  $diapoCourante = sprintf ("ecl.big.data-%d.png", $numero);
  if ($numero !== 0)
    $diapoPrecedente = sprintf ("index.php?numero=%d", $numero - 1);
  else $diapoPrecedente = "";
  if ($numero !== $lastDiapo)
    $diapoSuivante = sprintf ("index.php?numero=%d", $numero + 1);
  else $diapoSuivante = "";

  echo "<br/>";

  echo "<center>";
  echo "<table>";
  echo "<tr>";
  echo "<td colspan=\"4\" rowspan=\"9\"> <img src=\"";
  echo $diapoCourante;
  echo "\" width=\"600\" /> </td>";
  
/*
  1-33 =  intro
  34 = plan
  35 - 71 = text mining, moteur de recherche
  72 - 90 = sys. reco
  91 - 138 = graphes
  139 - 154 = prise de décision
  155 - 163 = matrices de grde dimension
  164 - 203 = infrastructure
  204 - 214 = conclusion
*/

  echo "<td> <a href=\"index.php?numero=0\">Introduction</a> </td>";
  echo "</tr>";
  echo "<tr><td> <a href=\"index.php?numero=32\">Plan</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=33\">Textes et moteurs de recherche</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=71\">Systèmes de recommendation</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=90\">Graphes</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=138\">Prise de décision</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=154\">Matrices de grande dimension</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=163\">Infrastructure</a> </td></tr>";
  echo "<tr><td> <a href=\"index.php?numero=203\">Conclusion</a> </td></tr>";




  echo "<tr>";
  echo "<td> <a href=\"index.php\"> Première </a></td>";

  if ($numero !== 0) {
    echo "<td> <a href=\"";
    echo $diapoPrecedente;
    echo "\"> Précédente </a> </td>";
  } else {
    echo "<td> <span class=\"invisible\"> Précédente </span> </td>";
  }

  if ($numero !== $lastDiapo) {
    echo "<td> <a href=\"";
    echo $diapoSuivante;
    echo "\"> Suivante </a> </td>";
  } else {
    echo "<td> <span class=\"invisible\"> Suivante </span> </td>";
  }

  echo "<td align=\"right\"> <a href=\"index.php?numero=213\"> Dernière </a> </td>";
  echo "</tr> </table> </center>";

  $notes = sprintf ("notes-%d.html", $numero);
  if (file_exists ($notes))
    include ($notes);
?>

<font size="-3">
<a href="http://www.grappa.univ-lille3.fr/~ppreux">Retour à ma page-maison.</a>
<br/>
Dernière modification de cette page, le
<?php

  include ("/home/ppreux/public_html/.log.access");
  setlocale(LC_TIME, "fr_FR");
  echo strftime ("%e %b %Y, %T.", getlastmod ());
?>
</font>

</div>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2030719; 
var sc_invisible=0; 
var sc_partition=18; 
var sc_security="2ee406dd"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c19.statcounter.com/counter.php?sc_project=2030719&java=0&security=2ee406dd&invisible=0" alt="" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

</body>
</html>
