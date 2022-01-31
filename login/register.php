<?php
include '../kapcsolodas.php';
if(isset($_POST['reg'])){
$fullname=$_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$tp = $_POST['type'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
print_r($_POST);
$hash= md5(rand(0,1000));
$registersql = "INSERT INTO felhasznalok (nev,felhasznalonev,passwd,email,jogosultsag ) VALUES('$fullname', '$username', '$password', '$email', '$tp');";
$utasitas = $dbc->prepare($registersql);
$utasitas->execute();
print_r($utasitas);
//header ("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../files/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../layout/style.css">
    <title>Regisztrálás</title>
</head>
<body>
    <?php
    include_once '../layout/header3.php'
    ?>
    <br><br><br><br>
    <div class="my-3 col-md-6 offset-md-3 col-xl-4 offset-xl-4 ">
    <div class="card card-body">
        <h3 class="card-title text-center">Regisztráció</h3>
        <form method="post">
            <div class="mb-3">
                <label class="form-label"  for="fullname">Teljes név</label>
                <input class="form-control" type="text" id="fullname" name="fullname"  placeholder="Teljes név" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control"  type="email" id="email" name="email"  placeholder="Email" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="username">Felhasználói név</label>
                <input class="form-control" type="text" id="username" name="username"  placeholder="Felhasználói név" required/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Jelszó</label>
                <input class="form-control" type="password" id="password" name="password"  placeholder="Jelszó" required/>
            </div>
           
            <div class="mb-3">
                <label class="form-label" for="type">Felhasználói típus</label>
                <select class="form-select" id="type" name="type" ">
                    <option>Szerkesztő</option>
                    <option>Felhasználó</option>
                </select>
            </div>
            <div>
                <button class="btn btn-secondary mb-3 w-100" type="submit" name="reg" >Regisztráció</button>
                <div class="float-end" ><a href="login.php">Bejelentkezés</a></div>
            </div>
        </form>
    </div>
</div>

    <?php
    include_once '../layout/footer.php'
    ?>
</body>
</html>