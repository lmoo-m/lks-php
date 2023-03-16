<?php
require "./connection.php";
require "./helper.php";

$id = isset($_GET['id']) ? ($_GET['id']) : false;

$query = mysqli_query($db, "select majors.*, students.* from students inner join majors on students.majorId = majors.majorId where nis = '$id'");
$siswa = mysqli_fetch_array($query);

$majors = mysqli_query($db, "select * from majors");

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $file = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];



    if ($nama == "" || $jurusan == "" || $file === null) {
        header("location:?page=tambahSiswa");
    } else {
        move_uploaded_file($tmp_file, "./public/" . $file);
        $post = mysqli_query($db, "update students set nama = '$nama', majorId = '$jurusan', foto = '$file' where nis = '$id'");
        header("location:?page=siswa");
    }
}
?>

<div class="border container bg-light shadow mt-5 py-2">
    <h3>Edit Siswa</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label class="mt-2">Name</label>
        <input class="form-control mt-3" name="nama" value="<?php echo $siswa['nama'] ?>" />
        <label class="mt-2">Jurusan</label>
        <select class="form-select" name="jurusan">
            <option value="<?php echo $siswa['majorId'] ?>"><?php echo $siswa['majorName'] ?></option>
            <?php
            while ($data = mysqli_fetch_array($majors)) {
            ?>
                <option value="<?php echo $data['majorId'] ?>"><?php echo $data['majorName'] ?></option>
            <?php
            }
            ?>
        </select>
        <label class="mt-2">Foto</label>
        <input type="file" class="form-control" name="file" />
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <a href="<?php echo $base_url ?>?page=siswa" class="btn btn-dark">Kembali</a>
            <button class="btn btn-primary " name="tambah">Edit</button>
        </div>
    </form>
</div>