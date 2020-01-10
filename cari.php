<?php

// ============ Pagination ================
    $jmlhl = 10;
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];

        $crpg = mysqli_query($konek,"SELECT * FROM barang WHERE nama LIKE '%$cari%'");
        $jmlcr = mysqli_num_rows($crpg);

        $jmlhlmn = ceil($jmlcr / $jmlhl);
        $halaktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $awal = ($jmlhl * $halaktif) - $jmlhl;

        $sql = "SELECT * FROM barang WHERE nama LIKE '%$cari%' LIMIT $awal,$jmlhl";
    }

    $data = mysqli_query($konek,$sql);
    ?>

<?php while($view = mysqli_fetch_array($data)) : ?>
            <div class="satu">
                    <div class="foto">
                        <img src="img/produk/<?= $view['foto']; ?>" alt="" height="230px" width="100%">
                    </div>
                
                    <div class="harg">
                        <p><?= $view['nama']; ?></p>
                        <p style="color:blueviolet; font-weight:500;">IDR <?= number_format($view['harga']); ?></p>
                    </div>
                
                    <div class="button">
                            <a href="detail.php?id=<?= $view['id_barang']; ?>"><p class="aw">Detail</p></a>
                            <a href="beli.php?id=<?= $view['id_barang']; ?>"><p class="aw" style="background-color:green">Beli</p></a>
                    </div>
                </div>
<?php endwhile; ?>
                      
                <div class="ang">
                <ol class="angka">
                <?php if(isset($_GET['cari'])) : ?>
                        <?php if($halaktif > 1) : ?>
                            <li><a href="?cari=<?=$cari;?>&page=<?= $halaktif - 1 ?>">&laquo;</a></li>
                        <?php endif; ?>

                        <?php for($i = 1; $i<= $jmlhlmn; $i++) : ?>
                            <?php if($i == $halaktif) : ?>
                                <li class="aca"><a href="?cari=<?= $cari;?>&page=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php else : ?>
                                <li><a href="?cari=<?= $cari;?>&page=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if($halaktif < $jmlhlmn) : ?>
                            <li><a href="?cari=<?= $cari;?>&page=<?= $halaktif + 1 ?>">&raquo;</a></li>
                        <?php endif; ?>
                <?php else : ?>
               
                        <?php if($halaktif > 1) : ?>
                            <li><a href="?page=<?= $halaktif - 1 ?>">&laquo;</a></li>
                        <?php endif; ?>

                        <?php for($i = 1; $i<= $jmlhlmn; $i++) : ?>
                        <?php if($i == $halaktif) : ?>
                            <li class="aca"><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                        <?php if($halaktif < $jmlhlmn) : ?>
                            <li><a href="?page=<?= $halaktif + 1 ?>">&raquo;</a></li>
                        <?php endif; ?>
                <?php endif;?>
                </ol>
                </div>