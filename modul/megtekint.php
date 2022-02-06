<?php
include '../kapcsolodas.php';
$query = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.kat_id";

$parancs = $dbc->prepare($query);
$parancs->execute();
$adat = $parancs->fetchAll(PDO::FETCH_ASSOC);
$kategoriasql = "SELECT * FROM kategoriak";
$parancs = $dbc->prepare($kategoriasql);
$parancs->execute();
$adatkategoria = $parancs->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['search'])) {
    $kategoria = $_POST['kategoriakeres'];
    if ($kategoria != "Keresés kategoria szerint.") {
        $query = "SELECT kat_id FROM kategoriak WHERE kategoria='$kategoria'";
        $utasitas = $dbc->prepare($query);
        $utasitas->execute();
        $result = $utasitas->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as  $kulcs => $ertek) {
            $id = $ertek['kat_id'];
        }
        $sql = "SELECT * FROM remekmuvek INNER JOIN kategoriak ON remekmuvek.kategoria_id = kategoriak.kat_id  WHERE kategoria_id='$id'";
        $keresquery = $dbc->prepare($sql);
        $keresquery->execute();
        $adat = $keresquery->fetchAll(PDO::FETCH_ASSOC);
        if (empty($adat)) {
            echo '<div class="alert alert-danger" role="alert" style="padding-top:60px">Sajnos nincsen ilyen kategóriával elátott adatunk!</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert" style="padding-top:60px">Válasszon ki egy kategoriát!</div>';
    }
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

    <div class="line">
        <div class="container">
            <h1 class="display-4"></h1>
            <p class="lead">
            <form method="POST">
                <div class="mb-3">
                    <select class="form-select w-25" aria-label="Default select example" name="kategoriakeres">
                        <option selected name="kategoriakeres">Keresés kategoria szerint.</option>
                        <?php foreach ($adatkategoria as $value) : ?>
                            <option value="<?= $value["kategoria"] ?>" required><?= $value["kategoria"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group-prepend">
                    <input type="submit" class="btn btn-secondary my-3 w-25" value="Keresés" name="search" />
                </div>
            </form>
            </p>
        </div>
    </div>
<br><br><br>

    <div class="line">

        <div class="container-fluid">

        </div>
        <br>
        <?php foreach ($adat as $sor) : ?>
            <div class="card" style="width: 30rem;   display:inline-block!important;">
                <img class="card-img-top" src="../files/kepek/borito/<?= $sor["kep3"] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $sor["nev"] ?></h5>
                    <p class="card-text"><?= $sor["leiras"] ?></p>
                    <p class="card-text"><?= $sor["kategoria"] ?></p>
                    <a href="megtekintes.php?id=<?= $sor["id"] ?>" class="btn btn-primary w-100">Megtekintés</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
    </div>

    </div>

    <?php
    include_once '../layout/footer.php'
    ?>

</body>

</html>