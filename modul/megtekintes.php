<?php
include '../kapcsolodas.php';
$id = $_GET['id'];
$query = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.kat_id  INNER JOIN stilusok ON remekmuvek.stilus_id= stilusok.stilus_id INNER JOIN varosok ON remekmuvek.varos_id= varosok.varos_id INNER JOIN orszagok ON remekmuvek.orszag_id = orszagok.orszag_id WHERE remekmuvek.id='$id'";
$parancs = $dbc->prepare($query);
$parancs->execute();
$adat = $parancs->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../files/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../layout/style.css?=<?= rand(1, 1200) ?>">
    <title>Megtekintés</title>
</head>

<body>
    <?php
    include_once '../layout/header2.php'
    ?>
    <div class="line">
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

                </div>
        </div>
        <div class="container-fluid">
            <div class="card" style="width: 700px; display:inline-block">
                <div class="body">
                    <img src="../files/kepek/borito/<?= $sor['kep3'] ?>" style="width: 700px;height:200px;" class="card-img-bottom img-fluid">
                    <br>
                    <img src="../files/kepek/megjelenit/<?= $sor['kep1'] ?>" style="width: 700px;height:200px;" class="card-img-bottom img-fluid">
                    <br>
                    <img src="../files/kepek/megjelenit/<?= $sor['kep2'] ?>" style="width: 700px;height:200px;" class="card-img-bottom img-fluid">
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        </main>
    </div>
    <main>

        <?php
        include_once '../layout/footer.php'
        ?>

</body>

</html>