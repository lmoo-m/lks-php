<?php
require "./connection.php";
require "./helper.php";
require "./safe.php";


$students = mysqli_query($db, "select students.*, majors.* from students inner join majors on students.majorId = majors.majorId ");
$i = 1;

?>

<div class="border container mt-3 bg-light shadow py-2">
    <h3>Jurusan</h3>
    <a class="btn btn-primary" href="<?php echo $base_url ?>?page=tambahSiswa">Tambah</a>
    <table class=" table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($student = mysqli_fetch_array($students)) {
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $student['nama'] ?></td>
                    <td><?php echo $student['majorName'] ?></td>
                    <td>
                        <img src="./public/<?php echo $student['foto'] ?>" width="40" />
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo $base_url ?>?page=editSiswa&id=<?php echo $student['nis'] ?>">edit</a>
                        <a class="btn btn-danger" href="<?php echo $base_url ?>?page=hapusSiswa&id=<?php echo $student['nis'] ?>">hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>