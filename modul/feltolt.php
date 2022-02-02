<?php
include '../kapcsolodas.php';
if (isset($_POST['upload'])) {
    $varos = $_POST['varos'];
    $orszag = $_POST['orszag'];
    $nev = $_POST['nev'];
    $leiras = $_POST['leiras'];
    $kategoria = $_POST['select'];
    $stilus = $_POST['select2'];
    print_r($_POST);
    ///////////////////////////////////////
    $fileborito = $_FILES['file1'];
    $filenameb = $_FILES['file1']['name'];
    $fileTmpNameb = $_FILES['file1']['tmp_name'];
    $fileSizeb = $_FILES['file1']['size'];
    $filenameb = $_FILES['file1']['name'];
    $fileErrorb = $_FILES['file1']['error'];
    $filenTypeb = $_FILES['file1']['type'];
    $fileExtb = explode('.', $filenameb);
    $fileActExtb = strtolower(end($fileExtb));
    ///////////////////////////////////////
    $file = $_FILES['file2'];
    $filename = $_FILES['file2']['name'];
    $fileTmpName = $_FILES['file2']['tmp_name'];
    $fileSize = $_FILES['file2']['size'];
    $filename = $_FILES['file2']['name'];
    $fileError = $_FILES['file2']['error'];
    $filenType = $_FILES['file2']['type'];
    $fileExt = explode('.', $filename);
    $fileActExt = strtolower(end($fileExt));
    ///////////////////////////////////////
    $file3 = $_FILES['file3'];
    $filename3 = $_FILES['file3']['name'];
    $fileTmpName3 = $_FILES['file3']['tmp_name'];
    $fileSize3 = $_FILES['file3']['size'];
    $filename3 = $_FILES['file3']['name'];
    $fileError3 = $_FILES['file3']['error'];
    $filenType3 = $_FILES['file3']['type'];
    $fileExt3 = explode('.', $filename3);
    $fileActExt3 = strtolower(end($fileExt3));
    ///////////////////////////////////////
    $allow = array('jpg', 'jpeg', 'png', 'jfif');
    if (in_array($fileActExt, $allow) && in_array($fileActExtb, $allow) && in_array($fileActExt3, $allow)) {
        if ($fileError === 0 && $fileErrorb === 0 && $fileError3 === 0) {
            if ($fileSize < 5000000 && $fileSizeb <  5000000 && $fileSize3 < 5000000) {
                $filenewname = uniqid('', true) . "." . $fileActExt;
                $filenamenewb = uniqid('', true) . "." . $fileActExtb;
                $filenamenew3 = uniqid('', true) . "." . $fileActExt3;
                //////////////////////////////////////////////////
                $fileDestinationb = '../files/kepek/megjelenit/' . $filenamenewb;
                $fileDestination = '../files/kepek/megjelenit/' . $filenewname;
                $fileDestination3 = '../files/kepek/borito/' . $filenamenew3;
                move_uploaded_file($fileTmpName, $fileDestination);
                move_uploaded_file($fileTmpNameb, $fileDestinationb);
                move_uploaded_file($fileTmpName3, $fileDestination3);
                if ($_POST['select'] != "Válasszon ki egy képet a megjelnítésnek" || $_POST['select2'] != "Válasszon ki egy stílust") {
                    $query = "SELECT kat_id FROM kategoriak WHERE kategoria='$kategoria'";
                    $utasitas = $dbc->prepare($query);
                    $utasitas->execute();
                    $adatkategoria = $utasitas->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($adatkategoria as  $kulcskategoria => $ertekkategoria) {
                        $idkategoria = $ertekkategoria['kat_id'];
                    }
                    ///////
                    $query2 = "SELECT varos_id FROM varosok WHERE varos='$varos'";
                    $utasitas2 = $dbc->prepare($query2);
                    $utasitas2->execute();
                    $adatvaros = $utasitas2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($adatvaros as  $kulcsvaros => $ertekvaros) {
                        $idvaros = $ertekvaros['varos_id'];
                    }
                    //////
                    $query3 = "SELECT orszag_id FROM orszagok WHERE orszag='$orszag'";
                    $utasitas3 = $dbc->prepare($query3);
                    $utasitas3->execute();
                    $adatorszag = $utasitas3->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($adatorszag as  $kulcsorszag => $ertekorszag) {
                        $idorszag = $ertekorszag['orszag_id'];
                    }
                    //////////////////
                    $querystilus = "SELECT stilus_id FROM stilusok WHERE stilus='$stilus'";
                    $utasitasstilus = $dbc->prepare($querystilus);
                    $utasitasstilus->execute();
                    $adatstilus = $utasitasstilus->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($adatstilus as  $kulcsstilus => $ertekstilus) {
                        $idstilus = $ertekstilus['stilus_id'];
                    }
                    $insertinto = "INSERT INTO remekmuvek(nev,leiras,varos_id,orszag_id,stilus_id,kategoria_id,kep1,kep2,kep3) VALUES('$nev','$leiras','$idvaros','$idorszag','$idstilus','$idkategoria','$filenewname','$filenamenewb','$filenamenew3')";
                    $beepites = $dbc->prepare($insertinto);
                    $beepites->execute();
                    header("Location:../index.php?sikeresfeltoltes");
                } else {
                    echo "Válassza ki a kategóriát vagy a stílust!";
                }
            } else {
                echo "A fájl túl nagy!";
            }
        } else {
            echo "Hiba vana feltöltésben!";
        }
    } else {
        echo "Nem tudja feltölteni az iylen típusu fájlt!";
    }
} else {
    $sql = "SELECT kategoria FROM kategoriak";
    $utasitas = $dbc->prepare($sql);
    $utasitas->execute();
    $adat = $utasitas->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Feltöltés</title>
</head>

<body>
    <div class="grid-container">
        <div class="nav">
            <?php
            include_once '../layout/header2.php'
            ?>
        </div>

        <div class="main">
            <div class="container-fluid">
                <div style="margin:  0 auto; width: 100%; max-width:500px; margin-left:500px">
                    <div class="card  card-body" style="width: 50rem; height:60rem;">
                        <h3 class="card-title text-center">Feltöltés</h3>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Név:</label>
                                <input type="text" name="nev" class="form-control w-50 align-items-center" id="formGroupExampleInput" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <?php
                                $varosokasd = "SELECT varos FROM varosok";
                                $parancs = $dbc->prepare($varosokasd);
                                $parancs->execute();
                                $adatvaros = $parancs->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="varos">
                                        <option selected>Válasszon ki egy várost</option>
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
                                            <option selected>Válasszon ki egy országot</option>
                                            <?php foreach ($adatorszag as $sorok) : ?>
                                                <option value="<?= $sorok["orszag"] ?>" required><?= $sorok["orszag"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Leírás: </label>
                                        <textarea class="form-control w-50" name="leiras" id="exampleFormControlTextarea1" style="height: 20vh;" rows="3" maxlength="250" required></textarea>
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="select">
                                            <option selected>Válasszon ki egy kategóriát</option>
                                            <?php foreach ($adat as $sor) : ?>
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
                                            <option selected>Válasszon ki egy stílust</option>
                                            <?php foreach ($adatstilus as $stilusertek) : ?>
                                                <option value="<?= $stilusertek["stilus"] ?>" required><?= $stilusertek["stilus"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Válasszon ki egy képet a megjelnítésnek</label>
                                        <input class="form-control form-control-sm" id="formFileSm" name="file1" type="file" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label"> Válasszon ki egy képet a megjelnítésnek</label>
                                        <input class="form-control form-control-sm" id="formFileSm" name="file2" type="file" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label"> Válasszon ki egy képet a borítónak</label>
                                        <input class="form-control form-control-sm" id="formFileSm" name="file3" type="file" required>
                                    </div>
                                    <div class="input-group-prepend">
                                        <input type="submit" class="btn btn-secondary my-3 w-100" value="Feltöltés" name="upload" />
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
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