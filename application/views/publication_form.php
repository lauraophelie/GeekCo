<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-icons.css">
<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/css/styles.min.css">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/script.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2" style="padding: 0px;padding-top: 10px;padding-bottom: 10px;">
            <div style="padding: 0px;padding-top: 75px;width: 100%;">
                <div id="insertion_publication" class="mainbox">
                    <div style="width: 100%;margin: auto;">
                        <h4>Insertion de publication</h4>
                        <form action="<?php echo site_url("Publication/savePublication"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group"><select name="categorie" class="form-control" id="selectTypePublication-1">
                                <?php foreach($categorie as $categories) { ?>
                                    <option value="<?php echo $categories['id']; ?>"><?php echo $categories['designation']; ?></option>
                                <?php } ?>
                                </select></div>
                            <div class="form-group"><textarea name="pub" class="form-control" id="description-2" rows="5" placeholder="Ecrivez quelque chose"></textarea></div>
                            <div class="form-group"><input type="file" class="form-control-file" id="inputFile-1" name="image"></div>
                            <div style="text-align: right;"><button class="btn btn-primary" type="submit" style="width: 125px;height: 40px;border-radius: 15px;">Publier</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
