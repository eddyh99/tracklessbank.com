    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link <?= @$mn_dashboard ?>" href="<?= base_url() ?>m3rc4n73/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link <?= @$mn_member ?>" href="<?= base_url() ?>m3rc4n73/member">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member
                        </a>
                        <a class="nav-link collapsed <?= @$mn_op ?>" href="#" data-bs-toggle="collapse"
                            data-bs-target="#Operations" aria-expanded="false" aria-controls="Operations">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Operations
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Operations" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>m3rc4n73/Operations/topup">Topup</a>
                            </nav>
                        </div>                        
                        <a class="nav-link <?= @$mn_currency ?>" href="<?= base_url() ?>m3rc4n73/currency">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Currency
                        </a>
                        <a class="nav-link <?= @$mn_wcost ?>" href="<?= base_url() ?>m3rc4n73/cost/bcost">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Bank Cost
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