<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Pesanan Saya
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <?php echo form_open('pelanggan/cCart/update_cart'); ?>
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Tanggal Transaksi</th>
                            <th>Total Transaksi</th>
                            <th>Ongkos Kirim</th>
                            <th>Total Pembayaran</th>
                            <th class="column-3">Pengiriman</th>
                            <th>Status Order</th>

                            <th></th>
                        </tr>
                        <?php
      
                  foreach ($transsi['transaksi'] as $key => $value) {
                        ?>
                            <tr class="table_row">

                                <td class="column-1"><?= $value->tgl_transaksi ?></td>
                                <td>Rp. <?= number_format($value->tot_transaksi)  ?></td>
                                <td>Rp. <?= number_format($value->ongkir)  ?> </td>
                                <td>Rp. <?= number_format($value->tot_transaksi + $value->ongkir)  ?> </td>
                                <td class="column-3"><small><?= $value->pengiriman ?></small></td>
                                <td><?php
                                    if ($value->stat_transaksi  == '0') {
                                        echo '<span class="badge badge-danger">Belum Bayar</span>';
                                    } else if ($value->stat_transaksi  == '1') {
                                        echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                    } else if ($value->stat_transaksi  == '2') {
                                        echo '<span class="badge badge-info">Pesanan Diproses</span>';
                                    } else if ($value->stat_transaksi  == '3') {
                                        echo '<span class="badge badge-primary">Pesanan Dikirim</span>';
                                    } else if ($value->stat_transaksi  == '4') {
                                        echo '<span class="badge badge-success">Selesai</span>';
                                    }
                                    ?>
                                </td>

                                <td><a href="<?= base_url('Pelanggan/cTransaksi/detail_transaksi/' . $value->id_transaksi) ?>" class="flex-c-m stext-40 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                        Detail Transaksi
                                    </a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>





    </div>
</div>
