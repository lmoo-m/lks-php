<?php
require "./helper.php";

session_start();

$id = isset($_SESSION['id']) ? ($_SESSION['id']) : null;

?>

<nav class="nav text-light  bg-dark nav-expanded px-2">
    <h3 class="navbar-brand">
        Home
    </h3>

    <?php
    if ($id === null) {
    ?>
        <a class="nav-link" href="<?php echo $base_url ?>?page=login">Login</a>
        <a class="nav-link" href="<?php echo $base_url ?>?page=register">Register</a>
    <?php
    } else {
    ?>
        <a class="nav-link" href="<?php echo $base_url ?>?page=jurusan">Jurusan</a>
        <a class="nav-link" href="<?php echo $base_url ?>?page=siswa">Siswa</a>
        <a class="nav-link" href="<?php echo $base_url ?>?page=logout">logout</a>
    <?php
    }
    ?>

</nav>