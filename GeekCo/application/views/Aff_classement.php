<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2" style="padding: 0px;padding-top: 10px;padding-bottom: 10px;">
            <div style="padding: 0px;padding-top: 75px;width: 100%;">
                <div id="classement" class="mainbox">
                    <div style="width: 100%;margin: auto;">
                        <form action="<?php echo base_url('ClassementController/classement_periode_choisie'); ?>" method="post">
                            <div class="form-group"><input name="mois" type="text" class="form-control form-control form-control form-control form-control form-control" id="description-2" rows="5" placeholder="Mois"></div>
                            <div class="form-group"><input name="annee" type="text" class="form-control-file" id="inputFile-1" placeholder="Annee"></div>
                            <div style="text-align: right;"><button class="btn btn-primary" type="submit" style="width: 125px;height: 50px;">Valider</button></div>
                        </form>
                    </div>
                    <div style="width: 100%;margin: auto;">
                        <h4>Classement des utilisateurs</h4>
                        <ul class="list-group">

                            <?php $i = 1;
                            foreach ($classement as $ligne) { ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <h4><?php echo $i; ?></h4>
                                        </div>
                                        <div class="col-md-2"><img class="img-fluid" src="" alt="Photo de profil" style="width: 100%;border-radius: 75px;"></div>
                                        <div class="col-md-5">
                                            <h5 class="mb-1"><?php echo $ligne['pseudo']; ?></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1"><?php echo $ligne['total_reaction']; ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php $i++;
                            } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>