<?php
include '../kapcsolodas.php';
if (isset($_POST['upcomment'])) {
    $id = $_GET['id'];
    date_default_timezone_set('Europe/Budapest');
    $ido = $_POST['date'];
    $uzenet = nl2br($_POST['comment']);
    $uid = $_POST['uid'];
    $commentsql = "INSERT INTO comments (userid, megjegyzes, ido, oldalszam) VALUES('$uid', '$uzenet', '$ido','$id')";
    $cutasitas = $dbc->prepare($commentsql);
    $cutasitas->execute();
    /////////////////////////////////
    $query = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.kat_id  INNER JOIN stilusok ON remekmuvek.stilus_id= stilusok.stilus_id INNER JOIN varosok ON remekmuvek.varos_id= varosok.varos_id INNER JOIN orszagok ON remekmuvek.orszag_id = orszagok.orszag_id WHERE remekmuvek.id='$id'";
    $parancs = $dbc->prepare($query);
    $parancs->execute();
    $adat = $parancs->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    error_reporting(0);
    $felhasznalonev = $_SESSION['username'];
    $felhasznalosql = "SELECT id FROM felhasznalok WHERE felhasznalonev='$felhasznalonev'";
    $futasitas = $dbc->prepare($felhasznalosql);
    $futasitas->execute();
    $fadat = $futasitas->fetchAll(PDO::FETCH_ASSOC);


    $csql = "SELECT * FROM comments INNER JOIN felhasznalok ON comments.userid = felhasznalok.id WHERE comments.oldalszam='$id' ORDER  BY comments.ido DESC ";
    $cparancs = $dbc->prepare($csql);
    $cparancs->execute();
    $cadat = $cparancs->fetchAll(PDO::FETCH_ASSOC);
}

else{
    session_start();
    error_reporting(0);
    $felhasznalonev = $_SESSION['username'];
    $felhasznalosql = "SELECT id FROM felhasznalok WHERE felhasznalonev='$felhasznalonev'";
    $futasitas = $dbc->prepare($felhasznalosql);
    $futasitas->execute();
    $fadat = $futasitas->fetchAll(PDO::FETCH_ASSOC);
    /////////////
    $id = $_GET['id'];
    $query = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.kat_id  INNER JOIN stilusok ON remekmuvek.stilus_id= stilusok.stilus_id INNER JOIN varosok ON remekmuvek.varos_id= varosok.varos_id INNER JOIN orszagok ON remekmuvek.orszag_id = orszagok.orszag_id WHERE remekmuvek.id='$id'";
    $parancs = $dbc->prepare($query);
    $parancs->execute();
    $adat = $parancs->fetchAll(PDO::FETCH_ASSOC);

 

    $csql = "SELECT * FROM comments INNER JOIN felhasznalok ON comments.userid = felhasznalok.id WHERE comments.oldalszam='$id' ORDER  BY comments.ido DESC ";
    $cparancs = $dbc->prepare($csql);
    $cparancs->execute();
    $cadat = $cparancs->fetchAll(PDO::FETCH_ASSOC);

}



   



?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../files/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../layout/style.css?=<?= rand(1, 1200) ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Megtekintés</title>
</head>

<body>
    <?php
    include_once '../layout/header2.php'
    ?>
    <div class="container-fluid">
        <?php foreach ($adat as $sor) : ?>
            <div class="card" style="width: 700px; margin-left:200; display:inline-block">
                <div class="card-body">
                    <h5 class="card-title"><?= $sor["nev"] ?></h5>
                    <p class="card-text"><?= $sor["leiras"] ?></p>
                    <p class="card-text"><small class="text-muted">A stílusa: <?= $sor["stilus"] ?></small></p>
                    <p class="card-text"><small class="text-muted">Az Építészete: <?= $sor["kategoria"] ?></small></p>
                    <p class="card-text"><small class="text-muted">Ország : <?= $sor["orszag"] ?></small></p>
                    <p class="card-text"><small class="text-muted">Város: <?= $sor["varos"] ?></small></p>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../files/kepek/borito/<?= $sor['kep3'] ?>" style="width:700px; height:500px;" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../files/kepek/megjelenit/<?= $sor['kep1'] ?>" style="width:700px; height:500px;" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../files/kepek/megjelenit/<?= $sor['kep2'] ?>" style="width:700px; height:500px;" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Elöző</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Következő</span>
                    </a>
                </div>


            </div>
    </div>

<?php endforeach; ?>

<?php if (!empty($_SESSION['username'])) : ?>
    <div class="container-fluid">
        <form method="post" class="FormWrapper">
            <?php foreach ($fadat as $uid) : ?>
                <input type="text" name="uid" hidden value="<?= $uid["id"] ?>">
            <?php endforeach; ?>
            <input type="text" hidden name='oldalszam' value="<?= $id ?>">
            <input type="text" name="date" hidden value="<?= date('Y-m-d H:i:s') ?>">
            <label for="comment"></label>
            <textarea name="comment" id="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Kommentelek" name="upcomment" id="upcomment">
        </form>
    </div>
<?php endif; ?>
<div class="container-fluid" style="width: 500px; float:left">
    <?php foreach($cadat as $comments) :?>
    <div class="card" style="width: 500px; margin-left:100; display:inline-block">
        <div class="card-body">
            <h5 class="card-title"><?= $comments["felhasznalonev"] ?></h5>
            <p class="card-text"><?= $comments["ido"] ?></p>
            <p class="card-text"><?= $comments["megjegyzes"] ?></p>
        </div>
    </div>
    <?php endforeach;?>
</div>
</main>
</div>
<main>

    <?php
    include_once '../layout/footer.php'
    ?>

</body>

</html>