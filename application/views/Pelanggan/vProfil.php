<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?= base_url('asset/cozastore-master/') ?>images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Profil Pelanggan
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form action="<?= base_url('Pelanggan/cProfil/update/' . $profile->id_pelanggan) ?>" method="POST">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Profile Pelanggan
                    </h4>
                    <?php
                    if ($this->session->userdata('success')) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->userdata('success') ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="<?= $profile->nama_pelanggan ?>" type="text" name="nama" placeholder="Your Name">
                                <img class="how-pos4 pointer-none" src="<?= base_url('asset/cozastore-master/') ?>images/icons/icon-email.png" alt="ICON">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('no_tlp', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="<?= $profile->no_hp ?>" type="text" name="no_tlp" placeholder="No Telepon">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value="<?= $profile->alamat ?>" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="date" value="<?= $profile->tgl_lahir ?>" name="tgl" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                    </div>
                    <?= form_error('jk', '<small class="text-danger">', '</small>') ?>
                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                        <select name="jk" class="js-select2">
                            <option value="">--PIlih Jenis Kelamin---</option>
                            <option value="Perempuan" <?php if ($profile->jk == 'Perempuan') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                            <option value="Laki - Laki" <?php if ($profile->jk == 'Laki - Laki') {
                                                            echo 'selected';
                                                        } ?>>Laki - Laki</option>

                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value="<?= $profile->username ?>" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            <div class="bor8 m-b-30">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value="<?= $profile->password ?>" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Update Profile
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Status Level Member
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            Anda memiliki level member <strong><?php
                                                                if ($profile->level_member == '1') {
                                                                    echo 'Supestar';
                                                                } else if ($profile->level_member == '2') {
                                                                    echo 'Golden';
                                                                } else if ($profile->level_member == '3') {
                                                                    echo 'Occasional';
                                                                } else if ($profile->level_member == '4') {
                                                                    echo 'Everyday';
                                                                } else if ($profile->level_member == '5') {
                                                                    echo 'Dormant';
                                                                }
                                                                ?></strong>
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>