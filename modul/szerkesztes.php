<?php
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../files/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../layout/style.css?=<?=rand(1,1200)?>">
    <title>Szerkesztés</title>
</head>

<body>
    <div class="grid-container">
        <div class="nav">
            <?php
            include_once '../layout/header2.php'
            ?>
        </div>

        <div class="main">
        <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"></h1>
                    <p class="lead"></p>
                </div>
            </div>
            <hr>

            <div class="container-fluid">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Kategóriák
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 30rem;">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary w-100">Szerkesztés</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php
            include_once '../layout/footer.php'
            ?>
        </div>

    </div>

</body>

</html>