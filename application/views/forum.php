<?php foreach($questions as $question){ ?><div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2" style="padding: 0px;padding-top: 10px;padding-bottom: 10px;">
            <div style="padding: 0px;padding-top: 75px;width: 100%;">
                <div class="mainbox">
                    <div style="text-align: right;">
                        <a href="#" data-toggle="modal" data-target="#reasonModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" style="font-size: 25px;padding: 0px;margin-left: 7px;">
                            <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"></path>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                        </svg></a>
                    </div>
                    <div style="width: fit-content;height: fit-content;margin: auto;margin-top: -40px;">
                        <div style="height: fit-content;display: flex;width: fit-content;margin: 0;padding: 10px;margin-top: 15px;">
                            <div style="width: 50px;"><img src="assets/img/person_1.jpg" style="width: 100%;border-radius: 72px;"></div>
                            <div style="width: fit-content;margin-left: 12px;">
                                <h6>Username</h6><span style="color: rgba(33,37,41,0.75);">Mai 11, 2023</span>
                            </div>
                        </div>
                        <div style="height: fit-content;width: fit-content;">
                            <p style="height: auto;width: fit-content;border-bottom: 1px solid #2125295f;color: #404040;font-size: 12px;"><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida diam sed mauris convallis,eu <br>molestie velit blandit. Donec et mi non tortor semper malesuada. Nulla a nulla aliquet, maximus odio sit<br> amet, vestibulum odio. Quisque bibendum dolor sed elit convallis, sed finibus ante imperdiet.<br><br></p>
                        </div>
                    </div>
                    <div style="width: fit-content;height: auto;margin: auto;"></div>
                    <div style="width: fit-content;height: fit-content;margin: auto;margin-top: 10px;">
                        <div style="width: 100%;height: 25px;margin: 0;font-size: 16px;margin-top: 10px;"><i class="far fa-heart"></i><span style="margin-left: 6px;">like</span></div>
                        <div style="height: auto;display: flex;width: fit-content;margin: auto;padding: 0px;">
                            <div style="width: 50px;"><img src="assets/img/person_1.jpg" style="width: 100%;border-radius: 72px;"></div>
                            <div style="width: fit-content;margin-left: 12px;height: fit-content;border-radius: 20px;padding: 10px;background: var(--bs-gray-400);border: 1px none #2125295f;margin-bottom: 10px;">
                                <h6>Username</h6>
                                <p style="color: #404040;font-size: 12px;">Lorem Ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida diam sed convallis</p>
                            </div>
                            <div style="width: 30px;">
                                <a href="#">
                                    <i class="far fa-star" style="font-size: 25px;padding: 5px;"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#reasonModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" style="font-size: 25px;padding: 0px;margin-left: 7px;">
                                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"></path>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                                </svg></a>
                            </div>
                        </div>
                    </div>
                    <div style="width: 85%;height: fit-content;margin: auto;margin-top: 10px;">
                        <h5 style="width: 100%;">Leave a comment</h5>
                        <form>
                            <input class="form-control" type="text" style="width: 100%;height: auto;padding: 6px 2px;margin-bottom: 15px;border: 1px solid #2125295f;border-radius: 7px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

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