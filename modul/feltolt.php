<?php
include '../kapcsolodas.php';
if (isset($_POST['upload'])) {
    $varos = $_POST['varos'];
    $orszag = $_POST['orszag'];
    $nev = $_POST['nev'];
    $leiras = $_POST['leiras'];
    $kategoria = $_POST['select'];
    /*$query = "SELECT id FROM kategoria WHERE kategoria='$kategoria'";
    $utasitas = $dbc->prepare($query);
    $utasitas->execute();
    $adatkategoria = $utasitas->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adatkategoria as  $kulcskategoria => $ertekkategoria) {
        $idkategoria = $ertekkategoria['id'];
    }
    $query2 = "SELECT id FROM varos WHERE nev='$varos'";
    $utasitas2 = $dbc->prepare($query2);
    $utasitas2->execute();
    $adatvaros = $utasitas2->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adatvaros as  $kulcsvaros => $ertekvaros) {
        $idvaros = $ertekvaros['id'];
    }*/
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
    $fileActExt = strtolower(end($fileExt3));
    ///////////////////////////////////////

    if (in_array($fileActExt, $allow) && in_array($fileActExtb, $allow)) {
        if ($fileError === 0 && $fileErrorb === 0 && $fileError3 === 0) {
            if ($fileSize < 5000000 && $fileSizeb <  5000000 && $fileSize3 < 5000000) {
                $filenewname = uniqid('', true) . "." . $fileActExt;
                $filenamenewb = uniqid('', true) . "." . $fileActExtb;
                $filenamenew3 = uniqid('', true) . "." . $fileActExt3;
                //////////////////////////////////////////////////
                $fileDestinationb = '../files/kepek/megjelenit' . $filenamenewb;
                $fileDestination = '../files/kepek/megjelenit' . $filenewname;
                $fileDestination3 = '../files/kepek/borito' . $filenewname3;
                move_uploaded_file($fileTmpName, $fileDestination);
                move_uploaded_file($fileTmpNameb, $fileDestinationb);
                move_uploaded_file($fileTmpNameb, $fileDestination3);

                header("Location:index.php?sikeresfeltoltes");
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
  /*  $sql = "SELECT kategoria FROM kategoria";
    $utasitas = $dbc->prepare($sql);
    $utasitas->execute();
    $adat = $utasitas->fetchAll(PDO::FETCH_ASSOC);*/
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
                    <div class="card  card-body" style="width: 50rem; height:50rem;">
                        <h3 class="card-title text-center">Feltöltés</h3>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Név:</label>
                                <input type="text" name="nev" class="form-control w-50 align-items-center" id="formGroupExampleInput" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Város:</label>
                                <input type="text" name="varos" class="form-control w-50 align-items-center" id="formGroupExampleInput2" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput3">Ország:</label>
                                <input type="text" name="orszag" class="form-control w-50 align-items-center" id="formGroupExampleInput3" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Leírás: </label>
                                <textarea class="form-control w-50" name="leiras" id="exampleFormControlTextarea1" style="height: 20vh;" rows="3" maxlength="250" required></textarea>
                            </div>
                            <br>
                            <div class="mb-3">
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Adja meg a kategóriáját
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php foreach ($adat as $sor) : ?>
                                            <select name="select" id="select">
                                                <option value="Minden" selected>Minden</option>
                                                    <option value="<?= $sor["kategoria"] ?>"><?= $sor["kategoria"] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                    </div>
                                </div>
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
                                <input type="submit" class="btn btn-secondary w-100" value="Feltöltés" name="upload" />
                            </div>
                        </form>
                    </div>
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