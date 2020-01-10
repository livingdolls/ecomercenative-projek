<div class="main-riwayat">
            <h2>Riwayat Belanja</h2>
            <table>
                <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['user']['id_user'];
                        
                        $sql = $konek->query("SELECT * FROM pembelian WHERE id_user = $id");
                        $no = 1;
                        while($result = $sql->fetch_assoc()) :
                    ?>
        
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $result['tanggal']; ?></td>
                            <td>Rp <?= number_format($result['total']); ?></td>
                            <td><?= $result['status_pembelian']; ?></td>
                            <td><a class="btn-rx" href="../nota.php?id=<?= $result['id_pembelian']; ?>">Nota</a>
                            
                            <?php if($result['status_pembelian'] == 'pending') : ?>
                            <a class="btn-rw" href="../bayar.php?id=<?= $result['id_pembelian']; ?>">Bayar</a>
                            <?php else : ?>
                            <a class="btn-ry" href="../lihat_pembayaran.php?id=<?= $result['id_pembelian']; ?>">Lihat</a>
                        <?php endif; ?>
                        </td>
                        </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>