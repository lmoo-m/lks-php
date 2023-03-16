<?php
require "./connection.php";
require "./safe.php";


$id = isset($_GET['id']) ? ($_GET['id']) : false;

$major = mysqli_query($db, "select * from majors where majorId = '$id'");

$data = mysqli_fetch_array($major);

if (isset($_POST['edit'])) {
    $majorName = $_POST['majorName'];

    if ($majorName === "") {
        header("location:?page=editJurusan");
    } else {
        $up = mysqli_query($db, "update majors set majorName = '$majorName' where majorId = '$id'");
        header("location:?page=jurusan");
    }
}
?>

<div class="border container bg-light shadow mt-5 py-2">
    <h3>Edit jurusan</h3>
    <form action="" method="post">
        <input class="form-control mt-3" value="<?php echo $data['majorName'] ?>" name="majorName" />
        <button class="btn btn-primary mt-3" name="edit">Edit</button>
    </form>
</div>