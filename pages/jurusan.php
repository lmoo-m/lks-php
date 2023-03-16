<?php
require "./connection.php";
require "./helper.php";
require "./safe.php";


$majors = mysqli_query($db, "select * from majors");
$i = 1;

if (isset($_POST['tambah'])) {
    $majorName = $_POST['majorName'];

    if ($majorName == "") {
        header("location:?page=jurusan");
    } else {
        $post = mysqli_query($db, "insert into majors (majorName) values ('$majorName')");
        header("location:?page=jurusan");
    }
}
?>

<div class="border container mt-3 bg-light shadow py-2">
    <h3>Jurusan</h3>
    <form class="d-flex align-items-center jutify-content-center mt-3" action="" method="post">
        <input class="form-control" name="majorName" placeholder="Tambah Jurusan" />
        <button name="tambah" class="btn btn-primary">Tambah</button>
    </form>
    <table class=" table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($major = mysqli_fetch_array($majors)) {
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $major['majorName'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo $base_url ?>?page=editJurusan&id=<?php echo $major['majorId'] ?>">edit</a>
                        <a class="btn btn-danger" href="<?php echo $base_url ?>?page=hapusJurusan&id=<?php echo $major['majorId'] ?>">hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>