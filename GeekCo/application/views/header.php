<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('asset/style/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/fontawesome-5/css/all.css'); ?>">
    <link href="<?php echo base_url('asset/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/script.min.js'); ?>"></script>
</head>

<body>
    <aside class="sidebar" style="height: 100%;">
        <div class="side-inner" style="height: 100%;">
            <div class="profile"><img class="img-fluid" src="<?php echo base_url('assets/img/' . $personne['path_image']); ?>" alt="Image">
                <h3 class="name"><a href="#"><?php echo $personne['prenom'] . " " . $personne['nom']; ?></a></h3>
            </div>
            <div class="nav-menu">
                <ul>
                    <li><a href="<?php echo site_url('Actualite/'); ?>">Actualite</a></li>
                    <li><a href="<?php echo site_url('Publication/'); ?>">Publier</a></li>
                    <li><a href="<?php echo site_url('Offre/'); ?>">Offre</a></li>
                    <li><a href="<?php echo site_url('ClassementController/'); ?>">Classement</a></li>
                    <li><a href="<?php echo site_url('Publication/index_forum/'); ?>">Forum</a></li>
                    <li><a href="#">Projet</a></li>
                    <li><a href="#">Groupe</a></li>
                    <li><a href="<?php echo base_url('Event/events'); ?>">Liste des Evenements</a></li>
                    <li><a href="<?php echo base_url('Event/addevent'); ?>">Ajouter un Evenements</a></li>
                    <li><a href="<?php echo base_url('Login/logout'); ?>">Deconnexion</a></li>
                </ul>
            </div>
        </div>
    </aside>
    <main>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light">
            <div class="container-fluid">
                <div class="toggle"><a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar"><span></span></a></div>
            </div>
        </nav>