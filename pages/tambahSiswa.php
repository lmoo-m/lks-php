<?php
require "./connection.php";
require "./safe.php";


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
        $post = mysqli_query($db, "insert into students (nama, majorId, foto) values ('$nama', '$jurusan', '$file')");
        header("location:?page=siswa");
    }
}
?>

<div class="border container bg-light shadow mt-5 py-2">
    <h3>Tambah Siswa</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label class="mt-2">Name</label>
        <input class="form-control mt-3" name="nama" />
        <label class="mt-2">Jurusan</label>
        <select class="form-select" name="jurusan">
            <option>pilih...</option>
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
        <button class="btn btn-primary mt-3" name="tambah">Tambah</button>
    </form>
</div>