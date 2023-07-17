<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap-icons.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/styles.min.css'); ?>">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/script.min.js"></script>


<div id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reasonModalLabel">Raisons du signalement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pourquoi voulez-vous signaler cette <?php echo $type; ?>?</p>
                <form action="<?php echo site_url('comportement/EnregistrerSignalement'); ?>" method="POST" >
                    <div class="form-check">
                        <input type="hidden" name="type" value=<?php echo $type; ?>>
                        <input type="hidden" name="idobjet" value=<?php echo $idobjet; ?>>
                        <!-- <input class="form-check-input" type="checkbox" value="1" id="reasonSpam"> -->
                        <label class="form-check-label" for="reasonSpam">
                        <?php foreach ($raisons as $raison) { ?>
                            <p><input type="radio" name="idraison" value=<?php echo $raison->idmotif; ?> onclick="disableOtherRadios(this)"> <?php echo $raison->designation; ?></p>
                        <?php } ?>
                        </label>
                    </div>                  
                
                    </div>
                    <!-- <div class="modal-footer">                 -->
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> -->
                        <button type="submit" class="btn btn-primary">Signaler</button>
                    <!-- </div> -->
                </form>
        </div>
    </div>
</div>
          
        <div>


<script>
    function uncheckOtherRadios(selectedRadio) {
    const radios = document.getElementsByName(selectedRadio.name);

    for (let i = 0; i < radios.length; i++) {
        if (radios[i] !== selectedRadio) {
        radios[i].checked = false;
        }
    }
    }
</script>
</html>