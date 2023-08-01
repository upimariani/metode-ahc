<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
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

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="images/icons/logo-01.png" alt="IMG-LOGO">
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
                    <?php
                    $qty = 0;
                    foreach ($this->cart->contents() as $key => $value) {
                        $qty += $value['qty'];
                    }
                    ?>
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $qty ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

                    </div>
                </nav>
            </div>
        </div>





    </header>