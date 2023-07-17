<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Liste des inscrits </title>
    <link rel="stylesheet" href="<?php echo site_url('asset/style/stylelist.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/style/style.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('asset/fontawesome-5/css/all.css');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <main class="table">
        <?php if(isset($error)){ ?>
            <div style="color:red;text-align: center;font-size: x-large;margin-top: 25px;" class="title">
                <?php echo $error; ?>
                <div class="form-group" style="text-align:center">
                    <a href="<?php echo site_url('Event/detailevent/'.$id); ?>">
                        <button type="submit" class="btn btn-primary" style="border:none;background-color:#0AB68B;width: 110px;height: 50px;margin-top: 15px;">Retour</button>
                    </a>
                </div>
            </div>
        <?php } ?>
        <?php if(isset($reserve)){ ?>
            <section class="table__header">
                <h1>Listes des Reservations pour l'evenement :</h1>
                <div class="input-group">
                    <a style="text-decoration:none;" href="<?php echo site_url('Event/detailevent/'.$reserve[0]['idevent']); ?>">
                        <h1> <?php echo $reserve[0]['name_event']; ?> </h1>
                    </a>
                    </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Numero de Reservation <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Client <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date de Reservation <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Quantite <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Prix <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0;$i<count($reserve);$i++) { ?>
                            <tr>
                                <td> <?php echo $reserve[$i]['numero']; ?> </td>
                                <td> <i class="fas fa-user"></i><?php echo $reserve[$i]['client']; ?></td>
                                <td> <?php echo $reserve[$i]['date']; ?> </td>
                                <td> <?php echo $reserve[$i]['nombreplace']; ?> </td>
                                <td> <strong> <?php echo $reserve[$i]['prix']; ?> Ar </strong></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        <?php } ?>
    </main>
  <script src="<?php echo site_url('asset/js/scriptlist.js');?>"></script>
</body>
</html>