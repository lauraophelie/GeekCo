    <div class="corps">
      <div class="titre">
        <p>Listes des Evenements</p>
      </div>
      <div class="contains">
        <?php if(isset($missing)){ ?>
          <div class="title">
            <?php echo $missing; ?>
          </div>
        <?php } ?>
        <?php if(isset($event)) { 
          for($i = 0;$i<count($event) ; $i++) { ?>
            <div class="item-container">
            <div class="img-container">
                <img src="<?php echo site_url('asset/img/'.$event[$i]['photo']);?>" alt="Event image">
            </div>

            <div class="body-container">
                <div class="overlay"></div>
                  <div class="event-info">
                      <p class="title"><?php echo $event[$i]['name_event']; ?> </p>
                      <div class="separator"></div>
                      <p class="info"><?php echo $event[$i]['prenom']; ?></p>
                      <p class="price">About</p>

                      <div class="additional-info">
                          <p class="info">
                              <i class="fas fa-map-marker-alt"></i>
                              <?php echo $event[$i]['emplacement']; ?>
                          </p>
                          <p class="info">
                              <i class="far fa-calendar-alt"></i>
                              <?php echo $event[$i]['date_event']; ?>,<?php echo $event[$i]['time_event']; ?>
                          </p>

                          <p class="info description">
                          <?php echo $event[$i]['short_description']; ?>
                          </p>
                      </div>
                  </div>
                  <a href="<?php echo site_url('Event/detailevent/'.$event[$i]['idevent']); ?>"><button class="action">Read more</button></a>
              </div>
          </div>
        <?php } }?>
    </div>
  </main>

  <script src="<?php echo site_url('asset/js/script.js');?>"></script>
  <script src="<?php echo site_url('asset/dist/js/bootstrap.bundle.min.js');?>"></script>

</body>
</html>
