<?php
session_start();
error_reporting(0);
?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #C1C8E4!important;">
  <div class="container">
    <a class="navbar-brand" href="..\index.php">Főoldal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
        <?php if($_SESSION['type']== "Felhasználó" || $_SESSION['type']=="Szerkesztő" || empty($_SESSION['type'])) :?>
          <a class="nav-link" href="..\megtekint.php">Megtekintés</a>
        </li>
        <?php endif?>
        <?php if($_SESSION['type']=="Szerkesztő"):?>
        <li class="nav-item">
          <a class="nav-link" href="..\szerkesztes.php">Szerkesztés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\feltolt.php">Feltöltés</a>
        </li>
        <?php endif?>
        <?php if($_SESSION['van']===1): ?>
        <li class="nav-item">
          <a class="nav-link" href="login\logout.php">Kijelentkezés</a>
        </li>
        <?php else :?>
          <li class="nav-item">
          <a class="nav-link" href="login\login.php">Bejelentkezés</a>
        </li>
            <?php endif?>
      </ul>
    </div>
  </div>
</nav>
</header>