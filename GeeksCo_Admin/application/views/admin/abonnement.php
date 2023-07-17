<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Liste des Utilisateurs </title>
  <link rel="stylesheet" href="assets/admin/css/styles.min.css" />
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
            <i class="ti ti-x fs-8"> </i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"> HOME </span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo site_url('utilisateur/'); ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user"> </i>
                </span>
                <span class="hide-menu"> Utilisateurs </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo site_url('abonnement/'); ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-wallet"></i>
                </span>
                <span class="hide-menu"> Abonnements </span>
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
                <i class="ti ti-menu-2"> </i>
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
      <div class="container-fluid">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4"> Liste des abonnements </h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"> ID </h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"> Utilisateur </h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"> Montant </h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"> Date paiement </h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"> Date limite </h6>
                      </th>
                      <th class="border-bottom-0">
                        
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php foreach($liste_abonnements as $abonnement) { ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">
                                        <?php echo $abonnement['abonnement']; ?>
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">
                                        <?php echo $abonnement['nom'].' '.$abonnement['prenom']; ?>
                                    </h6>                         
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">
                                        <?php echo number_format($abonnement['montant'], 0, ' ', ' '); ?>
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">
                                        <?php echo $abonnement['date_payement']; ?>
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">
                                        <?php echo $abonnement['date_limite']; ?>
                                    </p>
                                </td>
                            </tr>
                        <?php } ?>            
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <script src="assets/admin/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/admin/js/sidebarmenu.js"></script>
  <script src="assets/admin/js/app.min.js"></script>
  <script src="assets/admin/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>