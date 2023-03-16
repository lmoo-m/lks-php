<?php
require "./connection.php";
require "./safe.php";


$id = isset($_GET['id']) ? ($_GET['id']) : false;

mysqli_query($db, "delete from majors where majorId = '$id'");
header("location:?page=jurusan");
