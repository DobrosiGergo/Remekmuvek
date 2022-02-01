<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="files/bootsrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="layout/style.css?=<?= rand(1, 12000) ?>">
  <title>Főoldal</title>
</head>

<body>
  <div class="grid-container">
    <div class="nav">
      <?php
      include_once 'layout/header.php';
      ?>
    </div>
    <div class="main">
      <main>
        <div class="jumbotron jumbotron-fluid" style="background-color: #EDF5E1;">
          <div class="container">
            <h1 class="display-4">Üdvözöljük!</h1>
            <p class="lead">Ez a weboldal a világon ismert Remekművek bemutatására készült. Tekintse meg ön is.</p>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div class="footer">
      <?php
      include_once 'layout/footer.php';
      ?>
    </div>

  </div>
</body>

</html>