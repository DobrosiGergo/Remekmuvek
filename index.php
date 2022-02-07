<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="files/bootsrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="layout/style.css?=<?= rand(1, 12000) ?>">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  <script src="layout/function.js"></script>
  <title>Főoldal</title>
</head>

<body>
    <div class="nav">
      <?php
      include_once 'layout/header.php';
      ?>
   
    <div class="main">
      <div class="line"></div> 
<h2>Az építészet</h2>
<p>Építészet olyan alkalmazott tudományos és művészeti szakterület, amely az épületek és építmények létrehozásával, tágabb értelemben az épített környezet kialakításával foglalkozik. Az emberi kultúra, az emberi tevékenység egyik legalapvetőbb megjelenési formájaként egyrészt alkalmazott művészet, másrészt mérnöki tudomány, technológiai diszciplína. Az embert körülvevő természeti környezet olyan, akaratlagos megváltoztatása, amelynek „erőszakossága” konstruktív.</p>
      <div class="line"></div>
<h2>Gótika</h2>
<p>A gótika az érett középkor művészetének egyik irányzata, de megjelenésének technikai és társadalmi körülményeivel együtt történelmi korszaknak is tekinthető. Észak-Franciaországban a román művészetből fejlődött ki a 12. században, majd egész Nyugat-Európában, valamint Észak-, Dél- és Közép-Európa nagy részén is elterjedt.</p>

      <div class="line"></div>
   <img src="files/kepek/fokep.jfif" class="img-fluid rounded-circle mx-auto d-block">
    <div class="footer">
      <?php
      include_once 'layout/footer.php';
      ?>
    
</body>

</html>