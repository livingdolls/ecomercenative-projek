<?php
    include 'db.php';

    $sql = $konek->query("SELECT * FROM pembelian pl JOIN tb_users us USING(id_user)");


?>
<head>
  <style>
  
  .stts{
    padding: 5px;
    border: 1px solid rebeccapurple;
    width : 50px;
    background: green;
    color: white;
  }
  .st{
    background: rebeccapurple;
  }
  
  </style>
</head>
            <h1>Manajemen Pesanan Masuk</h1>

            <table class="table table-bordered">
                <thead>
                  <tr class="table-active">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while($result = $sql->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $result['nama_user']; ?></td>
                        <td><?= $result['tanggal']; ?></td>
                        <td><?= $result['status_pembelian']; ?></td>
                        <td>IDR <?= number_format($result['total']); ?></td>
                        <td><a class="btn" href="detail_beli.php?id=<?= $result['id_pembelian'];?>">Nota</a>
                        <?php if($result['status_pembelian'] == 'pending') : ?>
                        <?php else : ?>
                            <a class="btn st" href="pembayaran.php?id=<?= $result['id_pembelian'] ?>">Status</a></td>
                        <?php endif; ?>
                    </tr>
    <?php endwhile; ?>
                </tbody>
            </table>

</div>
</body>

<footer>
</footer>
</html>