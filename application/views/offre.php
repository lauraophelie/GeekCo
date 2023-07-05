<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2" style="padding: 0px;padding-top: 10px;padding-bottom: 10px;">
            <div style="padding: 0px;padding-top: 75px;width: 100%;">
                <div id="insertion_emploi" class="mainbox">
                    <div style="width: 100%;margin: auto;">
                        <h4>Offre de stage, bourse ou emploi</h4>
                        <form action="<?php echo site_url("offre/saveOffre"); ?>" method="post">
                            <div class="form-group"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description-1" rows="5" placeholder="Entrez une description" name="offre"></textarea></div>
                            <div class="form-group"><label class="form-label" for="selectLieu">Lieu</label><select class="form-control" id="selectLieu-1" name="lieu">
                                    <?php foreach ($lieux as $lieu) { ?>
                                        <option value="<?php echo $lieu['nom_lieu']; ?>"><?php echo $lieu['nom_lieu']; ?></option>
                                    <?php } ?>
                                </select></div>
                            <div class="form-group"><label class="form-label" for="selectOffre">Offre</label><select class="form-control" id="selectOffre-1" name="type">
                                    <?php foreach ($types as $type) { ?>
                                        <option value="<?php echo $type['designation']; ?>"><?php echo $type['designation']; ?></option>
                                    <?php } ?>
                                </select></div>
                            <div class="form-group"><label class="form-label" for="datePicker">Date de validite</label><input class="form-control" type="date" id="datePicker-1" name="dateFin"></div>
                            <div style="text-align: right;"><button class="btn btn-primary" type="submit" style="width: 125px;height: 40px;border-radius: 15px;">Publier</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>