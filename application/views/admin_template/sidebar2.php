<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?= base_url() ?>m3rc4n73/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link <?= @$mn_mwallet ?>"
                        href="<?= base_url() ?>m3rc4n73/mwallet?cur=<?= $_SESSION["currency"] ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                        Master Wallet
                    </a>
                    <a class="nav-link collapsed <?= @$mn_member ?>"
                        href="<?= base_url() ?>m3rc4n73/member?status=active">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Member
                    </a>

                    <?php
                    if (
                        ($_SESSION["currency"] == "USD") ||
                        ($_SESSION["currency"] == "EUR") ||
                        ($_SESSION["currency"] == "AUD") ||
                        ($_SESSION["currency"] == "NZD") ||
                        ($_SESSION["currency"] == "CAD") ||
                        ($_SESSION["currency"] == "HUF") ||
                        ($_SESSION["currency"] == "SGD") ||
                        ($_SESSION["currency"] == "TRY") ||
                        ($_SESSION["currency"] == "GBP") ||
                        ($_SESSION["currency"] == "RON")
                    ) { ?>
                    <a class="nav-link <?= @$mn_bank ?>" href="<?= base_url() ?>m3rc4n73/bank">
                        <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>
                        Bank
                    </a>
                    <?php }?>
                    <a class="nav-link collapsed <?= @$mn_tc ?>" href="#" data-bs-toggle="collapse"
                        data-bs-target="#History" aria-expanded="false" aria-controls="History">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        History
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="History" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url() ?>m3rc4n73/transactions/topup">Add/Receive
                                Funds</a>
                            <a class="nav-link" href="<?= base_url() ?>m3rc4n73/transactions/towallet">Wallet to
                                Wallet</a>
                            <a class="nav-link" href="<?= base_url() ?>m3rc4n73/transactions/tobank">Wallet to Bank</a>
                            <a class="nav-link" href="<?= base_url() ?>m3rc4n73/transactions/masterwallet">Master Wallet</a>
                        </nav>
                    </div>
                    <a class="nav-link <?= @$mn_swap ?>" href="<?= base_url() ?>m3rc4n73/swap">
                        <div class="sb-nav-link-icon"><i class="fas fa-right-left"></i></div>
                        Swap
                    </a>
                    <?php if (($_SESSION["currency"])=="EUR"){?>
                        <a class="nav-link collapsed <?= @$mn_opcard ?>" href="#" data-bs-toggle="collapse"
                            data-bs-target="#card" aria-expanded="false" aria-controls="Operations">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                            Card
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse <?=$mn_card?>" id="card" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link <?= @$sub_card ?>" href="<?= base_url() ?>m3rc4n73/card">
                                    <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>
                                    Card Bank
                                </a>
                                <a class="nav-link <?= @$sub_topup ?>" href="<?= base_url() ?>m3rc4n73/card/cardtopup">
                                    <div class="sb-nav-link-icon"><i class="fas fa-donate"></i></div>
                                    Topup
                                </a>
                                <a class="nav-link <?= @$sub_proses ?>" href="<?= base_url() ?>m3rc4n73/card/cardtopup?status=proses">
                                    <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                                    Topup (Process)
                                </a>
                                <a class="nav-link <?= @$sub_fisik ?>" href="<?= base_url() ?>m3rc4n73/card/linktowallet">
                                    <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                                    Link Physical Card
                                </a>
                                <a class="nav-link <?= @$sub_exp ?>" href="<?= base_url() ?>m3rc4n73/card/cardexpired">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-times"></i></div>
                                    Expired Card
                                </a>
                            </nav>
                        </div>                    
                    <?php }?>
                    <!--<a class="nav-link" href="currency.html">-->
                    <!--    <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>-->
                    <!--    Currency-->
                    <!--</a>-->
                    <!--<a class="nav-link" href="mifs-bank.html">-->
                    <!--    <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>-->
                    <!--    MIF's Bank-->
                    <!--</a>-->
                    <a class="nav-link" href="<?= base_url() ?>m3rc4n73/auth/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>