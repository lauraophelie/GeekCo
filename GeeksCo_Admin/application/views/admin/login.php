<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Back office </title>
  <link rel="stylesheet" href="assets/admin/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <h3 class="text-center"> Se connecter </h3>
                <form method="post" action="login/connect">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"> Nom </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nom">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label"> Mot de passe </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"> Se connecter </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>