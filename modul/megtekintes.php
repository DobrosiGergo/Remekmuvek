<?php
include '../kapcsolodas.php';
$id = $_GET['id'];
$query = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.id  INNER JOIN stilusok ON remekmuvek.stilus_id= stilusok.id INNER JOIN varosok ON remekmuvek.varos_id= varosok.id INNER JOIN orszagok ON remekmuvek.orszag_id = orszagok.id WHERE remekmuvek.id='$id'";
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
    <div class="grid-container">
        <div class="nav">
            <?php
            include_once '../layout/header2.php'
            ?>
        </div>
        <div class="main">
            <main>
                <div class="container-fluid">
                    <?php foreach($adat as $sor) :?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?=$sor["nev"]?></h5>
                            <p class="card-text"><?=$sor["leiras"]?></p>
                            <p class="card-text"><small class="text-muted">A stílusa: <?=$sor["stilus"]?></small></p>
                           <p class="card-text"><small class="text-muted">Az Építészete: <?=$sor["kategoria"]?></small></p>
                            <p class="card-text"><small class="text-muted">Ország : <?=$sor["orszag"]?></small></p>
                            <p class="card-text"><small class="text-muted">Város: <?=$sor["varos"]?></small></p>
                        </div>
                        <img src="../files/kepek/borito/<?=$sor['kep3']?>" class="card-img-bottom img-fluid">
                        <br>
                        <img src="../files/kepek/megjelenit/<?=$sor['kep1']?>" class="card-img-bottom img-fluid">
                        <br>
                       <img src="../files/kepek/megjelenit/<?=$sor['kep2']?>" class="card-img-bottom img-fluid">

                    </div>
                 <?php endforeach;?>
                </div>




            </main>
        </div>
        <div class="footer">
            <?php
            include_once '../layout/footer.php'
            ?>
        </div>

    </div>
</body>

</html>