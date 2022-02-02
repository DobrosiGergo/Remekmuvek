<?php
include '../kapcsolodas.php';
if (isset($_POST['upload'])) {
    $varos = $_POST['varos'];
    $orszag = $_POST['orszag'];
    $nev = $_POST['nev'];
    $leiras = $_POST['leiras'];
    $kategoria = $_POST['select'];
    $stilus = $_POST['select2'];
    
    
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
                        <h3 class="card-title text-center">Szerkesztés</h3>
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
                                        <input type="submit" class="btn btn-secondary my-3 w-100" value="Szerkesztés" name="update" />
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