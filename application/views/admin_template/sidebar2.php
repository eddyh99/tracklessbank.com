<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?= base_url() ?>admin/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link <?= @$mn_mwallet ?>"
                        href="<?= base_url() ?>admin/mwallet?cur=<?= $_SESSION["currency"] ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                        Master Wallet
                    </a>
                    <a class="nav-link <?= @$mn_member ?>" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>
                        Bank
                    </a>
                    <!--<a class="nav-link collapsed" href="#" data-bs-toggle="collapse"-->
                    <!--    data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">-->
                    <!--    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>-->
                    <!--    Operations-->
                    <!--    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
                    <!--</a>-->
                    <!--<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"-->
                    <!--    data-bs-parent="#sidenavAccordion">-->
                    <!--    <nav class="sb-sidenav-menu-nested nav">-->
                    <!--        <a class="nav-link" href="operation-topup-1.html">Process Topup</a>-->
                    <!--        <a class="nav-link" href="operation-card-1.html">Process Card</a>-->
                    <!--    </nav>-->
                    <!--</div>-->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Operations"
                        aria-expanded="false" aria-controls="Operations">
                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                        Operations
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Operations" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url() ?>admin/transactions/topup">Topup</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#History"
                        aria-expanded="false" aria-controls="History">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        History
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="History" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url() ?>admin/transactions/topup">Add/Receive Funds</a>
                            <a class="nav-link" href="<?= base_url() ?>admin/transactions/towallet">Wallet to Wallet</a>
                            <a class="nav-link" href="<?= base_url() ?>admin/transactions/tobank">Wallet to Bank</a>
                        </nav>
                    </div>
                    <a class="nav-link <?= @$mn_swap ?>" href="<?= base_url() ?>admin/swap">
                        <div class="sb-nav-link-icon"><i class="fas fa-right-left"></i></div>
                        Swap
                    </a>
                    <!--<a class="nav-link" href="currency.html">-->
                    <!--    <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>-->
                    <!--    Currency-->
                    <!--</a>-->
                    <!--<a class="nav-link" href="mifs-bank.html">-->
                    <!--    <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>-->
                    <!--    MIF's Bank-->
                    <!--</a>-->
                    <a class="nav-link" href="<?= base_url() ?>auth/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>