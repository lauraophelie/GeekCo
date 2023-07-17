<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Liste des Utilisateurs </title>
  <link rel="stylesheet" href="../../assets/admin/css/styles.min.css" />
</head>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"> HOME </span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./liste_utilisateurs.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"> </i>
                </span>
                <span class="hide-menu"> Tableau de bord </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./liste_utilisateurs.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user"> </i>
                </span>
                <span class="hide-menu"> Utilisateurs </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./liste_utilisateurs.html" aria-expanded="false">
                <span>
                  <i class="ti ti-wallet"></i>
                </span>
                <span class="hide-menu"> Abonnements </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./liste_utilisateurs.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user"> </i>
                </span>
                <span class="hide-menu"> Evènements </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu"> Icons </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu"> Sample Page </span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3"> My Profile </p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3"> My Account </p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3"> My Task </p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block"> Logout </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="card-body">
                <h4 class="card-title fw-semibold mb-4">
                    <?php echo $fiche_utilisateur['id']; ?>
                </h4>
                <h4 class="card-title fw-semibold mb-4">
                    <?php echo $fiche_utilisateur['nom'].' '.$fiche_utilisateur['prenom']; ?>
                </h4>
                <p class="mb-0">
                    S'est inscrit(e) le <?php echo $fiche_utilisateur['date_insertion']; ?>
                </p>
            </div>
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4"> Informations </h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="mb-4">
                        Pseudo : <?php echo $fiche_utilisateur['pseudonyme']; ?>
                    </p>
                    <p class="mb-4">
                        Age : <?php echo $fiche_utilisateur['age']; ?>
                    </p>
                    <p class="mb-4">
                        Email : <?php echo $fiche_utilisateur['email']; ?>
                    </p>
                    <p class="mb-1">
                        Profession : <?php echo $fiche_utilisateur['profession']; ?>
                    </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
  <script src="../../assets/admin/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/admin/js/sidebarmenu.js"></script>
  <script src="../../assets/admin/js/app.min.js"></script>
  <script src="../../assets/admin/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>