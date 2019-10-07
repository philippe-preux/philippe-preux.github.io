<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Philippe Preux' publications</title>
  <link rel="stylesheet" type="text/css" href="./ma.css" />
  <link rel="icon" type="image/x-icon"
    href="http://www.grappa.univ-lille3.fr/~ppreux/img/site.ico" />
</head>
<body text="#000000" bgcolor="#33ffff"
      link="#0000ee" vlink="#551a8b"
      alink="#ff0000" background="blanc">

<script language="javascript" type="text/javascript">
  <!--
    function GetId(id) {
      return document.getElementById (id);
    }
    var i=false; // La variable i nous dit si la bulle est visible ou non

    function move(e) {
      if (i) {  
          // Si la bulle est visible, on calcule
          // en temps reel sa position ideale
        if (navigator.appName!="Microsoft Internet Explorer") { 
               // Si on est pas sous IE
          GetId("curseur").style.left=e.pageX + 5+"px";
          GetId("curseur").style.top=e.pageY + 10+"px";
        } else {
          // Modif propos�e par TeDeum, merci � lui
          if(document.documentElement.clientWidth>0) {
            GetId("curseur").style.left = 
              20 + event.x + document.documentElement.scrollLeft + "px";
            GetId("curseur").style.top = 
              10 + event.y + document.documentElement.scrollTop + "px";
          } else {
            GetId("curseur").style.left = 
              20 + event.x + document.body.scrollLeft + "px";
            GetId("curseur").style.top = 
              10 + event.y + document.body.scrollTop + "px";
          }
        }
      }
    }

    commentJET = "This is very old! Do not read it!";

    commentICDM2010 = "This work is a follow-up to the EGC'2010 paper. It is in English rather than in French. We consider the problem of displaying commercial advertisements on web pages, in the ``cost per click'' model. The advertisement server has to learn the appeal of each type of visitors for the different advertisements in order to maximize the revenue. In a realistic context, the advertisements have constraints such as a certain number of clicks to draw, as well as a lifetime. This problem is thus inherently dynamic, and intimately combines combinatorial and statistical issues. To set the stage, it is also noteworthy that we deal with very rare events of interest, since the base probability of one click is in the order of 10^{-4}. Different approaches may be thought of, ranging from computationally demanding ones (use of Markov decision processes, or stochastic programming) to very fast ones. We introduce ``noseed'', an adaptive policy learning algorithm based on a combination of linear programming and multi-arm bandits. We also propose a way to evaluate the extent to which we have to handle the constraints (which is directly related to the computation cost). We investigate performance of our system through simulations on a realistic model designed with an important commercial web actor.";

    commentICONIP2010 = "Following the introduction by Tibshirani of the LASSO technique for feature selection in regression, two algorithms were proposed by Osborne et al. for solving the associated problem. One is an homotopy method that gained popularity as the LASSO modification of the LARS algorithm. The other is a finite-step descent method that follows a path on the constraint polytope, and seems to have been largely ignored. One of the reason may be that it solves the constrained formulation of the LASSO, as opposed to the more practical regularized formulation. We give here an adaptation of this algorithm that solves the regularized problem, and outperforms state-of-the-art algorithms in terms of speed.";

    commentEGC2010 = "";

    commentICMLA2009 = "This paper presents the algorithm ECON for supervised learning.\
      This paper is an updated version of the INRIA research report RR-6794; \
      the experimental results have also been much imrpoved since earlier versions of this work. \
      We also provide an application of ECON in computer graphics; \
      this furthers the work published at the 3IA'2009 conference, as the \"Light Source Storage...\"  \
      Springer paper.";
    commentADPRL2009 = "The experiments made in this paper are based on an early version of the regressor ECON. The implementation of ECON has been improved since then, so that the experiments have to be redone (that's the problem with experimental studies). I hope I will have the time to do it, or someone to do it for me.";
    commentKRL = "First paper on the idea of using the idea of sparsity achieved by l_1 regulrization, and the algorithm known as (kernelized) LARS, or kernel basis pursuit in reinforcement learning. This idea has been further worked and published at ADRPL'2007.";

    commentEWRL2008 = "This is the first paper introducing the combination of the use \
      of non parametric function approximation in a actor-critic, in the natural gradient framework.";
    commentADPRL2007 = "This paper is an updated version of the ICML'2006 workshop on \
      kernel in reinforcement learning paper.";

    function montre (text) {
//      if (i == false) {
        // S'il est cach� (la verif n'est qu'une securit�),
        // on le rend visible.
        GetId("curseur").style.visibility = "visible"; 
        // Cette fonction qui suit est � am�liorer, 
        // il parait qu'elle n'est pas valide (mais elle marche)
        GetId("curseur").innerHTML = text;
        i=true;
//      }
    }

    function cache() {
      if (i == true) {
        // Si la bulle etait visible on la cache
        GetId("curseur").style.visibility = "hidden";
        i=false;
      }
    }

    // d�s que la souris bouge, on appelle la fonction move()
    // pour mettre a jour la position de la bulle.
    document.onmousemove=move;
//-->
</script>
<div style="visibility: hidden; left: 277px; top: 271px;"
     id="curseur" class="infobulle">
</div>

My pubs are available below in their chronological order. I have kind
of sorted them with regards to their topic. The color of the dot
indicates the topic as follows:

<ul>
  <img
    SRC="../img/ptBleu.png" width="10" height="10"/> reinforcement learning,
    modeling of the dynamics of behavior in living beings (ongoing
    since 1996 or so)
  <br>
  <img
    SRC="../img/ptOrange.png" width="10" height="10"/> machine learning
  <br>
  <img
    SRC="../img/ptRouge.png" width="10" height="10"/> application of machine learning
  <br>
  <img
    SRC="../img/ptVert.png" width="10" height="10"/>
    virtual laboratories (from 1996 to 2004)
  <br>
  <img
    SRC="../img/ptRose.png" width="10" height="10"/>
    genetic algorithms, combinatorial optimization, local search
    algorithms (from 1994 to 1999)
  <br><img
    SRC="../img/ptJaune.png" width="10" height="10"/> old
    stuffs on supercompilers done during my PhD (before 1993)
</ul>

<img SRC="../img/longerColorLine.png" align=CENTER />

<h2>Tutorial&nbsp;:</h2>
<!--
<dt>
<img SRC="../img/ptBleu.png" width="10" height="10">
  <a href="../papiers/exposeRL.pdf">Un
    expos� de pr�sentation sur l'apprentissage par renforcement</a>
    pr�sent� aux <a href="http://lil.univ-littoral.fr/~fonlupt/JET8/">JET</a>
    (fin 2002).
  <span class="moreCommentOnPub" 
    onmouseover="montre(commentJET);" 
    onmouseout="cache();">
    (More details here.)</span>
</dt>
-->
<dt>
<img SRC="../img/ptOrange.png" width="10" height="10"> 
  <a href="../papiers/man.pdf">Machines � noyau&nbsp;: une courte introduction (ou �&nbsp;SVM d�crypt�es&nbsp;�, ou �&nbsp;SVMs pour les nuls&nbsp;�)</a>
</dt>
<dt>
<img SRC="../img/ptOrange.png" width="10" height="10"> 
  <a href="http://www.grappa.univ-lille3.fr/~ppreux/fouille/big.data/slides"><font size="-1">Data</font> Data <font size="+1">Data</font> <font size="+2">Data</font></a>, �cole Centrale de Lille, D�c. 2012
</dt>
<dt>
<img SRC="../img/ptBleuClair.png" width="10" height="10"> 
  <i>Tout ce que vous avez toujours voulu
  savoir sur les syst�mes dynamiques non-lin�aires sans oser
  le demander</i>, (only available in french) Seconde �dition (avr. 95)
  (<a href="../papiers/sd.pdf">pdf</a>)
</dt>

<p>

<a href="../ensg/index.php#polys">More french material on my teaching
page</a> on reinforcement learning, data mining, ... (in french only).

<br/>
<br/>

<img SRC="../img/longerColorLine.png"
  align=CENTER>

</p>

<h2>Publications, communications, ...</h2>

<p>

Direct access to a year: <a href="#2014">2014</a>, <a href="#2013">2013</a>, <a href="#2012">2012</a>, <a href="#2011">2011</a>, <a href="#2010">2010</a>, <a href="#2009">2009</a>, <a href="#2008">2008</a>, <a href="#2007">2007</a>, <a href="#2006">2006</a>, <a href="#2005">2005</a>, <a href="#2004">2004</a>, <a href="#2003">2003</a>, <a href="#2002">2002</a>, <a href="#2001">2001</a>, <a href="#2000">2000</a>, <a href="#1999">1999</a>, <a href="#1998">1998</a>, <a href="#1997">1997</a>, <a href="#1996">1996</a>, <a href="#1995">1995</a>, <a href="#1994">1994</a>, <a href="#1992">1992</a>, <a href="#1991">1991</a>, <a href="#1990">1990</a>, <a href="#1989">1989</a>

</p>

<h3 id="2014">2014</h3>

<dt id="msr2014">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
  B. Baldassari and Ph. Preux,
  Understanding software evolution: the Maisqual Ant data set,
  <a href="http://2014.msrconf.org/">11th Working Conference on Mining Software Repositories (MSR)</a>
  ACM Press, 2014
</dt>

<dt id="egc2014">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
  B. Baldassari, F. Huynh, Ph. Preux,
  De lombre  la lumire : plus de visibilit sur lclipse,
  Proc. EGC, Rennes, Jan. 2014
</dt>

<h3 id="2013">2013</h3>

<dt id="icml2013">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, M. Ghavamzadeh, Ph. Preux,
  <a href="http://jmlr.csail.mit.edu/proceedings/papers/v28/kadri13.pdf">A Generalized Kernel Approach to Structured Output Learning</a>, 
  Proc. <a href="http://icml.cc/2013/">ICML</a>, JMLR W&amp;CP <b>28</b>(1):471-479, Atlanta, Jun. 2013 (available on Arxiv, also known as INRIA Research Report 7956 at <a href="#ArXiV,Hm-MG-PP,SO,2012">this entry</a>).
</dt>

<h3 id="2012">2012</h3>

<dt id="ArXiV,Hm-et-al,MovKL,2012">
<dt id="nips2012">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, A. Rakotomamonjy, F. Bach, Ph. Preux,
  <a href="http://books.nips.cc/papers/files/nips25/NIPS2012_1172.pdf">Multiple Operator-valued Kernel Learning</a>, <a href="http://nips.cc/Conferences/2012/"><i>Proc. NIPS</i></a>, pp. 2429-2438, 2012, also known as INRIA Research Report 7900, available on <a href="http://arxiv.org/abs/1203.1596">Arxiv</a> (25 % acceptance rate)
</dt>

<dt id="MLJ2012">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
  G. Dulac-Arnold, L. Denoyer, Ph. Preux, P. Gallinari,
  <a href="http://www.springerlink.com/content/v187320320668k42/">Sequential Approaches for Learning Datum-Wise Sparse Representations</a>,
  in <a href="http://www.springer.com/computer/ai/journal/10994/"><i>Machine Learning</i></a>, <b>89</b>(1-2), 87-122, 2012.
</dt>

<dt id="ECML2012,EWRL2012,ArXiV,Gab,LudoEtPat2012">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
  G. Dulac-Arnold, L. Denoyer, Ph. Preux, P. Gallinari,
  <a href="http://link.springer.com/chapter/10.1007/978-3-642-33486-3_12">Fast Reinforcement Learning with Large Action Sets using Error-Correcting Output Codes for MDP Factorization</a>, proceedings of the <a href="http://www.ecmlpkdd2012.net/">ECML-PKDD 2012</a>, Springer, LNCS, <b>7524</b>, 180:194, Sep. 2012, early draft (Feb. 2012) on <a href="http://arxiv.org/abs/1203.0203">Arxiv</a>, also presented at the <a href="http://ewrl.wordpress.com/ewrl10-2012/">10<sup>th</sup>European Workshop on Reinforcement Learning</a>
</dt>

<dt id="ArXiV,Hm-MG-PP,SO,2012">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, M. Ghavamzadeh, Ph. Preux,
  <a href="http://arxiv.org/abs/1205.2171">A Generalized Kernel Approach to Structured Output Learning</a>, Feb. 2012, available on Arxiv, also known as INRIA Research Report 7956 (accpted at ICML'2013).
</dt>
  
<dt id="CapJfpda2012">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
  G. Dulac-Arnold, L. Denoyer, Ph. Preux, P. Gallinari,
  Apprentissage par renforcement rapide pour des grands ensembles d'actions en utilisant des codes correcteurs d'erreur, <a href="http://jfpda2012.loria.fr/">JFPDA</a> et <a href="http://cap2012.loria.fr/">CAP</a>, Nancy, Mai 2012
</dt>

<dt id="FCS2012">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
  S. Girgin and J. Mary and Ph. Preux and O. Nicol,
  <a href="http://rd.springer.com/article/10.1007/s11704-012-2873-5">Managing Advertising Campaigns - an Approximate Planning approach</a>,
  in <a href="http://www.springer.com/computer/journal/11704/"><i>Frontiers of Computer Science</i></a>, <b>6</b>(2), 209:229, 2012.
</dt>

<dt id="challengeICML2011">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
  O. Nicol and J. Mary and Ph. Preux,
  <a href="http://jmlr.csail.mit.edu/proceedings/papers/v26/nicol12a/nicol12a.pdf">ICML Exploration &amp; Exploitation challenge: Keep it simple!</a>,
  in <a href="http://jmlr.csail.mit.edu/proceedings/papers/v26/"><i>Journal of Machine Learning Research</i> W&amp;CP</a>, <b>26</b>, 62:85, 2012.
</dt>

<dt id="AIStats2012">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
  A. Khaleghi, D. Ryabko, J. Mary, Ph. Preux,
  <a href="http://jmlr.csail.mit.edu/proceedings/papers/v22/khaleghi12/khaleghi12.pdf">Online clustering of processes</a>,
  in <a href="http://www.aistats.org/index.php"><i>Proc. 15<sup>th</sup> Conf. on Ai & Stats</i></a>, <a href="http://jmlr.csail.mit.edu/proceedings/papers/v22/"><i>Journal of Machine Learning Research</i> W&amp;CP</a>, <b>22</b>, 601-609, 2012
</dt>

<h3 id="2011">2011</h3>

<dt id="ECML2011">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="http://www.ecmlpkdd2011.org/images/athens05.jpg"
     width="41" height="25"  />
  G. Dulac-Arnold, L. Denoyer, Ph. Preux, P. Gallinari,
  Datum-wise classification. A sequential Approach to sparsity
  in <a href="http://www.ecmlpkdd2011.org/"><i>Machine Learning and Knowledge Discovery in Databases</i> (aka, <i>Proc. European Conference 
    on Machine Learning and Principles and Practice of Knowledge 
    Discovery in Databases (ECML PKDD)</i>)</a>, 
  Springer, LNAI, vol. 6911, 375-390, Athens, Greece, Sep. 2011 (20 % acceptance rate), <a href="http://arxiv.org/abs/1108.5668">on arxiv</a>, <a href="http://www.springerlink.com/content/h27m4858665j7u1p/">on Springer website</a>.
</dt>

<dt id="ICML2011">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, A. Rabaoui, Ph. Preux, E. Duflos, A. Rakotomamonjy,
<!--  <a href="../papiers/Kadri-et-al.ICML-2011.pdf">
-->
  <a href="http://www.icml-2011.org/papers.php#509">Functional Regularized
   Least Squares Classification with Operator-Valued Kernels</a>,
  in <i>Proc. <a
  href="http://www.icml-2011.org/">28<sup>th</sup> International Conference on Machine Learning (ICML)</a></i>, Seattle, ACM Press, 2011 (26 % acceptance rate)
</dt>

<dt id="IWFOS2011">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, Ph. Preux, E. Duflos, S. Canu,
  <a href="../papiers/IWFOS2011.pdf">Multiple functional regression with both discrete and continuous covariates</a>,
  in F. Ferraty (ed), <i>Recent Advances in Functional Data Analysis and Related Topics</i>, Physica-Verlag/Springer, Contributions to Statistics series, 189:195, 2011, <i>Proc. <a
  href="http://eio.usc.es/pub/iwfos">2<sup>nd</sup> International Workshop on Functional and Operatorial Statistics (IWFOS)</a></i>, Santander, June 2011
  (paper available on the <a href="http://www.springerlink.com/content/978-3-7908-2736-1#section=906082&page=1&locus=0">Springer website</a>).
</dt>

<dt id="JDS2011">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, Ph. Preux, E. Duflos,
  R�gression ridge � noyau pour des variables explicatives et
  d'int�r�ts fonctionnelles (<a
  href="../papiers/JDS2011.pdf">draft</a>),
  in <i>Proc. <a
  href="http://jds2011.tn.refer.org/">43<sup>e</sup> Journ�es de
  statistiques (JDS)</a></i>, Mai 2011
</dt>


<dt id="ICASSP2011">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, E. Duflos, Ph. Preux,
  <a href="../papiers/ICASSP2011.pdf">Learning vocal tract variables with multi-task kernels</a>,
  in <i>Proc. <a
  href="http://www.icassp2011.com/">36<sup>th</sup> International 
    Conference on Acoustics, Speech and Signal 
    Processing (ICASSP)</a></i>, pp. 821-826, Prague, Czech Republic, May 2011
</dt>

<dt id="rr-7607">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, Ph. Preux, E. Duflos, S. Canu,
  <a href="http://hal.inria.fr/inria-00587649">Operator-Valued 
    Kernels for Nonparametric Operator Estimation</a>,
  INRIA research report RR-7607, April 2011
</dt>

<h3 id="2010">2010</h3>

<dt id="ICDM2010">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
  S. Girgin, J. Mary, Ph. Preux, O. Nicol,
  Advertising Campaigns Management: Should We Be Greedy?,
  in <i>Proc. <a
  href="http://datamining.it.uts.edu.au/icdm10/">10<sup>th</sup> IEEE International Conference on Data Mining (ICDM)</a></i>, pp. 821-826, Sydney, Australia, Dec. 2010
  (<a href="../papiers/icdm-2010.pdf">pdf</a>)
  (short (6 pages) paper: acceptance rate < 20 % for long + short papers),
  extended version available as the
  <a href="http://hal.inria.fr/inria-00519694/en/">INRIA research
	    report 7388</a>
  <span class="moreCommentOnPub" 
    onmouseover="montre(commentICDM2010);" 
    onmouseout="cache();">
    (Abstract here.)</span>
</dt>

<dt id="MLOAD">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
  S. Girgin, J. Mary, Ph. Preux, O. Nicol,
  Planning-based Approach for Optimizing the Display of Online
  Advertising Campaigns, poster at the
  <a href="http://research.microsoft.com/en-us/um/beijing/events/mload-2010/">NIPS workshop on Machine Learning in Online ADvertising (MLOAD 2010)</a>
</dt>

<dt id="TKML">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  Hachem Kadri, Philippe Preux, Emmanuel Duflos, St�phane Canu, Manual Davy,
  Function-Valued Reproducting Kernel Hilbert Spaces and Applications,
  poster at the <a href="http://csmr.ca.sandia.gov/~dfgleic/tkml2010/">NIPS workshop on Tensors, Kernels, and Machine Learning (TKML 2010)</a>
</dt>

<dt id="ICONIP2010">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/cowboy-lasso-buddy-icon.png" width="20" height="30" />
<!--
  <img SRC="../img/lasso.jpg" width="20" height="30" />
-->
  M. Loth, Ph. Preux,
  <a href="http://hal.archives-ouvertes.fr/inria-00508257/fr/">The Iso-lambda Descent Algorithm for the LASSO</a>,
  in <i>Proc. of <a href="http://cs.anu.edu.au/iconip2010/">ICONIP</a></i>, <a href="http://www.springer.com/computer/theoretical+computer+science/book/978-3-642-17536-7">Neural Information Processing. Theory and Algorithms, Springer LNCS 6443</a>, pp. 454-461, Sydney, Nov. 2010 (31 % acceptance rate, 146 out of 470)
  <span class="moreCommentOnPub" 
    onmouseover="montre(commentICONIP2010);" 
    onmouseout="cache();">
    (Abstract here.)</span>
</dt>

<dt id="3IA2010">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
<img SRC="../img/test2ker04_10000.png" width="30" height="30" />
  S. Delepoulle, F. Rousselle, Ch. Renaud, Ph. Preux,
  A comparison of two machine learning approaches for Photometric Solids
  Compression, in <i>Proc. of the <a
  href="http://3ia.teiath.gr/">13<sup>th</sup> Int'l
  Conf. on Computer Graphics and Artificial Intelligence</i>
  (3IA)</a></i>, 132:142, Athens, Greece, May 2010.
  Also selected for publication in 
  <a href="http://www.springer.com/engineering/mathematical/book/978-3-642-15689-2">D. Plemenos, G. Miaoulis (Eds), 
  <i>Intelligent Computer Graphics 2010</I>,
  Springer, Studies in Computational Intelligence, Vol. 321, 145:164</a>
  (<a href="../papiers/3IA2010.pdf">pdf</a> of the 3IA conf. version)
  (<a href="http://www.springerlink.com/content/c067065831g38850/">paper on Springer website.</a>)
</dt>

<dt id="AISTATS2010">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, E. Duflos, Ph. Preux, S. Canu, M. Davy,
  <a href="../papiers/ai-stats.2010.pdf">Nonlinear functional
    regression: a functional RKHS approach</a>, (<a href="http://jmlr.csail.mit.edu/proceedings/papers/v9/">also available here</a>)
  in <i>Proc. of the <a
  href="http://www.aistats.org/aistats2010/">13<sup>th</sup> Int'l Conf. on
  Artificial Intelligence  and Statistics (AI & Stats)</a></i>, JMLR:
  W&CP 9, pp. 374:380, Chia Laguna, Italy, May 13-15, 2010. 
  (orally presented paper: acceptance rate is 24 out of 308 submissions, less than 8 % thus.)
</dt>

<dt id="EGC2010">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
  V. Gabillon, J. Mary, Ph. Preux,
  Affichage de publicit�s sur des portails <i>web</i>,
  in <i>Proc. <a
  href="http://www.projets.rnu.tn/egc2010/">10<sup>e</sup> Extraction,
  Gestion des Connaissances (EGC)</a></i>, Tunisie, 2010
  (<a href="../papiers/egc-2010.fr.pdf">pdf</a>)
  This paper received a best paper award.
  (long paper: acceptance rate < 25 % for long papers)
  <span class="moreCommentOnPub" 
    onmouseover="montre(commentEGC2010);" 
    onmouseout="cache();">
    (More details here.)</span>
</dt>

<h3 id="2009">2009</h3>

<dt id="ICMLA2009">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/cowboy-lasso-buddy-icon.png" width="20" height="30" />
  M. Loth, Ph. Preux, S. Delepoulle, Ch. Renaud,
  ECON: a Kernel Basis Pursuit Algorithm with Automatic Feature
  Parameter Tuning, and its Application to Photometric Solids Approximation, 
  in <i><a href="http://www.icmla-conference.org/icmla09/">Proc. Int'l Conf. 
    on Machine Learning and Applications (ICML-A)</a></i>, Miami, USA, 2009
  (<a href="../papiers/icmla2009.draft.pdf">a draft is available here</a>)
  An implementation of the algorithm (ECON) is available by <a href="http://www.grappa.univ-lille3.fr/~ppreux/software/econ">clicking on this link</a>.
  <span class="moreCommentOnPub"
    onmouseover="montre(commentICMLA2009);"
    onmouseout="cache();"> (More details here.)</span>
</dt>

<dt id="RR-6908">
<img SRC="../img/ptOrange.png" width="10" height="10" 
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/fda.jpg" width="20" height="30" />
  H. Kadri, E. Duflos, M. Davy, Ph. Preux, S. Canu,
  A General Framework for Nonlinear Functional Regression with
    Reproducing Kernel Hilbert Spaces,
  INRIA <a href="http://hal.inria.fr/inria-00378381">Research Report 6809</a>,
  2009. This paper was improved, and <a href="#AISTATS2010">published
  in the proc. of the AI &amp; Stats'2010 conf.</a>
<!--
   (<a href="../papiers/RR-6908.pdf">pdf available here</a>.
 -->
</dt>

<dt id="CGspringer2009">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
<img SRC="../img/test2ker04_10000.png" width="30" height="30" />
  S. Delepoulle, Ch. Renaud, Ph. Preux,
  Light Source Storage and Interpolation for Global Illumination: 
  a neural solution, in
    <a href="http://www.springer.com/engineering/book/978-3-642-03451-0">
              <i>Intelligent Computer Graphics</i></a>, 
            D. Plemenos and G. Miaoulis eds, Springer 2009,
	    Studies in Computational Intelligence series, Vol. 240, 87-104
	    (<a href="http://www.springerlink.com/content/p88m14p7u26j2067/">on Springer website.)
</dt>

<dt id="3ia">
<img SRC="../img/ptRouge.png" width="10" height="10" 
  onmouseover = "montre('application of ML');" onmouseout = "cache();" />
<img SRC="../img/test2ker04_10000.png" width="30" height="30" />
  S. Delepoulle, Ch. Renaud, Ph. Preux,
  Photometric compression and interpolation for light source repreentation, in 
    <a href="http://3ia.teiath.gr"><i>Proc. 12<sup>th</sup> Int'l
  Conf. on Computer Graphics and Artificial Intelligence</i>
  (3IA)</a>,
  Athens, Greece, May 2009 (<a href="../papiers/3ia.pdf">pdf available here</a>)
</dt>

<dt id="icann2009Rejected">
<img src="../img/ptOrange.png" width="10" height="10"
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/cowboy-lasso-buddy-icon.png" width="20" height="30" />
  M. Loth, Ph. Preux, 
  <a href="../papiers/our.submission.to.icann2009.pdf">Automatic synthesis
    of sparse neural networks using l<sub>1</sub> regularization</a>.
  <img src="../img/warning.gif" />This paper was <b>rejected</b> at
  <a href="http://www.kios.org.cy/ICANN09/">ICANN 2009</a>.
  I found interesting though to put it on my webpage. I found particularly 
  interesting the reviews we got; so
  <a href="http://www.grappa.univ-lille3.fr/~ppreux/pmwiki/index.php?n=Review.Review">I 
  publish them completely on the web, and I allow myself to review
  the reviews</a>. An updated, and published, version of this paper
  (in particular, the experimental results have been much improved)
  is available <a href="./publis.html#ICMLA2009">here</a>, in the ICMLA'2009
  Proceedings.
</dt>

<dt id="smls1">
<img SRC="../img/ptOrange.png" width="10" height="10"
  onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/cowboy-lasso-buddy-icon.png" width="20" height="30" />
  M. Loth, Ph. Preux, l<sub>1</sub> regularization path for functional 
    features, poster at the
    <a href="http://www.cs.ucl.ac.uk/staff/rmartin/smls09/index.html">Pascal
      Workshop ``Sparsity in Machine Learning and Statistics''</a>,
  Cumberland Lodge, UK, Apr. 2009
	    (<a href="../papiers/sparsity-econ.pdf">1 page abstract</a>, and
	    <a href="../papiers/poster-econ.pdf">the poster</a>)
</dt>

<dt id="smls2">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
<img SRC="../img/agent.png" width="35" height="30" />
  Ph. Preux, S. Girgin, Sparsity in Adaptive Control,
  poster at the <a href="http://www.cs.ucl.ac.uk/staff/rmartin/smls09/index.html">Pascal Workshop ``Sparsity in Machine Learning and Statistics''</a>,
  Cumberland Lodge, UK, Apr. 2009 
      (<a href="../papiers/sparsity-in-rl.pdf">1 page abstract</a>, and
	    <a href="../papiers/poster-rl.pdf">the poster</a>)
</dt>

<dt id="adprl2009">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
<img SRC="../img/agent.png" width="35" height="30" />
  Ph. Preux, S. Girgin, M. Loth,
  Feature Discovery in Approximate Dynamic Programming, in 
    <a href="http://www.ieee-ssci.org/index.php?q=node/3">
  <i>Proc. Approximate Dynamic Programming and Reinforcement Learning</i>
    (ADPRL)</a>,
  IEEE Press, 109:116, Nashville, Mar-Apr. 2009 (<a
    href="../papiers/adprl2009.draft.pdf">draft available here</a>,
    final version on <a
    href="http://ieeexplore.ieee.org">IEEExplore</a>)
    <span class="moreCommentOnPub"
      onmouseover="montre(commentADPRL2009);"
      onmouseout="cache();">(More details here.)</span>
</dt>

<dt id="RR-6794">
<img SRC="../img/ptOrange.png" width="10" height="10" onmouseover = "montre('machine learning');" onmouseout = "cache();" />
<img SRC="../img/cowboy-lasso-buddy-icon.png" width="20" height="30" />
  M. loth, Ph. Preux, 
  The Equi-Correlation Network: a New Kernelized-LARS with
  Automatic Kernel Parameters Tuning,
  INRIA <a href="http://hal.inria.fr/inria-00351930">Research Report 6794</a>,
  2008 (<a href="../papiers/RR-6794.pdf">pdf available here</a>, which
  is a little more up-to-date than the version available on HAL; the
  <a href="#ICMLA2009">ICML-A paper</a> provides more recent results).
</dt>

<dt id="ewrl2008postProc">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover =
	  "montre('reinforcement learning');" onmouseout = "cache();"
	  />
<img height="30" SRC="../img/couvLNAI5323.png" />
<img SRC="../img/agent.png" width="35" height="30" />
  S. Girgin, M. Loth, R. Munos Ph. Preux, D. Ryabko, (eds)
  <a href="http://www.springer.com/978-3-540-89721-7">
  <i>Recent Advances in Reinforcement Learning</i></a>,
  Springer, Lecture Notes in Artificial Intelligence, vol. 5323, 
  Feb. 2009
</dt>

<h3 id="2008">2008</h3>

<dt id="icmla2008">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover =
  "montre('reinforcement learning');" onmouseout = "cache();" />
<img SRC="../img/agent.png" width="35" height="30" />
  S. Girgin, Ph. Preux,
  Basis Function Construction in Reinforcement Learning using
  Cascade-Correlation Learning Architecture, in <i>Proc. of the 
    <a href="http://www.icmla-conference.org/icmla08/">International Conference 
    on Machine Learning and Applications (ICML-A)</a></i>, 75--82, IEEE Press, 
    La Jolla, USA, Dec. 2008 
    (the paper is copyrighted by IEEE Press, 
     available on <a href="http://ieeexplore.ieee.org">IEEExplore</a>, 
     <a href="../papiers/icmla08.pdf" >an early draft is available</a>. 
     Despite having the same title as the following paper, these two 
     papers are not the same; the ICML-A paper is more thorough.)
</dt>

<!--
<dt id="rrDove">
<img SRC="../img/ptBleu.png" width="10" height="10" width="10" height="10">
  M. Loth, Ph. Preux, 
  <a href="http://hal.inria.fr/inria-00297774/en">Reinforcement Learning by Direct Estimation of Optimal Value and Regret Minimization</a>,
  INRIA Research Report, Jul 2008
</dt>
-->

<dt id="erlars2008">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
<img SRC="../img/agent.png" width="35" height="30" />
  S. Girgin, Ph. Preux, 
  Incremental basis function expansion in reinforcement learning 
  using cascade-correlation networks, in <i>Proc. of the ECAI 
    <a href="http://www.erlars.org/">ERLARS workshop</a></i>, Patras, Greece, 
  Jul 2008 (see the January 2008 INRIA research report 
    <a href="https://hal.inria.fr/inria-00272368/en/">INRIA 
      research report RR-6505</a>)
</dt>

<dt id="ewrl2008">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
<img SRC="../img/agent.png" width="35" height="30" />
  S. Girgin, Ph. Preux, 
  <a href="../papiers/ewrl8.pdf">Basis Expansion In Natural Actor
    Critic Methods</a>,
  in Girgin <i>et al.</i>, <a href="#ewrl2008postProc"><i>Recent
  Advances in Reinforcement Learning</i></a>, Springer, Lecture Notes
  in Artificial Intelligence, vol. 5323, pp. 110-123, 2009. (<a href="http://www.springerlink.com/content/v914460r26q08h25/">paper on Springer website.</a>)
  <span class="moreCommentOnPub" 
    onmouseover="montre(commentEWRL2008);" onmouseout="cache();">
    (More details here.)</span>
</dt>

<!--
<dt id="rr-00272368">
<img SRC="../img/ptBleu.png" width="10" height="10" width="10" height="10">
<img SRC="../img/agent.png" width="35" height="30" />
  S. Girgin, Ph. Preux, 
  Incremental Basis Function Expansion in Reinforcement Learning using 
  Cascade-Correlation Networks, Jan 2008,
  <a href="https://hal.inria.fr/inria-00272368/en/">INRIA research report RR-6505</a>
</dt>
-->

<dt id="eurogp2008">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover =
  "montre('reinforcement learning');" onmouseout = "cache();" /> 
<img SRC="../img/agent.png" width="35" height="30" />
  S. Girgin, Ph. Preux, 
  Feature discovery in reinforcement learning using genetic
  programming, in <a
  href="http://www.springerlink.com/content/d867101348682411/"><i>
  Proc. 11<sup>th</sup> European Conference on Genetic Programming
  (EUROGP)</i></a>, Mar 2008 
  <a href="http://hal.inria.fr/inria-00187997/en/">See the associate
  INRIA research report.</a> <a
  href="http://evostar.iti.upv.es/index.php?option=com_content&view=article&id=72&Itemid=62">
  (best paper award nominee)</a>
  (<a href="http://www.springerlink.com/content/d867101348682411/">paper on Springer website.</a>
</dt>

<h3 id="2007">2007</h3>

<dt id="esann2007">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  M. Loth, Ph. Preux, M. Davy, 
  A unified view of TD algorithms - Introducing full-gradient TD and 
  Equi-gradient descent TD, in <i> Proc. European Symposium on
    Artificial Neural Networks (ESANN)</i>, Apr. 2007.
  <a href="http://arxiv.org/abs/cs/0611145">on arxiv</a>.
</dt>

<dt id="IEEEadprl2007">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
<img SRC="../img/cowboy-lasso-buddy-icon.png" width="20" height="30" />
  M. Loth, M. Davy, Ph. Preux, 
<!--
  <a href="../papiers/adprl2007.draft.pdf">
-->
  <a href="http://hal.inria.fr/inria-00117075/fr/">
  Sparse temporal difference learning using LASSO</a>,
  Oct 2006 draft on-line, final version in the proc. of the <a
  href="http://liu.ece.uic.edu/~dliu/ADPRL07/"><i>IEEE International
  Symposium on Approximate Dynamic Programming and Reinforcement
  Learning</i></a>, pp. 352:359, available on <a
  href="http://ieeexplore.ieee.org/xpls/abs_all.jsp?isnumber=4220802&arnumber=4220855&count=53&index=52">IEEExplore</a>,
  <a href="http://philippe.preux.chez-alice.fr/hawaii/">Hawaii</a>,
  2007
  <span class="moreCommentOnPub"
    onmouseover="montre(commentADPRL2007);" onmouseout="cache();">
    (More details here.)</span>
</dt>

<dt id="ria2007">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  Ph. Preux, S. Delepoulle, R. Coulom (eds),
  <a href="http://www.lavoisier.fr/notice/fr333178.html">
  Prise de d�cision s�quentielle</a>,
  num�ro sp�cial de la revue d'intelligence artificielle (RIA),
  volume 21, num�ro 1, jan. 2007
</dt>

<h3 id="2006">2006</h3>

<dt id="ecaiWorkshop2006">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  F. Montagne, Ph. Preux, S. Delepoulle,
  <a href="../papiers/ecai2006.pdf">
  Introducing interactive help for reinforcement learners</a>,
  Workshop on planning, learning and monitoring with
  uncertainty and dynamic worlds, ECAI Workshop, Aug 2006
</dt>

<dt id="krl2006">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  M. Loth, M. Davy, R. Coulom, Ph. Preux, 
  <a href="../papiers/krl2006.pdf">
    Equi-gradient Temporal Difference Learning</a>,
  <a href="http://www.grappa.univ-lille3.fr/~ppreux/krl">
    Kernel methods for reinforcement learning</a>, ICML Workshop, June 2006
  <span class="moreCommentOnPub" 
    onmouseover="montre(commentKRL);" onmouseout="cache();">
    (More details here.)</span>
</dt>

<dt id="jfpda2006">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  M. Loth, R. Coulom, M. Davy, Ph. Preux, 
  <a
  href="../papiers/jfpda2006.pdf">Least
    Angle Temporal Difference Learning: LATD(&lambda;)</a>,
  <a href="http://carlit.toulouse.inra.fr/JFPDA/">Journ�es
    Francophones Planification, D�cision, Apprentissage</a>,
  Toulouse, France, May 2006  (In French)
</dt>

<h3 id="2005">2005</h3>

<dt id="ewrl2005a">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  O. Ambrym-Maillard, R. Coulom, Ph. Preux,
  <a
  href="../papiers/ewrl7a.pdf">
  Parallelization of the TD(&lambda;) learning algorithm</a>,
<i>European Workshop on reinforcement Learning</i>, Naples, Oct 2005
</dt>

<dt id="ewrl2005b">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  N. Langlois, R. Coulom, Ph. Preux,
  <a
  href="../papiers/ewrl7b.pdf">
  Decomposing a value function into a sum of neural networks</a>,
<i>European Workshop on reinforcement Learning</i>, Naples, Oct 2005
</dt>

<h3 id="2004">2004</h3>

<dt id="isj2004">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  Ph. Preux, S. Delepoulle, J-Cl. Darcheville,
  <a href="../papiers/isj.draft.pdf">A
    Generic architecture for Adaptive Agents Based on 
    Reinforcement Learning</a>,
  <i>Information Sciences Journal</i>, <b>161</b>, 37--55, Elsevier, 2004. The
    on-line version is a draft.
</dt>

<h3 id="2003">2003</h3>

<dt id="ewrl2003">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  F. Montagne, S. Delepoulle, Ph. Preux,
  <a
  href="../papiers/ewrl6.pdf">A
  critic-critic architecture to combine reinforcement and supervised
  learnings</a>, 
  <i>European Workshop on reinforcement Learning</i>, Nancy, Sep 2003
</dt>

<dt id="sims2003">
<img SRC="../img/ptVert.png" width="10" height="10"  onmouseover = "montre('virtual laboratories');" onmouseout = "cache();" />  R. Duboz, �. Ramat, Ph. Preux,
  Scale transfer modeling: using emergent computation for
  coupling an ordinary differential equation system
  with a reactive agent model,
  <i>Systems Analysis Modeling and Simulation</i>, <b>43</b>(6),
    pp. 793:814, Jun 2003
</dt>

<dt id="m2m2003">
<img SRC="../img/ptVert.png" width="10" height="10"  onmouseover = "montre('virtual laboratories');" onmouseout = "cache();" />  R. Duboz, F. Amblard, �. Ramat, G. Deffuant, Ph. Preux,
  Individual-based model to enrich an aggregate model, 
  <i><a href="http://cfpm.org/m2m">Model to model workshop</a> </i>,
  Mar-Apr 2003, Marseille, France
</dt>

<dt id="mosim2003">
<img SRC="../img/ptVert.png" width="10" height="10"  onmouseover = "montre('virtual laboratories');" onmouseout = "cache();" />  R. Duboz, F. Amblard, �. Ramat, G. Deffuant, Ph. Preux,
  Utiliser les mod�les indidividus-centr�s comme laboratoires virtuels
  pour identifier les param�tres d'un mod�le agr�g�,
  <i>Proc. MOSIM 2003</i>
</dt>

<h3 id="2002">2002</h3>

<dt id="simpat2002">
<img SRC="../img/ptVert.png" width="10" height="10"  onmouseover = "montre('virtual laboratories');" onmouseout = "cache();" />  �. Ramat, Ph. Preux,
  "Virtual Laboratory Environment" (VLE): a software environment agent
  and object oriented for modeling and simulation of complex systems,
  <i>Simulation, Practice and Theory </i>, 2002
</dt>

<dt id="ecml2002">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  Ph. Preux,
  Propagation of Q-values in Tabular TD(&lambda;),
  <i><a href="http://ecmlpkdd.cs.helsinki.fi/">European Conf. 
     on machine Learning (ECML),</a></i>
  <a
   href="http://www.springer.de/comp/lncs/index.html">Springer-Verlag</a>,
   LNAI 2430, Aug. 2002 
  (<a href="../papiers/ecml2002.pdf">
    pdf</a>) (&copy; Springer-Verlag) (<a href="http://www.springerlink.com/content/x7cxpah1kxw6p7kl/">paper on Springer website</a>.)
</dt>

<dt id="biomeca2002">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville,
  Multi-segmented models to simulate vertebrate organisms,
  <i>Soci�t� de biom�canique, Archives of physiology and
  biochemistry</i>, vol 110, Valenciennes, 2002.
</dt>

<dt id="sab2002">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  J. Joz�fowiec, J-Cl. Darcheville, Ph. Preux,
  Using Markovian Decision Problems to Analyze Animal
  Performance in Random and Variable Ratio Schedules of Reinforcement,
  <a href="http://www.isab.org/sab02/">SAB 7, From Animals to Animats</a>, 
  Edinburgh, Scotland, Aug 2002
</dt>

<dt id="sqab2002">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  J. Joz�fowiec, J-Cl. Darcheville, Ph. Preux,
  Operant conditioning as a Markovian decision
  problem: application to variable and random ratio
  schedules of reinforcement, 
  poster at the <a href="http://sqab.psychology.org/">Symposium 
    for the Quantitative Analyses of Behavior</a>, Toronto, Canada, May 2002
</dt>

<dt id="lil-01-02">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  Ph. Preux, S. Delepoulle, J-Cl. Darcheville, Mod�lisation
  du comportement animal et apprentissage par renforcement, rapport interne
  LIL-01-02, Oct. 2001
  (<a href="../papiers/lil-01-02.pdf">pdf</a>)
</dt>

<h3 id="2001">2001</h3>

<dt id="eca2001">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville,
  L'apprentissage par renforcement comme r�sultat de la s�lection,
  <i>Extraction des connaissances et apprentissage</i>, 1(3), 9:30, 2001
  (<a href="../papiers/eca.pdf">pdf</a>)
</dt>

<dt id="ea2001">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville,
  Learning as a consequence of selection,
  <i>Artificial Evolution</i>, Oct 2001, Le Creusot, France,
  <a href="http://www.springer.de/comp/lncs/index.html">Springer-Verlag</a>, 
    LNCS 
  (<a href="../papiers/ea01.pdf">pdf</a>)
   (&copy; Springer-Verlag) (<a href="http://www.springerlink.com/content/lugqgwy27ypecy6b/">paper on Springer website.</a>)
</dt>

<dt id="ewrl2001">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" /> 
  Ph. Preux, Ch. Cassagnab�re, S. Delepoulle, J-C. Darcheville,
  A non supervised multi-reinforcement agents architecture
  to model the development of behavior of living organisms European Workshop
  on Reinforcement Learning (EWRL-5), Sep 2001, Utrecht, Pays-Bas 
  (<a href="../papiers/ewrl5.pdf">pdf</a>)
</dt>

<dt id="ess2001">
<img SRC="../img/ptVert.png" width="10" height="10" > 
  R. Duboz, �. Ramat, Ph. Preux, Towards a coupling
  of continuous and discrete formalisms in ecological modelling - Influences
  of the choice of algorithms and result, <I>European Simulation Symposium</I>, Oct
  2001, Marseille, France
  (<a href="../papiers/ess01.doc">doc</a>)
</dt>

<dt id="mdi2001">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville, Dynamique
  de l'interaction, Mod�les Formels de l'Interaction, Mai 2001, Toulouse
  (<a href="../papiers/mfi01.pdf">pdf</a>)
</dt>

<dt id="evolearn2001">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville, Selection
  of Behavior in Social Situations - Application to the development of coordinated
  movements, First European Workshop on Evolutionary Learning, EuroGP 2001,
  <a href="http://www.springer.de/comp/lncs/index.html">Springer-Verlag</a>, 
  LNCS Avr 2001, Como, Italie 
  (<a href="../papiers/el.pdf">pdf</a>)
  (&copy; Springer-Verlag)(<a href="http://www.springerlink.com/content/m9cgb57erwfg4mx6/">paper on Springer website.</a>)
</dt>

<dt id="mosim2001">
<img SRC="../img/ptVert.png" width="10" height="10"  onmouseover = "montre('virtual laboratories');" onmouseout = "cache();" />  �. Ramat, Ph. Preux, Virtual Laboratory Environment
  (VLE) : un environnement multi-agents et objets pour la mod�lisation
  et la simulation de syst�mes complexes, <a href="http://www.utt.fr/mosim01/">MOSIM</a>
  Avr 2001, Troyes, France
  (<a href="../papiers/mosim.doc">doc</a>)
</dt>

<dt id="cbgi2001">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  Ph. Preux, S. Delepoulle, J-C. Darcheville, Selection
  of behaviors by their consequences in the human baby, software agents,
  and robots, Computational Biology, Genome Information Systems and Technology
  Mar 2001, Durham, USA (<a href="../papiers/cbgi01.pdf">pdf</a>)
</dt>

<h3 id="2000">2000</h3>

<dt id="mjba2000a">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville, Simulation
  of social behaviors: why and how?, M. J'al. of Behavior Analysis, 26(2),
  191:209, Sep 2000
</dt>

<dt id="mjba2000b">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  J. Josefowiecz, J-Cl. Darcheville, Ph. Preux, An
  operant approach to the prisoners' dilemma: indirect reinforcement of controlling
  behaviors in simple reinforcement learning agents allows the emergence
  of stable cooperation, M. J'al. of Behavior Analysis, 26(2), 211:227, Sep
  2000
</dt>

<dt id="jfiadsma2000">
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  E. Ramat, Ph. Preux, Virtual Laboratory Environment
  (VLE): un environnement multi-agents pour la mod�lisation et la
  simulation d'�cosyst�mes, Syst�mes Multi-agents -
  M�thodologie, technologie et exp�riences (JFIADSMA 2000),
  Herm�s, pp. 252:258, Septembre 2000
</dt>

<dt id="nsi2000">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-Cl. Darcheville, Un syst�me
  coop�ratif pour la simulation comportementale. Application au contr�le
  d'un bras mobile, <a href="http://www.supelec-rennes.fr/nsi2000/aac.txt">Neurosciences
  et sciences de l'ing�nieur</a>, Rennes, France, Septembre 2000
  (<a href="../papiers/nsi2000.pdf">pdf</a>)
</dt>

<dt id="emeab2000">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, J-Cl. Darcheville, Ph. Preux, Cooperation
  in dependent situation: experiment on dyads,
  <a href="http://www.u-picardie.fr/~LaboECCHAT/EMEAB4/VersionFran/Sommaire.html">European
   Meeting on the Experimental Analysis of Behabior</a>, Amiens, France, Juillet
  2000
</dt>

<dt id="aslo2000">
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  L. Seuront, E. Ramat, Ph. Preux, Y. Lagadeuc, An
  Individual-Based Approach of Zooplankton Behavior in Microscale Phytoplankton
  Patches, American Society for Limnology and Oceanography Annual Meeting,
  Juin 2000, Copenhague, Danemark
</dt>

<dt id="wra2000">
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  Y. Lagadeuc, V. Gentilhomme, F. Lizon, L. Seuront,
  Ph. Preux, E. Ramat, J-C. Poggiale, Vers une �tude des transferts
  d'�chelles en �cologie planctonique, workshop ressources
  aquatiques : mod�lisation, contr�le, effets physiques et oc�anographie,
  Mai 2000, Marrakech
</dt>

<h3 id="1999">1999</h3>

<dt id="itor1999">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, E-G. Talbi, Towards Hybrid Evolutionary
  Algorithms, International Transactions in Operational Research, vol. 6,
  557:570, 1999 (&copy; Elsevier) <a href="../papiers/itor.draft.pdf">pdf draft version</a>
</dt>

<dt id="ea1999">
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-Cl. Darcheville,
  Evolution of cooperation within a behavior-based perspective,
  <a href="http://www-lil.univ-littoral.fr/EA99">Evolution Artificial</a>, 
  <a href="http://www.springer.de/comp/lncs/index.html">Springer-Verlag</a>, 
  Lecture Notes in Computer Science 1829,
  2000
  (<a href="../papiers/ea99.pdf">pdf</a>)
  (&copy; Springer-Verlag) <a href="http://www.springerlink.com/content/614t2822535mq081/">paper on Springer website.</a>)
</dt>

<dt>
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  L. Seuront, F. Schmitt, Y. Lagadeuc, E. Ramat, Ph.
  Preux, Turbulence intermittency and small-scale phytoplankton patchiness:
  effects on plankton trophodynamics, XXIV General Assembly of the European
  Geophysical Society, Den Haag, The Netherlands, Avril 1999
</dt>

<dt id="lil-99-5">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, D. Robilliard, C. Fonlupt, E-G. Talbi,
  V. Bachelet, Reaching summits is not wandering, or, Getting insight into
  problem landscapes to go higher, faster, Technical Report LIL-99-5, Jan
  1999
  (<a href="../papiers/lil-99-5.pdf">pdf</a>)
</dt>

<dt id="lil-99-4">
<dt><img SRC="../img/ptVert.png" width="10" height="10" /> 
  Yvan Lagadeuc, Laurent Seuront, Eric Ramat, Philippe
  Preux, Pascal Pitiot, Vanessa Denis, Laurent Falk, Herv� Vivier,
  Microscale turbulence intermittency and zooplankton dynamics: how to include
  behavioral components? Technical Report LIL-99-4, F�v 1999
</dt>

<dt id="lil-99-3">
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  Eric Ramat, Philippe Preux, Laurent Seuront, Yvan
  Lagadeuc, Multi-agent modeling of the physical/biological coupling - A
  case study in marine biology, Technical Report LIL-99-3, F�v 1999
  (<a href="../papiers/lil-99-3.pdf">pdf</a>)
</dt>

<dt id="ecco1999a">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, D. Robilliard, C. Fonlupt, 
  Simplicity can meet efficiency - The case of the TSP, (1 page abstract)
  <a href="http://www.prism.uvsq.fr/~vdc/ECCO/ECCOXII.html">Twelfth
   Meeting of the European Chapter on Combinatorial Optimization</a>, Bendor,
   Mai 1999
  (<a href="../papiers/ecco12-tsp.pdf">pdf</a>)
</dt>

<dt id="ecco1999b">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, D. Duvivier,
  Creating gradient to help local search algorithm - Application to tabu search for the simple 
  Job-Shop-Scheduling Problem, 
  (1 page abstract) 
  <a href="http://www.prism.uvsq.fr/~vdc/ECCO/ECCOXII.html">Twelfth
    Meeting of the European Chapter on Combinatorial Optimization</a>, Bendor,
  Mai 1999
  (<a href="../papiers/ecco12-jsp.pdf">pdf</a>)
</dt>

<dt id="meta-heuristics-book">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, D. Robilliard, Ph. Preux, E-G. Talbi,
  "Fitness Landscape and Performance of Meta-Heuristics", in Meta-Heuristics
  - Advances and Trends in Local Search Paradigms for Optimization, Stefan
  Voss, Silvano Martello, Ibrahim Osman, Catherine Roucairol (eds), chap.
  18, Kluwer Academic Press, 255-266, 1999
  (<a href="../papiers/mic.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-Cl. Darcheville, Coop�ration
  en situation d'interaction minimale : quelle simulation ? Colloque ACCION
  "L'interdisciplinarit� en sciences de la cognition", Marseille,
  Jan 1999
</dt>

<dt>
  <img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, <i>R�flexions sur quelques syst�mes complexes et leur
   dynamique</i>, m�moire d'habilitation � diriger les recherches, 
   ULCO, Calais, Jan 1999
</dt>

<h3 id="1998">1998</h3>

<dt id="IEEEsmc1998">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, C. Fonlupt, D. Robilliard,
  E-G. Talbi, The fitness function and its impact on Local Search Methods,
  <a href="http://www.engr.rutgers.edu/~smc98">IEEE
   Systems, Man, and Cybernetics</a>, La Jolla, USA, Oct. 1998
  (<a href="../papiers/ieee98smc.pdf">pdf</a>)
</dt>

<dt id="ppsn1998">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, D. Robilliard, Ph. Preux, A Bit-Wise
  Epistasis Measure for Binary Search Spaces PPSN 98, Amsterdam, 
  <a href="http://www.springer.de/comp/lncs/index.html">Springer-Verlag</a>,
  LNCS, Oct 1998 (<a href="../papiers/ppsn98.pdf">pdf</a>)
  (&copy; Springer-Verlag)
</dt>

<dt>
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  E. Ramat, Ph. Preux, L. Seuront, Y. Lagadeuc, Mod�lisation
  et simulation multi-agents en biologie marine - �tude du comportement
  du cop�pode,
  <a href="http://wwwlisc.clermont.cemagref.fr/SMAGET.htm">Mod�les
  et Syst�mes Multi-Agents pour la Gestion de l'Environnement et des
  Territoires (SMAGET'98)</a>, Clermont-Ferrand, Oct 1998
  (<a href="../papiers/smaget98.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  J. Jos�fowicz, J-C. Darcheville, Ph. Preux,
  L'�mergence de comportements de contr�le chez des agents s�lectionnistes
  leur permet de r�soudre le dilemme du prisonnier, Journ�es
  Francophones d'Apprentissage, 174-185, Arras, Mai 1998
</dt>

<dt>
<img SRC="../img/ptBleu.png" width="10" height="10" onmouseover = "montre('reinforcement learning');" onmouseout = "cache();" />
  S. Delepoulle, Ph. Preux, J-C. Darcheville, R�partition
  des t�ches : coop�ration et apprentissage par renforcement,
  Journ�es Francophones d'Apprentissage, 201-204, Arras, Mai 1998
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  V. Bachelet, E-G. Talbi, Ph. Preux,
  Diversifying Tabu Search by Genetic Algorithms,
  1998, INFORMS/CORS 1998, Montreal, Canada
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, P. Preux, D. Robillard, E-G. Talbi, Paysages
  des probl�mes NP-durs et m�taheuristiques, 1er congr�s
  "Recherche Op�rationnelle et Aide � la d�cision" (ROAD-F),
  Paris, Jan 1998
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, Impact de la fonction objectif
  sur les performances des algorithmes it�ratifs de recherche locale,
  1er congr�s "Recherche Op�rationnelle et Aide � la
  d�cision" (ROAD-F), Paris, Jan 1998
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  V. Bachelet, Z. Hafidi, Ph. Preux, E-G. Talbi, Vers
  la coop�ration de m�taheuristiques parall�les, <i>Calculateurs
  Parall�les, R�seaux et Syst�mes R�partis</i>, <b>10</b>(2),
  211-223, Avril 1998
  (<a href="../papiers/lil-97-14.pdf">pdf</a>)
</dt>

<h3 id="1997">1997</h3>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, D. Robilliard, C. Fonlupt, "Fitness Landscape
  Of Combinatorial Problems And The Performance Of Local Search Algorithms",
  Rapport interne LIL-97-13, Nov 1997
  (<a href="../papiers/lil-97-13.pdf">pdf</a>)
</dt>

<dt id="ea1997">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, D. Robilliard, Ph. Preux, "Fitness Landscape
  and the Behavior of Heuristics", Proc. Evolution Artificielle'97
  (<a href="../papiers/ea97.pdf">pdf</a>)
</dt>

<dt id="ecal1997">
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  B. Cuvelier, C. Cambier, Ph. Preux, 
  Studying adaptation with Echo,
  <a href="http://www.cogs.susx.ac.uk/ecal97/present.html">European
    Conference on Artificial Life (ECAL'97)</a>, Aug. 97
  (<a href="../papiers/ecal97.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, D. Robilliard, Ph. Preux "Preventing
  Premature Convergence via Cooperating Genetic Algorithms" Proc. Mandel'97,
  Brno, Czeck Republic, June 1997
  (<a href="../papiers/mandel97.pdf">pdf</a>)
</dt>

<dt id="ecco1997a">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  V. Bachelet, Ph. Preux, E-G. Talbi, "The Landscape
  of the Quadratic Assignment Problem and Local Search Methods", (1 page)
  Tenth Meeting of the European Chapter on Combinatorial Optimization, Teneriffe,
  Canary Islands, May 1997
  (<a href="../papiers/eccoX-bpt.pdf">pdf</a>)
</dt>

<dt id="ecco1997b">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, D. Robilliard, C. Fonlupt "Fitness Landscape
  And The Performance Of Local Search Algorithms", (1 page) Tenth Meeting
  of the European Chapter on Combinatorial Optimization, Teneriffe, Canary
  Islands, May 1997
  (<a href="../papiers/eccoX-prf.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptVert.png" width="10" height="10" /> 
  C. Cambier, E. Perrier, J-P. Treuil, Ph. Preux, "Action
  Physique et g�om�trique. Contribution a une reflexion sur
  l'utilisation des processus physiques. Application RIVAGE", Poster aux
  Journ�es Francaise IAD et SMA, Sophia-Antipolis, France, Avril 1997
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, Ph. Preux, E-G. Talbi, "Paysages adaptatifs
  des problemes NP-durs et performance des meta-heuristiques", (in french)
  Feb. 97
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, C. Fonlupt, D. Robiliard,
  E-G. Talbi, "The fitness function and its impact on Local Search Methods",
  Rapport interne LIL-97-4, F�v. 97, mis � jour Sep. 97
  (<a href="../papiers/lil-97-4.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, D. Robilliard, Ph. Preux, "Some Results
  on the structure of the TSP and its Search Space", Technical report LIL-97-3,
  Jan 97
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  C. Fonlupt, D. Robilliard, Ph. Preux, "A comparison
  of the 2-opt-move and the city-swap operators for the TSP", Technical report
  LIL-97-2, Jan. 1997
</dt>

<h3 id="1996">1996</h3>

<dt id="ppsn1996">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, E-G. Talbi, "Climbing-Up
  NP-Hard Hills", Proc. Parallel Problem Solving from Nature'96, 
  <a href="http://www.springer.de/comp/lncs/index.html">Springer-Verlag</a>, 
   Lecture Notes in Computer Science, Berlin, Sep. 1996
  (<a href="../papiers/lil-96-1.pdf">pdf</a>)
  (&copy; Springer-Verlag)
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" />
  V. Bachelet, Ph. Preux, E-G. Talbi, "Parallel Hybrid
  Meta-Heuristics: Application to the Quadratic Assignment Problem", Proc.
  Parallel Optimization Colloquium, Versailles, Mar. 1996
  (<a href="../papiers/lil-96-2.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, E-G. Talbi, "Genetic Algorithms
  Applied to the Job-shop Scheduling Problem", Proc. FUCAM'96, Mons, Belgique,
  Sep. 1996 (<a href="../papiers/fucam96.pdf">pdf</a>)
</dt>

<h3 id="1995">1995</h3>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, E-G. Talbi, "Algorithmes
  g�n�tiques parall�les pour l'optimisation : application aux probl�mes de
  job-shop et d'affectation quadratique", Proc. Francoro'95, Mons, Belgique,
  Jun. 1995
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, E-G. Talbi, "Parallel
  Genetic Algorithms for Optimization and Application to NP-Complete Problem
  Solving", Proc. CCS'95, Brest, France, Jui. 1995
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, E-G. Talbi, "Assessing the Evolutionary
  Algorithm Paradigm to Solve Hard Problems", Technical Report LIL-95-4,
  (<a href="../papiers/lil-95-4.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" />
  Ph. Preux, E-G. Talbi, "Assessing the Evolutionary
  Algorithm Paradigm to Solve Hard Problems", Proc. Workshop on Studying
  and Solving Really Hard Problems, Constraint Processing'95, Marseille,
  (Sep. 1995) This is a summary of pub. LIL-95-4
  (<a href="../papiers/cp95-workshop.pdf">pdf</a>)
</dt>

<dt>
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  D. Duvivier, Ph. Preux, E-G. Talbi, "Stochastic Algorithms
  for Optimization and Application to Job-Shop-Scheduling", Technical Report
  LIL-96-5, Sep 1995
  (<a href="../papiers/lil-95-5.pdf">pdf</a>)
</dt>

<h3 id="1994">1994</h3>

<dt id=ea94">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, "Etude de l'uniformisation de la population
  des algorithmes g�n�tiques", (in french) Proc. Evolution Artificielle'94,
  Toulouse (in french), (Sep. 94)
  (<a href="../papiers/lil-94-5.pdf">pdf</a>)
</dt>

<dt id="ecaiWorkshop1994">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, "A study of population uniformization
  in GAs" Proc. of the workshop on applied genetic and other evolutionary
  techniques, ECAI'94, Amsterdam, The Netherlands (Aug 1994)
  (<a href="../papiers/lil-94-2.pdf">pdf</a>)
</dt>

<dt id="lil-94-1">
<img SRC="../img/ptRose.png" width="10" height="10" onmouseover = "montre('genetic algorithms, combinatorial optimization');" onmouseout = "cache();" /> 
  Ph. Preux, "Les algorithmes �volutifs", (in french)
  Technical report LIL-94-1, Second edition (oct. 95)
  (<a href="../papiers/lil-94-1.pdf">pdf</a>)
</dt>

<p><img SRC="../img/longerColorLine.png"  align=CENTER>

<p>

While working on my PhD and a bit later, I was with the <a
  href="http://www.lifl.fr/">Laboratoire d'Informatique
	Fondamentale de Lille</a>, at the
<a href="http://www.univ-lille1.fr/">Universit� de Lille 1</a>. 
There, I studied vector supercomputers, their architecture, and
supercompilers (compilers for supercomputers). Below, there is the
list of publications related to this phase of my life. I do not work
on these things any more for a very long time... These are not
available on this page.

<h3 id="1992">1992</h3>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, "Load-Store
Dependence and Data-Parallel Code Generation", Proc. CONPAR 92/VAPP V,
pp. 805--806 L. Bouge, M. Cosnard, Y. Robert, D. Trystram (eds), 1992,
Lyon, France, Springer-Verlag, Lecture Notes in Computer Science, vol 634</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, "A Multi-Level
Environment for Data-Parallel Code Generation", Proc. European Workshops
on Parallel Computing, 1992, Wouter Joosen, Elie Milgrom (eds), pp. 252--255,
IOS Publisher, Barcelona, Spain</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
M.T. Kechadi, -L. Dekeyser, Ph. Marquet, Ph. Preux, <a href="http://dl.acm.org/citation.cfm?id=140523">"Performance improvement for vector pipeline multiprocessor systems using a disordered execution model"</a>, poster at the ISCA, 1992, Australia, ACM SIGARCH News, <b>20</b>(2), pp. 433</dt>

<h3 id="1991">1991</h3>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, M. Tahar Kechadi, Ph. Marquet, Ph.
Preux, "Disordered Vector Pipelined Processor", Proc. ISMM Workshop on
Parallel Computing, pp. 36--39, 1991 Trani, Italie</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, "PARTNER:
An Environment for Parallel Scientific Computing", Proc. ISMM Workshop
on Parallel Computing, pp. 288--291, Trani, Italie, 1991</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, "LSD2: An
Embedded Language for Massively Parallel and Vector Pipeline Programming",
Proc. Parallel Computing'91, London</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
Ph. Preux, MAD : une machine virtuelle vectorielle - Cons�quences sur les architectures vectorielles, PhD dissertation, Lille, Jan 1991</dt>

<h3 id="1990">1990</h3>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, "DEVIL: An
Intermediate Vector Language - Definition and Implementation", Proc.
Int'l Workshop on Compilers for Parallel Computers, 1990, pp. 273--284,
Paris</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, <a href="http://www.sciencedirect.com/science?_ob=ArticleURL&_udi=B75C7-4998V1K-RK&_user=10&_coverDate=08%2F31%2F1990&_rdoc=1&_fmt=high&_orig=search&_sort=d&_docanchor=&view=c&_rerunOrigin=google&_acct=C000050221&_version=1&_urlVersion=0&_userid=10&md5=c3f86030dbe711b0be0630cfd7cc1afd">Vector Addressing Processor for Direct and Indirect Accesses</a>, Microprocessing and Microprogramming,
<b>29</b>(1), 657:664, 1990</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, <a href="http://portal.acm.org/citation.cfm?id=87466&dl=GUIDE&coll=GUIDE&CFID=80213841&CFTOKEN=49119393">EVA: an Explicit Vector lAnguage. An Alternative Language to Fortran 90 (former 8x)</a>, <i>ACM SIGPLAN Notices</i>, <b>25</b>(8)52:71, Aug. 1990
Paris</dt>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Marquet, Ph. Preux, "EVA: An Explicit
Vector Language", Proc. 10 SCCC Int'l Conf. on Computer Science, 1990,
Santiago, Chili, pp. 233--244</dt>

<h3 id="1989">1989</h3>

<dt>
<img SRC="../img/ptJaune.png" width="10" height="10" onmouseover = "montre('vector pipeline supercomputers');" onmouseout = "cache();" /> 
J-L. Dekeyser, Ph. Preux, "Indirect Memory Decoding
for Vector Accesses", Proc. of the 1989 Int'l Symp. on Computer Architecture
and Digital Signal Processing, 1989, pp. 293--298, Hong-Kong</dt>



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
