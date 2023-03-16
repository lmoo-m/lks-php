<?php
require "./connection.php";

if (isset($_POST['register'])) {
    $username  = $_POST['user'];
    $psd = md5($_POST['password']);
    $konfpsd = md5($_POST['konfpassword']);

    if ($psd == $konfpsd) {
        $register = mysqli_query($db, "insert into users (username, password) values ('$username', '$psd')");
        header("location:?page=login");
    } else {
        header("location:?page=register");
    }
}
?>

<div class="container border mt-3 bg-light shadow p-2">
    <div>
        <h1>register</h1>
        <form method="post" action="">
            <input class="form-control mt-2" placeholder="user" name="user" />
            <input class="form-control mt-2" placeholder="password" name="password" />
            <input class="form-control mt-2" placeholder="konfirmasi password" name="konfpassword" />
            <button class="btn btn-primary mt-2" name="register">Register</button>
        </form>
    </div>
</div>