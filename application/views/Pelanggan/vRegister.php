<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form action="<?= base_url('Pelanggan/cLogin/register') ?>" method="POST">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        REGISTER
                    </h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama" placeholder="Your Name">
                                <img class="how-pos4 pointer-none" src="<?= base_url('asset/cozastore-master/') ?>images/icons/icon-email.png" alt="ICON">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('no_tlp', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="no_tlp" placeholder="No Telepon">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="date" name="tgl" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                    </div>
                    <?= form_error('jk', '<small class="text-danger">', '</small>') ?>
                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                        <select name="jk" class="js-select2">
                            <option value="">--PIlih Jenis Kelamin---</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki - Laki">Laki - Laki</option>

                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="m-b-30">
                        Apakah Anda Sudah Memiliki Akun? <a href="<?= base_url('Pelanggan/cLogin') ?>" class="text-info">Login Disini</a>
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Submit
                    </button>
                </form>
            </div>


        </div>
    </div>
</section>