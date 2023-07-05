<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2" style="padding: 0px;padding-top: 10px;padding-bottom: 10px;">
            <div style="padding: 0px;padding-top: 75px;width: 100%;">
                <div id="resultat_recherche" class="mainbox">
                    <div style="width: 100%;margin: auto;">
                        <h4 style="width: auto;">Liste des offres disponibles</h4>
                        <div class="list-group" style="width: auto;">
                            <?php for ($i = 0; $i < count($offre); $i++) { ?>
                                <a class="list-group-item list-group-item-action" href="#">
                                    <div class="d-flex justify-content-between w-100">
                                        <h6 class="mb-1">Propriétaire : <?php echo $offre[$i]['nom'] . " " . $offre[$i]['prenom']; ?></h6><small>Date de fin : <?php echo $offre[$i]['fin_validite']; ?></small>
                                    </div>
                                    <p class="mb-1" style="font-size: 12px;"><?php echo $offre[$i]['texte']; ?></p>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php for ($i = 0; $i < count($actualite); $i++) {
                    if ($actualite[$i]['designation'] == 'publication') { ?>
                        <div class="mainbox">
                            <div style="text-align: right;">
                                <a href="<?php echo base_url('Actualite/signalactualite/' . $actualite[$i]['id']) ?>" data-toggle="modal" data-target="#reasonModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" style="font-size: 25px;padding: 0px;margin-left: 7px;">
                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"></path>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                                    </svg></a>
                            </div>
                            <div style="width: 100%;height: fit-content;margin: auto;margin-top: -40px;">
                                <div style="height: fit-content;display: flex;width: fit-content;margin: 0;padding: 10px;margin-top: 15px;">
                                    <div style="width: 50px;"><img src="<?php echo base_url('assets/img/' . $actualite[$i]['image_users']); ?>" style="width: 100%;border-radius: 72px;"></div>
                                    <div style="width: fit-content;margin-left: 12px;">
                                        <h6><?php echo $actualite[$i]['pseudo']; ?></h6><span style="color: rgba(33,37,41,0.75);"><?php echo $actualite[$i]['date_publication']; ?></span>
                                    </div>
                                    <div></div>
                                </div>
                                <div style="height: fit-content;width: fit-content;">
                                    <p style="height: auto;width: fit-content;color: #404040;font-size: 12px;">
                                        <?php echo $actualite[$i]['texte']; ?>
                                    </p>
                                </div>
                            </div>
                            <div style="width: fit-content;height: auto;margin: auto;"><img src="<?php echo base_url('assets/img/' . $actualite[$i]['path_image']); ?>"></div>
                            <div style="width: fit-content;height: fit-content;margin: auto;margin-top: 10px;">
                                <div style="width: 500px;height: 25px;margin: 0;font-size: 16px;margin-top: 10px;border-top: 1px solid #2125295f;"><a href="<?php echo base_url('Actualite/addreactiononpublication/' . $actualite[$i]['id']); ?>"><i class="far fa-heart"></i></a><span style="margin-left: 6px;"><?php echo $actualite[$i]['nb_reaction'] ?> like</span></div>
                                <?php for ($j = 0; $j < count($commentaire); $j++) {
                                    if ($commentaire[$j]['id_publication'] == $actualite[$i]['id']) { ?>
                                        <div style="height: auto;display: flex;width: fit-content;padding: 0px;">
                                            <div style="width: 50px;"><img src="<?php echo base_url('assets/img/' . $commentaire[$j]['image_users']); ?>" style="width: 100%;border-radius: 72px;"></div>
                                            <div style="width: 500px;margin-left: 12px;height: fit-content;border-radius: 20px;padding: 10px;background: var(--bs-gray-400);border: 1px none #2125295f;margin-bottom: 10px;">
                                                <h6><?php echo $commentaire[$j]['pseudo']; ?></h6>
                                                <p style="color: #404040;font-size: 12px;"><?php echo $commentaire[$j]['texte']; ?></p>
                                            </div>
                                            <div style="width: 30px;">
                                                <a href="#">
                                                    <i class="far fa-star" style="font-size: 25px;padding: 5px;"></i>
                                                </a>
                                                <a href="<?php echo base_url('Actualite/signalcommentaire/' . $actualite[$i]['id'] . '/' . $commentaire[$j]['id']); ?>" data-toggle="modal" data-target="#reasonModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" style="font-size: 25px;padding: 0px;margin-left: 7px;">
                                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"></path>
                                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                                                    </svg></a>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <div style="width: 85%;height: fit-content;margin: auto;margin-top: 10px;">
                                <h5 style="width: 100%;">Leave a comment</h5>
                                <form action="<?php echo base_url('Actualite/addcommentary/' . $actualite[$i]['id']); ?>" method="get"><input class="form-control" type="text" style="width: 100%;height: auto;padding: 6px 2px;margin-bottom: 15px;border: 1px solid #2125295f;border-radius: 7px;" name="commentary"></form>
                            </div>
                        </div>
                    <?php } else if ($actualite[$i]['designation'] == 'Publicite') { ?>
                        <div class="mainbox">
                            <div style="width: 100%;height: fit-content;margin: auto;margin-top: -40px;">
                                <div style="height: fit-content;display: flex;width: fit-content;margin: 0;padding: 10px;margin-top: 15px;">
                                    <div style="width: 50px;"><img src="<?php echo base_url('assets/img/' . $actualite[$i]['image_users']); ?>" style="width: 100%;border-radius: 72px;"></div>
                                    <div style="width: fit-content;margin-left: 12px;">
                                        <h6><?php echo $actualite[$i]['pseudo']; ?></h6><span style="color: rgba(33,37,41,0.75);"><?php echo $actualite[$i]['date_publication']; ?></span>
                                    </div>
                                    <div></div>
                                </div>
                                <div style="height: fit-content;width: fit-content;">
                                    <p style="height: auto;width: fit-content;  color: #404040;font-size: 12px;">
                                        <?php echo $actualite[$i]['texte']; ?>
                                    </p>
                                </div>
                            </div>
                            <div style="width: fit-content;height: auto;margin: auto;">
                                <img src="<?php echo base_url('assets/img/' . $actualite[$i]['path_image']); ?>" style="width: 100%;margin-top: 0px;border-radius: 20px;">
                            </div>
                        </div>
                    <?php } ?>
                    <hr>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- Fenêtre contextuelle pour les raisons du signalement -->
<div class="modal fade" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reasonModalLabel">Raisons du signalement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pourquoi voulez-vous signaler cette Publication/Commentaire ?</p>
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="reasonSpam">
                        <label class="form-check-label" for="reasonSpam">
                            option 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="reasonHate">
                        <label class="form-check-label" for="reasonHate">
                            option 2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="reasonInappropriate">
                        <label class="form-check-label" for="reasonInappropriate">
                            option 3
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </div>
</div>