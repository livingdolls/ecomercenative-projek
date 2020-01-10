<?php
    if($_SESSION['status'] != 'login'){
        header("Location:../index.php?pesan=belum_login");
        echo $_SESSION['nama'];
    }
    include 'db.php';

    $sql = $konek->query("SELECT * FROM tb_users");

?>

            <h1>Data User</h1>
            <form action="">


            </form>

            <table class="table table-bordered">
                <thead>
                  <tr class="table-active">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">HP</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while($result = $sql->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $result['nama_user']; ?></td>
                        <td><?= $result['email_user']; ?></td>
                        <td><?= $result['hp_user']; ?></td>
                        <td><a class="btn" href="">Hapus</a></td>
                    </tr>
    <?php endwhile; ?>
                </tbody>
            </table>

</div>
</body>

<footer>
</footer>
</html>