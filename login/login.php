<?php
include '../kapcsolodas.php';
if (isset($_POST['login'])) {
    $felnev = $_POST['username'];
    $passwd = $_POST['password'];
    $query = "SELECT * FROM felhasznalok WHERE felhasznalonev= '$felnev'";
    $utasitas = $dbc->prepare($query);
    $utasitas->execute();
    $row = $utasitas->fetch();
    if ($row != false) {
        print_r($_POST);
        print_r($row);
        $hash2 = $row['passwd'];
        $user = $row['felhasznalonev'];
        $full = $row['nev'];
        $type = $row['jogosultsag'];
        $email = $row['email'];
        $verify = password_verify($passwd, $hash2);
        if ($verify) {
            session_start();
            $_SESSION['username'] = $user;
            $_SESSION['fullname'] = $full;
            $_SESSION['type'] = $type;
            $_SESSION['van'] = 1;
            $_SESSION['email'] = $email;
            header("Location:..\index.php");
        } else {
            header("Lcation: login.php");
            echo '<div class="alert alert-danger" role="alert">Nem megfelelő jelszó!</div>';
        }
    }
    else{
        echo '<div class="alert alert-danger" role="alert" style="padding-top:60px">Nincsen ilyen felhasználó!</div>';

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
    <link rel="stylesheet" href="../layout/style.css?=<?= rand(1, 13000) ?>">

    <title>Bejelentkezés</title>
</head>

<body>
    <div class="grid-container">
        <div class="nav">
            <?php
            include_once '../layout/header3.php'
            ?>
        </div>

        <div class="main">
            <div class="my-3 col-md-6 offset-md-3 col-xl-4 offset-xl-4 ">
                <div class="card card-body">
                    <h3 class="card-title text-center">Bejelentkezés</h3>
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label" for="username">Felhasználói név</label>
                            <input class="form-control" type="text" id="username" name="username" placeholder="Név" required />
                        </div>
                        <div class="mb3">
                            <label class="form-label" for="password">Jelszó</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Jelszó" required />
                        </div>
                        <button type="submit" name="login" class=" btn btn-secondary  my-3 w-100  ">Bejelentkezés</button>
                        <div>
                            <div class="float-end"><a class="card-link " href="register.php">Regisztráció</a></div>
                        </div>
                    </form>
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