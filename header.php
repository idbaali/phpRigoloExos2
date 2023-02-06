       <!-- Début du recherche PHP -->
<?php
$TitrePage = 'exo de PHP';
$DescriptionPage = 'C\'est de la lolade !';
$KeywordsPage = 'ce,que,tu,veux';
//  echo $_SERVER['REQUEST_URI'];
foreach ($menu as $item) {
if ($_SERVER['REQUEST_URI'] == $item['link']) {
            $TitrePage = $item['titre'];
            $DescriptionPage = $item['description'];
            $KeywordsPage = $item['keywords'];       
}
}
?>
        <!-- Fin d'association PHP  -->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $TitrePage ?></title>
<meta name="description" content="<?php echo $DescriptionPage ?>" />
<meta name="keywords" content="<?php echo $KeywordsPage ?>">

<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/menufullpage.css" rel="stylesheet" type="text/css">

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="/js/jquery.cropit.js"></script>

<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>

</head>

<body>
<a href="#menu" class="menu-link">
        <span>toggle menu</span>
</a>
<nav id="menu" class="panel" role="navigation">
<ul>
<li>
        <!-- Début menu à remplacer avec les tableaux de config.php -->
<?php
$i = 1;
foreach($menu as $item) {
    echo '<div><a href="'.$item['link'].'">'.$item['titre'].'</a></div>';
    
    if($i % $NbreElementLigne == 0 && $i < count($menu)) {
        echo '</li><li>';
    } elseif ($i == count($menu)) {
        echo '</li>';
    }
    $i++;
}
?>
</ul>
</li>
</nav>
<!-- <div><a href="/helpers/">Les helpers</a></div>
<div><a href="/classe/">La classe</a></div>
<div><a href="/note/">La note</a></div>
</li><li>
<div><a href="/menu/">Le menu</a></div>
<div><a href="/referencement/">Référencement</a></div>
<div><a href="/vignettes/">Les vignettes</a></div>
</li><li>
<div><a href="/morpion/">Le morpion</a></div>
<div><a href="/news/">Les news</a></div>
<div><a href="/fichier-csv/">Fichier CSV</a></div>
</li></ul> -->



        <!-- Fin menu à remplacer avec les tableaux de config.php -->
