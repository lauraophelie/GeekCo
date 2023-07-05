<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Acceuil </title>
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
    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2" style="padding: 0px;padding-top: 10px;padding-bottom: 10px;">
            <div style="padding: 0px;padding-top: 75px;width: 100%;">
                <div id="projet" class="mainbox">
                  <a href="<?php echo site_url('Event/events'); ?>"><div class="text-end"><button class="btn btn-secondary" type="button">Retour</button></div> </a>
                    <h1 style="text-align: center;margin-bottom: 20px;margin-top: -40px;"><?php echo $event['name_event']; ?></h1>
                    <div style="display: flex;">
                        <div style="width: 350px;"><img src="<?php echo site_url('asset/img/'.$event['photo']);?>" style="width: 100%;"></div>
                        <div style="width: 300px;margin-left: 25px;">
                            <div style="width: 100%;margin: auto;">
                                <h4 style="text-align: center;margin: auto;margin-bottom: 25px;">Details de l'evenement</h4>
                            </div>
                            <div style="margin-bottom: 15px;"><span style="font-size: 12px;font-weight: bold;">Emplacement :</span><span style="font-size: 12px;margin-left: 9px;"> <?php echo $event['emplacement']; ?>&nbsp;</span></div>
                            <div style="margin-bottom: 15px;"><span style="font-size: 12px;font-weight: bold;">Date :</span><span style="font-size: 12px;margin-left: 9px;"><?php echo $event['date_event']; ?></span></div>
                            <div style="margin-bottom: 15px;"><span style="font-size: 12px;font-weight: bold;">Heure :</span><span style="font-size: 12px;margin-left: 9px;"><?php echo $event['time_event']; ?></span></div>
                            <div style="margin-bottom: 15px;"><span style="font-size: 12px;font-weight: bold;">Nombre de place :</span><span style="font-size: 12px;margin-left: 9px;"><?php echo $event['nombreplace']; ?></span></div>
                            <div style="margin-bottom: 15px;"><span style="font-size: 12px;font-weight: bold;">Prix ticket :</span><span style="font-size: 12px;margin-left: 9px;"><?php echo $event['prix']; ?> Ar</span></div>
                            <div style="margin-bottom: 15px;"><span style="font-size: 12px;font-weight: bold;">Description</span><span style="font-size: 12px;margin-left: 9px;"><?php echo $event['description']; ?></span></div>
                            <h4 style="text-align: center;margin: auto;margin-bottom: 25px;">Acheter tickets</h4>
                            <form  action="<?php echo site_url('Event/achatticket/'.$event['idevent']); ?>" method="post">
                              <?php if(isset($error)){ ?>
                                <div style="color:red;font-size: x-small;" class="title">
                                  <?php echo $error; ?>
                                </div>
                              <?php } ?>
                              <label class="form-label">Combien? :</label>
                              <input class="form-control" name="isany" type="number" style="margin-bottom: 15px;" require>
                              <input type="hidden" name="prix" value="<?php echo $event['prix']; ?>">                              
                              <div style="width: fit-content;margin: auto;"><input class="btn btn-primary" type="submit" value="Acheter"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script src="<?php echo site_url('asset/js/script.js');?>"></script>
  <script src="<?php echo site_url('asset/dist/js/bootstrap.bundle.min.js');?>"></script>

</body>
</html>
  <div class="container">
              <div class="form-group" style="text-align:center;margin-top: 30px;">
                <a href="<?php echo site_url('Event/listesachat/'.$event['idevent']);?>"><button class="btn btn-primary" style="border:none;background-color:#0AB68B;">Listes</button></a>
              </div>
              <br>
          </div>
        </div>
        <div class="btnchoice" style="display: flex;flex-wrap: wrap;justify-content: space-evenly;margin-top: 30px;">
          <a href="<?php echo site_url('Event/avant_modif_event/'.$event['idevent']); ?>">
              <div class="form-group" style="text-align:center">
                <input type="submit" value="Modifier" class="btn btn-primary" style="border:none;background-color:#0AB68B;">
              </div>
          </a>
          <form action="<?php echo site_url('Event/delete_event/'.$event['idevent']); ?>" method="post">
            <input type="hidden" name="name" value="<?php echo $event['name_event']; ?>">
            <input type="hidden" name="emplacement" value="<?php echo $event['emplacement']; ?>">
            <input type="hidden" name="date" value="<?php echo $event['date_event']; ?>">
            <input type="hidden" name="time" value="<?php echo $event['time_event']; ?>">
            <input type="hidden" name="short" value="<?php echo $event['short_description']; ?>">
            <input type="hidden" name="place" value="<?php echo $event['nombreplace']; ?>">
            <input type="hidden" name="photo" value="<?php echo $event['photo']; ?>">
            <input type="hidden" name="prix" value="<?php echo $event['prix']; ?>">
            <input type="hidden" name="full" value="<?php echo $event['description']; ?>">
            <div class="form-group" style="text-align:center">
              <input type="submit" value="Supprimer" class="btn btn-primary" style="border:none;background-color:#0AB68B;">
            </div>
          </form>
        </div>
    </div>
    </main>