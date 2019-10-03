<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Recommandation par filtrage hybride</title>
  <link href="./ma.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<div class="tpR">
<h1>Recommandation par filtrage hybride</h1>

<p>

Le filtrage hybride consiste à combiner les techniques de recommandation basées sur le contenu avec celles basées sur le filtrage collaboratif. Beaucoup d'approches sont possibles. Nous en décrivons une ci-dessous que nous mettons en &eolig;uvre.

</p>

<h2 id="PbEtDonnees">Le problème et les données</h2>

<h3 id="Pb">Le problème</h3>

<p>

Nous reprenons les jeux de données MovieLens utilisés dans le TP sur <a href="./fc.php">recommandation par filtrage collaboratif</a>. Nous rappelons les éléments qui suivent.

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
943 utilisateurs pour 1682 films. 

<br/>
<br/>

Nous allons utiliser à la fois les attributs des données et les notes. Nous allons considérer un problème qui consiste à prédire la note attribuée par un utilisateur à un film. Il s'agît alors d'un problème de classification supervisée dans lequel il y a 5 classes, une classe par note possible.
Les numéros d'identification de l'utilisateur et de l'item sont sans intérêt&nbsp;; pour l'item, nous ne retiendrons que les attributs spécifiant le genre du film.

</p>

<h2 id="factorisation">Apprentissage supervisé des notes</h2>

<h3 id="jeuxDeDonnées">Construction du jeu d'apprentissage et du jeu de test</h3>

<p>

Nous devons construire le jeu de données permettant l'apprentissage des notes. Pour cela, un exemple est constitué d'un triplet (utilisateur, item, note). Un exemple est donc constitué des attributs de l'utilisateur et de l'item, la classe étant la note.

</p>

<div class="exercice">
  <p>
    Construire le jeu d'apprentissage à partir des données présentes dans <kbd>u1.base</kbd> et un jeu de test avec les données présentes dans <kbd>u1.test</kbd>.
   <br/>
   Les deux jeux de données doivent avoir les mêmes attributs. 
   <br/>
   Ils sont placés dans deux matrices.
   <br/>
On convient que la classe est dans la dernière colonne (celle de numéro <kbd>ncol (jeu)</kbd>).
   <br/>
   Pour une raison purement technique, la classe (la note) doit avoir une valeur dont la plus petite est 0. La classe doit donc être la note - 1 et non pas la note. Faites-le.
  </p>
</div>

<div class="correction">
  <p>
    On commence par charger les deux fichiers de données&nbsp;:
  </p>
  <pre>users <- read.table ("u.user", col.names =  c ("id", "age", "sex", "job", "zip"), sep = "|")
items <- read.table ("u.item", col.names = c ("id", "title", "release",
                                   "rv", "Imdb", "unknown", "Action",
                                   "Adventure", "Animation",
                                   "Children's", "Comedy", "Crime",
                                   "Documentary", "Drama", "Fantasy",
                                   "Film-Noir", "Horror", "Musical",
                                   "Mystery", "Romance", "Sci-Fi",
                                   "Thriller", "War", "Western"), sep = "|")
ratings <- read.table ("u1.base",
                       col.names = c ("user", "item", "rating", "timestamp"),
                       sep = "\t")
ratings$rating <- ratings$rating - 1
</pre>
  <p>
    Ensuite, on crée le jeu d'entraînement&nbsp;: il y aura autant d'exemples que de notes, donc autant que de données dans <kbd>ratings</kbd>. Chaque exemple combinera les attributs de l'utilisateur, ceux de l'items et la note&nbsp;; il y aura ainsi 24 attributs.
  </p>
  <pre>train <- matrix (0, nrow = nrow (ratings), ncol = 24)
for (i in 1:nrow (ratings)) {
    train [i, 1:4] <- as.numeric (users [users$id == ratings$user [i], 2:5])
    train [i, 5:23] <- as.numeric (items [items$id == ratings$item [i], 6:24])
    train [i, 24] <- ratings$rating [i]
}
</pre>  
  <p>
    On crée de la même manière le jeu de données de test avec les notes qui se trouvent dans le fichier <kbd>u1.test</kbd>.
  </p>
  <pre>t.ratings <- read.table ("u1.test",
                       col.names = c ("user", "item", "rating", "timestamp"),
                       sep = "\t")
t.ratings$rating <- t.ratings$rating - 1
test <- matrix (0, nrow = nrow (t.ratings), ncol = 24)
for (i in 1:nrow (t.ratings)) {
    test [i, 1:4] <- as.numeric (users [users$id == t.ratings$user [i], 2:5])
    test [i, 5:23] <- as.numeric (items [items$id == t.ratings$item [i], 6:24])
    test [i, 24] <- t.ratings$rating [i]
}
</pre>
</div>

<h3 id="appSup">Apprentissage supervisée</h3>

<p>

Il y a une multitude d'algorithmes utilisables pour réaliser une tâche d'apprentissage supervisée. Les méthodes d'ensemble sont connues pour leur excellente performance. Aussi, nous allons utiliser l'une d'entre-elles connue sous le nom de forêt aléatoire&nbsp;: une forêt aléatoire est un ensemble d'arbres de décision. Il y a plusieurs manières de construire un arbre de décision et plusieurs manières de combiner des arbres pour prédire la classe d'une donnée. Nous allons utiliser la méthode <i>extreme gradient boosting tree</i> qui est disponible dans R. Elle est très performante, très rapide et très facile à utiliser. On peut l'utiliser pour réaliser une tâche de classification binaire, ou à plus de 2 classes, une tâche de régression linéaire ou logistique, ou une tâche de ranking.

</p>

<ul>
  <li>faire <kbd><code>library (xgboost)</code></kbd></li>
  <li>supposons que le jeu d'entrainement soit dans une matrice nommée <kbd>train</kbd> dont la dernière colonne contient les étiquettes</li>
  <li>supposons que le jeu de test soit dans une matrice nommée <kbd>test</kbd>  dont la dernière colonne contient les étiquettes</li>
  <li>faire <kbd><code>dtrain <- xgb.DMatrix (data = train [, -ncol (train)], label = train [, ncol (train)])</code></kbd>.
    <br/>
    Cette instruction construit un objet à partir des exemples, en séparant leurs attributs de leurs étiquettes. La notation <kbd><code>train [, -ncol (train)]</code></kbd> indique que l'on prend toutes les colonnes sauf la dernière (qui est numérotée <kbd><code>ncol (train)</code></kbd>)&nbsp;: donc les données sont dans toutes les colonnes sauf la dernière, et les étiquettes sont dans la dernière. Bien entendu, les étiquettes peuvent se trouver dans n'importe quelle colonne de <kbd>train</kbd>&nbsp;: ce qui importe est de spécifier la bonne colonne ici.</li>
  <li>faire de même pour les exemples de test&nbsp;: <kbd><code>dtest <- xgb.DMatrix (data = test [, -ncol (test)], label = test [, ncol (test)])</code></kbd></li>
  <li>et on peut lancer l'apprentissage par&nbsp;: <kbd><code>model <- xgb.train (data = dtrain, nround = 200, watchlist = list (train = dtrain, test = dtest), params = list (objective = "multi:softmax", num.class = 5))</code></kbd>
  <br/>
  Cette commande indique les éléments suivant&nbsp;:
    <ul>
      <li><kbd>data = dtrain</kbd>&nbsp;: on apprend avec les exemples contenus dans <kbd>train</kbd></li>
      <li><kbd>nround = 200</kbd>&nbsp;: on exécute 200 itérations de l'algorithme</li>
      <li><kbd>watchlist = list (train = dtrain, test = dtest)</kbd>&nbsp;: indique le jeu d'entraînement et le jeu de données utilisé pendant l'entraînement</li>
      <li><kbd>params = list (objective = "multi:softmax", num.class = 5)</kbd> est une liste de paramètres et indique deux choses&nbsp;:
        <ul>
          <li><kbd>objective = "multi:softmax"</kbd>&nbsp;: il s'agît d'un problème de classification supervisée ayant plus de 2 classes</li>
          <li><kbd>num.class = 5</kbd>&nbsp;: il y a 5 classes</li>
        </ul>
      </li>
    </ul>
    Remarque&nbsp;: si vous obtenez un message du genre&nbsp;:
<pre>Erreur dans xgb.iter.update(bst$handle, dtrain, i - 1, obj) : 
  SoftmaxMultiClassObj: label must be in [0, num_class), num_class=5 but found 5 in label
</pre>
  c'est que vous n'avez pas respecté la règle que les étiquettes doivent être numérotées de 0 à n - 1 (et non de 1 à n).
  </li>
  <li>cette commande prend un peu de temps à s'exécuter. Pour faire patienter et montrer qu'elle est en pleine action, elle affiche l'erreur de classification obtenue à chaque itération sur le jeu d'entraînement et sur le jeu de test. Par exemple&nbsp;: 
    <br/>
<kbd>[11]	train-merror:0.609300	test-merror:0.629650</kbd>
    <br/>
    indique qu'à la 11<sup>è</sup> itération, l'erreur de classification sur le jeu d'entraînement est 0.609300, celle sur le jeu de test est 0.629650.</li>
</ul>

<div class="correction">
  <p>
    Tout a été dit dans l'énoncé. Il suffit de mettre tout cela bout à bout&nbsp;:
  </p>
  <pre>require (xgboost)
dtrain <- xgb.DMatrix (data = train [, -24], label = train [, 24])
dtest <- xgb.DMatrix (data = test [, -24], label = test [, 24])
watchlist <- list (train = dtrain, test = dtest)
forêt <- xgb.train (data = dtrain, watchlist = watchlist, nrounds = 200,
                    params = list (objective = "multi:softmax", num.class = 5))
</pre>
</div>

<h3 id="prediction">Prédiction des notes</h3>

<ul>
  <li>quand le modèle est appris, on peut prédire la classe de nouvelles données. Si on veut prédire la classe des données de <kbd>test</kbd>, on fait&nbsp;: <kbd><code>prediction.model <- predict (model, test [, -ncol (test)])</code></kbd>.
  <br/>
  <kbd>prediction.model</kbd> contient ensuite un vecteur indiquant la classe prédite pour chacune des données. Ici, c'est donc un vecteur de 20000 valeurs.</li>
</ul>

<div class="exercice">
  <ul>
    <li>en utilisant <kbd>prediction.model</kbd>, calculer le taux d'erreur sur le jeu de test. Vous devez retrouver la valeur indiquée à la dernière ligne de l'exécution de <kbd>xgb.train</kbd>.</li>
    <li>vérifier également le taux d'erreur sur le jeu d'entraînement.</li>
  </ul>
</div>

<div class="correction">
  <ul>
    <li>prédiction de l'étiquette des données du jeu de test&nbsp;:
<pre>pred <- predict (forêt, test [, -24])
</pre></li>
    <li>calcul du taux d'erreur sur le jeu de test&nbsp;:
<pre>length (which (pred != test [, 24])) / nrow (test)
</pre>
    ce qui me donne exactement la valeur attendue.</li>
  </ul>
</div>

<!--h3 id="retour">Retour sur l'apprentissage</h3>

<p>

Plus haut, on vous a dit comment réaliser l'apprentissage. Il est toujours critique d'éviter le sur-apprentissage. Le sur-apprentissage est du au fait que le modèle que l'on apprend est trop riche par rapport à la complexité de la tâche à résoudre. On le détecte assez facilement en regardant le taux d'erreur du jeu de test&nbsp;: celui-ci décroît puis augmente&nbsp;: cette augmentation est le signe du sur-apprentissage. Il faut donc stopper l'apprentissage avant que cette erreur n'augmente. Comment connaître cet instant&nbsp;? 

</p>

<ul>
  <li>
</ul-->

<h2 id="recommandation">Recommandation</h2>

<div class="exercices">
  <ul>
    <li>Écrire une fonction qui recommande 5 films qu'il n'a pas notés à un utilisateur identifié par son numéro.</li>
    <li>Un nouvel utilisateur se présente sur le site&nbsp;: que lui recommendez-vous&nbsp;?</li>
  </ul>
</div>

<div class="correction">
  <p>
    À un utilisateur identifié par son numéro, on recommande des films pour lesquels la note prédite est la plus grande et on enlève les films qu'il a déjà notés.
  </p>
<pre>recommande <- function (id = 10)
  {
    pr <- matrix (0, nrow = 1, ncol = 24)
    pr [1, 1:4] <- as.numeric (users [id, 2:5])
    les.notes.prédites <- rep (NA, times = nrow (items))
    pas.vus <- rep (TRUE, times = 1682)
    pas.vus [ratings$item [which (ratings$user == id)]] <- FALSE
    for (produit in 1:nrow (items)) {
      if (pas.vus [produit] == TRUE) {
        pr [1, 5:23] <- as.numeric (items [produit, 6:24])
        les.notes.prédites [produit] <- predict (forêt, pr)
      }
    }
    notes.triées <- sort.int (les.notes.prédites, decreasing = TRUE, index.return = TRUE)
    return (notes.triées$ix [1:5])
  }
cat ("Je recommande les films", recommande (10), "\n")
</pre>
  <p>
    En fait, l'utilisateur a aussi vu les films qui sont dans l'ensemble de test. Je vous laisse compléter la solution proposée ci-dessus.
  </p>
</div>

<h2 id="suite">Si vous avez fait tout ce qui précède</h2>

<p>

Je propose ici des sujets pour aller plus loin.

</p>

<div class="exercice">
  <ul>
    <li>un utilisateur veut que les items recommendés lui plaisent. Aussi, ne s'intéresse-t-il qu'aux items notés 4 ou 5. Aussi, peut-on considérer non pas 5 notes possibles, mais une étiquette disant&nbsp; intéressant (correspondant aux notes 4 ou 5) et pas intéressant (correspondant à 1, 2 ou 3). Mettez cette idée en &oelig;uvre. L'erreur de classification est-elle meilleure&nbsp;? 
     <br/>
     Refaire la même en considérant que les produits intéressant ont été notés 3, 4 ou 5 et les non intéressants ont été notés 1 ou 2.
     <br/>
     L'une ou l'autre de ces deux approches donne-t-elle de meilleurs résultat&nbsp;?
    </li>
    <li>en général, les utilisateurs notent les items qui leur plaisent et ne notent pas les produits qui ne leur plaisent pas. Cela crée un distribution particulière des notes, avec une sur-représentation des bonnes notes.
    <br/>
    Constatez ce phénomène sur le jeu de données.
    <br/>
    Pensez-vous que cela soit un problème&nbsp;? Si non, pourquoi&nbsp;? Si oui, pourquoi et comment essayer d'y remédier&nbsp;?
    </li>
  </ul>
</div>

<div class="correction">
  <p>
    On crée les jeux d'exemples binaires&nbsp;:
  </p>
<pre>
train.binaire <- train
train.binaire [, 24] <- ifelse (train [, 24] > 2, 1, 0)
test.binaire <- test
test.binaire [, 24] <- ifelse (test [, 24] > 2, 1, 0)
dtrain.binaire <- xgb.DMatrix (data = train.binaire [, -24], label = train.binaire [, 24])
dtest.binaire <- xgb.DMatrix (data = test.binaire [, -24], label = test.binaire [, 24])
watchlist.binaire <- list (train = dtrain.binaire, test = dtest.binaire)
forêt.binaire <- xgb.train (data = dtrain.binaire, 
		   watchlist = watchlist.binaire, nrounds = 200,
                   params = list (objective = "multi:softmax", num.class = 2))
pred.binaire <- predict (forêt.binaire, test.binaire [, -24])
length (which (pred.binaire != test.binaire [, 24])) / nrow (test.binaire)
</pre>
</div>

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

