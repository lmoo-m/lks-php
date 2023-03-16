<?php
// session_start();
if ($_SESSION['id'] == null) {
    header("location:?page=login");
    exit();
}
