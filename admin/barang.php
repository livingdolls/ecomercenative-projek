<?php

    if($_SESSION['status'] != 'login'){
        header("Location:../index.php?pesan=belum_login");
        echo $_SESSION['nama'];
    }

    include 'db.php';

        // ============ Pagination ================
    $jmlhl = 5;
    $jmlbr = mysqli_query($konek,"SELECT * FROM barang");
    $htng = mysqli_num_rows($jmlbr);
    $jmlhlmn = ceil($htng / $jmlhl);
    $halaktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $awal = ($jmlhl * $halaktif) - $jmlhl;
    
    $sql = "SELECT * FROM barang  ORDER BY id_barang DESC LIMIT $awal,$jmlhl";

    $barang = mysqli_query($konek,$sql);

?>

            <h1>Data Barang</h1>
            <form action="">


            </form>

            <table>
                <thead>
                  <tr class="table-active">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    <th width="90px">Harga</th>
                    <th width="150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($barang as $data) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= substr($data['keterangan'],0,100); ?></td>
                    <td>IDR <?= number_format($data['harga']); ?></td>
                    <td><a class="btn" onclick="return confirm('Yakin hapus')" href="del.php?id=<?= $data['id_barang']; ?>">Delete</a> | <a class="btn" href="edit.php?id=<?= $data['id_barang']; ?>">Edit</a></td>
                  </tr>
<?php endforeach; ?>
                </tbody>
            </table>
<br>
    <div class="ang">
        <div class="ss">
                <ol class="angka">
                    <?php if($halaktif > 1) : ?>
                        <li class="an"><a href="?halaman=barang&page=<?= $halaktif - 1 ?>">&laquo;</a></li>
                    <?php endif; ?>
                    <?php for($i = 1; $i<= $jmlhlmn; $i++) : ?>
                        <?php if($i == $halaktif) : ?>
                            <li class="an ac"><a href="?halaman=barang&page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li class="an"><a href="?halaman=barang&page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($halaktif < $jmlhlmn) : ?>
                        <li class="an"><a href="?halaman=barang&page=<?= $halaktif + 1 ?>">&raquo;</a></li>
                    <?php endif; ?>
                </ol>
                </div>
    </div>
    </div>
</div>
</body>

<footer>
</footer>
</html>