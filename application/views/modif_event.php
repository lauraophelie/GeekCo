<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Modifier un Evenement </title>
    <link rel="stylesheet" href="<?php echo site_url('asset/style/style.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/fontawesome-5/css/all.css');?>">
    <link href="<?php echo site_url('asset/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap-icons.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/styles.min.css');?>">
    <script src="<?php echo site_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo site_url('assets/js/jquery-3.3.1.slim.min.js');?>"></script>
    <script src="<?php echo site_url('assets/js/popper.min.js');?>"></script>
    <script src="<?php echo site_url('assets/js/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?php echo site_url('assets/js/script.min.js');?>"></script>
   </head>
<body>
  <aside class="sidebar" style="height: 100%;">
    <div class="side-inner" style="height: 100%;">
        <div class="profile"><img class="img-fluid" src="<?php echo site_url('asset/img/'.$personne['path_image']);?>" alt="Image">
            <h3 class="name"><a href="#"><?php echo $personne['prenom']." ".$personne['nom']; ?></a></h3>
        </div>
        <div class="nav-menu">
            <ul>
                <li><a href="#">Actualite</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">Projet</a></li>
                <li><a href="#">Groupe</a></li>
                <li><a href="<?php echo site_url('Event/events');?>">Liste des Evenements</a></li>
                <li><a href="<?php echo site_url('Event/addevent');?>">Ajouter un Evenements</a></li>
                <li><a href="<?php echo site_url('Login/logout');?>">Deconnexion</a></li>
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
  <div class="container">
        <form  action="<?php echo site_url('Event/modif_event/'.$modif['idevent']); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin-top:100px;" id="nouveau_projet" class="mainbox">
                        <div style="width: 100%;margin: auto;">
                            <h4>&nbsp;A propos de l'evenement</h4>
                            <div class="form-group"><label class="form-label" for="selectLieu" style="font-size: 12px;">Nom de l'event</label><input class="form-control" type="text" name="name" value="<?php echo $modif['name_event']; ?>" required></div>
                            <div class="form-group"><label class="form-label" for="selectLieu" style="font-size: 12px;">Emplacement</label><select name="emplacement" class="form-control" id="selectLieu-2" value="<?php echo $modif['emplacement']; ?>" required>
                                    <option value="">Tous</option>
                                    <option value="paris">Paris</option>
                                    <option value="new-york">New York</option>
                                    <option value="londres">Londres</option>
                                    <option value="tokyo">Tokyo</option>
                                </select></div>
                            <div class="form-group">
                                <div style="display: flex;">
                                    <div style="margin-right: 50px;"><label class="form-label" for="selectLieu" style="font-size: 12px;">Date</label><input class="form-control" type="date" name="date" style="width: 165.333px;" value="<?php echo $modif['date_event']; ?>" required></div>
                                    <div style="width: fit-content;"><label class="form-label" for="selectLieu" style="font-size: 12px;">Time</label><input class="form-control" type="time" name="time" style="width: 107.333px;" value="<?php echo $modif['time_event']; ?>" required></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="form-label form-label form-label" for="selectLieu" style="font-size: 12px;">Short Description</label><textarea name="short" class="form-control" require><?php echo $modif['short_description']; ?></textarea></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="margin-top:100px;" id="nouveau_projet" class="mainbox">
                        <div style="width: 100%;margin: auto;">
                            <h4>Details de l'evenement</h4>
                            <div class="form-group"><label class="form-label " for="selectLieu" style="font-size: 12px;">Presentation photo</label><input class="form-control" type="file" name="photo"></div>
                            <div class="form-group"><label class="form-label " for="selectLieu" style="font-size: 12px;">Nombre de place</label><input class="form-control" type="number" name="place" value="<?php echo $modif['nombreplace']; ?>" require></div>
                            <div class="form-group"><label class="form-label " for="selectLieu" style="font-size: 12px;">Prix ticket</label><input class="form-control " type="number" name="prix" value="<?php echo $modif['prix']; ?>"></div>
                            <div class="form-group"><label class="form-label " for="selectLieu" style="font-size: 12px;">Description</label><textarea class="form-control " name="full"><?php echo $modif['description']; ?></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: fit-content;margin: auto;"><button class="btn btn-primary" type="submit" style="width: 125px;height: 40px;border-radius: 15px;">Valider</button></div>
        </form>
    </div>
</main>
<script src="<?php echo site_url('asset/js/script.js');?>"></script>
<script src="<?php echo site_url('asset/dist/js/bootstrap.bundle.min.js');?>"></script>

</body>
</html>