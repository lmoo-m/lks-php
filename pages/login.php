<?php
require "./connection.php";

$nama = "";
$pasw = "";

if (isset($_POST['login'])) {
    $nama = $_POST['user'];
    $pasw = md5($_POST['password']);

    $log = mysqli_query($db, "select * from users where username = '$nama' and  password = '$pasw'");


    if (mysqli_num_rows($log) != 0) {
        $row = mysqli_fetch_array($log);

        session_start();
        $_SESSION['id'] = $row['id'];
        header("location:?page=dashboard");
    } else {
        header("location:?page=login");
    }
}
?>

<div class="container border mt-3 bg-light shadow p-2">
    <div>
        <h1>Login</h1>
        <form action="" method="post">
            <input class="form-control mt-2" name="user" placeholder="user" />
            <input class="form-control mt-2" name="password" placeholder="password" />
            <button class="btn btn-primary mt-2" name="login">Login</button>
        </form>
    </div>
</div>