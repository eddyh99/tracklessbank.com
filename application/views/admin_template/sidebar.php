    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link <?= @$mn_dashboard ?>" href="<?= base_url() ?>m3rc4n73/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link <?= @$mn_currency ?>" href="<?= base_url() ?>m3rc4n73/currency">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Currency
                        </a>
                        <a class="nav-link <?= @$mn_wcost ?>" href="<?= base_url() ?>m3rc4n73/cost/wcost">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Wise Cost
                        </a>
                        <a class="nav-link <?= @$mn_dcost ?>" href="<?= base_url() ?>m3rc4n73/cost/dcost">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Default Cost
                        </a>
                        <a class="nav-link" href="<?= base_url() ?>m3rc4n73/auth/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>