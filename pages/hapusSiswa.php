<?php
require "./connection.php";

$id = isset($_GET['id']) ? ($_GET['id']) : false;

mysqli_query($db, "delete from students where nis = '$id'");
header("location:?page=siswa");
