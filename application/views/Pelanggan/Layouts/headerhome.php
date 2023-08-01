<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>


                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="<?= base_url('asset/cozastore-master/') ?>images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="index.html">Home</a>

                            </li>

                            <li>
                                <a href="product.html">Pesanan Saya</a>
                            </li>



                            <li>
                                <a href="blog.html">Profil</a>
                            </li>


                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 trans-04 p-l-22 p-r-11">
                            <h5>Selamat Datang, </h5>
                        </div>
                        <?php
                        $qty = 0;
                        foreach ($this->cart->contents() as $key => $value) {
                            $qty += $value['qty'];
                        }
                        ?>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $qty ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-sign-in"></i> Login
                        </a>
                    </div>
                </nav>
            </div>
        </div>


    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <?php
                    foreach ($this->cart->contents() as $key => $value) {
                    ?>
                        <li class="header-cart-item flex-w flex-t m-b-12">

                            <img style="width: 50px;" src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>" alt="IMG">


                            <div class="header-cart-item-txt p-t-8">
                                <p class="header-cart-item-name m-b-18 trans-04">
                                    <?= $value['name'] ?>
                                </p>

                                <span class="header-cart-item-info">
                                    <?= $value['qty'] ?> x Rp. <?= number_format($value['price']) ?>
                                </span>
                            </div>
                        </li>
                    <?php
                    }
                    ?>

                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: Rp. <?= number_format($this->cart->total()) ?>
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="<?= base_url('Pelanggan/cCart') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>