<?php
include '../kapcsolodas.php';
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $varos = $_POST['varos'];
    $orszag = $_POST['orszag'];
    $nev = $_POST['nev'];
    $leiras = $_POST['leiras'];
    $kategoria = $_POST['select'];
    $stilus = $_POST['select2'];
    ///varos
    $varossql = "SELECT varos_id FROM varosok WHERE varos='$varos'";
    $varosutasitas = $dbc->prepare($varossql);
    $varosutasitas->execute();
    $varosrow = $varosutasitas->fetchAll(PDO::FETCH_ASSOC);
    foreach ($varosrow as $varos1) {
        $varosid = $varos1["varos_id"];
    }

    //////////orszag
    $orszagsql = "SELECT orszag_id FROM orszagok WHERE orszag='$orszag'";
    $orszagutasitas = $dbc->prepare($orszagsql);
    $orszagutasitas->execute();
    $orszagrow = $orszagutasitas->fetchAll(PDO::FETCH_ASSOC);
    foreach ($orszagrow as $orszag1) {
        $orszagid = $orszag1["orszag_id"];
    }

    //////////kategoria
    $kategoriasql = "SELECT kat_id FROM kategoriak WHERE kategoria='$kategoria'";
    $kategoriautasitas = $dbc->prepare($kategoriasql);
    $kategoriautasitas->execute();
    $kategoriagrow = $kategoriautasitas->fetchAll(PDO::FETCH_ASSOC);
    foreach ($kategoriagrow as $kat1) {
        $kategoriaid = $kat1["kat_id"];
    }

    //////////stilus
    $stilussql = "SELECT stilus_id FROM stilusok WHERE stilus='$stilus'";
    $stilusutasitas = $dbc->prepare($stilussql);
    $stilusutasitas->execute();
    $stilusrow = $stilusutasitas->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stilusrow as $stilus1) {
        $stilusid = $stilus1["stilus_id"];
    }



    $sql = "UPDATE remekmuvek SET nev='$nev',leiras='$leiras',varos_id='$varosid',orszag_id='$orszagid',stilus_id='$stilusid',kategoria_id='$kategoriaid' WHERE id='$id'";
    $utasitas = $dbc->prepare($sql);
    $utasitas->execute();
    header("Location:szerkesztes.php");
} else {
    $sql = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.kat_id  INNER JOIN stilusok ON remekmuvek.stilus_id = stilusok.stilus_id  INNER JOIN varosok ON remekmuvek.varos_id = varosok.varos_id  INNER JOIN orszagok ON remekmuvek.orszag_id = orszagok.orszag_id WHERE remekmuvek.id='$id'";
    $keresquery = $dbc->prepare($sql);
    $keresquery->execute();
    $szerkesztadat = $keresquery->fetchAll(PDO::FETCH_ASSOC);
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
    <script src="../files/bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>Feltöltés</title>
</head>

<body>
            <?php
            include_once '../layout/header2.php'
            ?>
            <div class="line">
            <div class="container-fluid">
                <div style="margin:  0 auto; width: 100%; max-width:500px; margin-left:100px">
                    <div class="card  card-body" style="width: 50rem; height:auto;">
                        <h3 class="card-title text-center">Szerkesztés</h3>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                            <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                <input type="text" hidden value="<?= $szerkeszt["id"] ?>" name="id">
                            <?php endforeach; ?>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Név:</label>
                                <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                    <input type="text" name="nev" class="form-control w-50 align-items-center" id="formGroupExampleInput" value="<?= $szerkeszt["nev"] ?>" required>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>A szerkesztéshez válassza ki a megjelenített adatokból a szerkeszteni kívánt adatot!</label>
                                <?php
                                $varosokasd = "SELECT varos FROM varosok";
                                $parancs = $dbc->prepare($varosokasd);
                                $parancs->execute();
                                $adatvaros = $parancs->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="varos">
                                        <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                            <option value="<?= $szerkeszt["varos"] ?>" selected><?= $szerkeszt["varos"] ?></option>
                                        <?php endforeach; ?>
                                        <?php foreach ($adatvaros as $sor) : ?>
                                            <option value="<?= $sor["varos"] ?>" required><?= $sor["varos"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $orszagokasd = "SELECT orszag FROM orszagok";
                                    $parancs = $dbc->prepare($orszagokasd);
                                    $parancs->execute();
                                    $adatorszag = $parancs->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="orszag">
                                            <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                                <option value="<?= $szerkeszt["orszag"] ?>" selected><?= $szerkeszt["orszag"] ?></option>
                                            <?php endforeach; ?>
                                            <?php foreach ($adatorszag as $sorok) : ?>
                                                <option value="<?= $sorok["orszag"] ?>" required><?= $sorok["orszag"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Leírás: </label>
                                        <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                            <textarea class="form-control w-50" name="leiras" id="exampleFormControlTextarea1" style="height: 20vh;" rows="3" maxlength="250" required><?= $szerkeszt["leiras"] ?></textarea>
                                        <?php endforeach; ?>

                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <?php
                                        $kategoria = "SELECT kategoria FROM kategoriak";
                                        $parancs2 = $dbc->prepare($kategoria);
                                        $parancs2->execute();
                                        $adatkategoria = $parancs2->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <select class="form-select" aria-label="Default select example" name="select">
                                            <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                                <option value="<?= $szerkeszt["kategoria"] ?>" selected><?= $szerkeszt["kategoria"] ?></option>
                                            <?php endforeach; ?>
                                            <?php foreach ($adatkategoria as $sor) : ?>
                                                <option value="<?= $sor["kategoria"] ?>" required><?= $sor["kategoria"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php
                                    $stilus = "SELECT stilus FROM stilusok";
                                    $parancs = $dbc->prepare($stilus);
                                    $parancs->execute();
                                    $adatstilus = $parancs->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="select2">
                                            <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                                <option value="<?= $szerkeszt["stilus"] ?>" selected><?= $szerkeszt["stilus"] ?></option>
                                            <?php endforeach; ?>
                                            <?php foreach ($adatstilus as $stilusertek) : ?>
                                                <option value="<?= $stilusertek["stilus"] ?>" required><?= $stilusertek["stilus"] ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php foreach ($szerkesztadat as $szerkeszt) : ?>
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../files/kepek/borito/<?= $szerkeszt['kep3'] ?>" style="width:700px; height:500px;" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../files/kepek/megjelenit/<?= $szerkeszt['kep1'] ?>" style="width:700px; height:500px;" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../files/kepek/megjelenit/<?= $szerkeszt['kep2'] ?>" style="width:700px; height:500px;"  alt="Third slide">
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

                                    <input type="submit" class="btn btn-primary my-3 w-100" value="Szerkesztés" name="update" />
                                    <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        <?php
        include_once '../layout/footer.php'
        ?>

    </div>

</body>

</html>