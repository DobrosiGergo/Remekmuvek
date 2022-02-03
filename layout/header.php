<?php
session_start();
error_reporting(0);
?>
<div class="wrapper">
  <!-- Sidebar  -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3>Remekművek</h3>
    </div>

    <ul class="list-unstyled components">
      <p>Az oldalon megtalálható az összes eltárolt remekművek.</p>
      <li class="active">
      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Fő oldal</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
        <li>
            <a href="index.php">Főoldal</a>
          </li>
          <li>
            <a href="modul/megtekint.php">Remekművek</a>
          </li>
        </ul>
      </li>
      <li>
      <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Oldalak</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
        <?php if ($_SESSION['type'] == "Felhasználó" || $_SESSION['type'] == "Szerkesztő" || empty($_SESSION['type'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="modul/megtekint.php">Megtekintés</a>
              </li>
            <?php endif; ?>
            <?php if ($_SESSION['type'] == "Szerkesztő") : ?>
              <li class="nav-item">
                <a class="nav-link" href="modul\szerkesztes.php">Szerkesztés</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modul\feltolt.php">Feltöltés</a>
              </li>
            <?php endif ?>
            <?php if ($_SESSION['van'] === 1) : ?>
              <li class="nav-item">
                <a class="nav-link" href="login\logout.php">Kijelentkezés</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="login\login.php">Bejelentkezés</a>
              </li>
            <?php endif ?>

    </ul>

  </nav>

  <!-- Page Content  -->
  <div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <?php if ($_SESSION['type'] == "Felhasználó" || $_SESSION['type'] == "Szerkesztő" || empty($_SESSION['type'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="modul/megtekint.php">Megtekintés</a>
              </li>
            <?php endif; ?>
            <?php if ($_SESSION['type'] == "Szerkesztő") : ?>
              <li class="nav-item">
                <a class="nav-link" href="modul\szerkesztes.php">Szerkesztés</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modul\feltolt.php">Feltöltés</a>
              </li>
            <?php endif ?>
            <?php if ($_SESSION['van'] === 1) : ?>
              <li class="nav-item">
                <a class="nav-link" href="login\logout.php">Kijelentkezés</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="login\login.php">Bejelentkezés</a>
              </li>
            <?php endif ?>

          </ul>
        </div>
      </div>
    </nav>
