    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link <?= @$mn_dashboard ?>" href="<?= base_url() ?>m3rc4n73/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed <?= @$mn_member ?>" href="#" data-bs-toggle="collapse"
                            data-bs-target="#Member" aria-expanded="false" aria-controls="Member">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Member" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>m3rc4n73/member/member?status=active2">Member
                                    Active</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                    href="<?= base_url() ?>m3rc4n73/member/member?status=disabled2">Member
                                    Disable</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>m3rc4n73/member/member?status=new">New Member
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed <?= @$mn_op ?>" href="#" data-bs-toggle="collapse"
                            data-bs-target="#mnTopup" aria-expanded="false" aria-controls="mnTopup">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Topup
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="mnTopup" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>m3rc4n73/operations/topup">
                                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>Wallet Topup</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>m3rc4n73/operations/ciaktopup">
                                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>Ciak Topup</a>
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
                        <a class="nav-link collapsed <?= @$mn_opbisnis ?>" href="#" data-bs-toggle="collapse"
                            data-bs-target="#business" aria-expanded="false" aria-controls="Operations">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Business
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse <?=$mn_bisnis?>" id="business" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link <?= @$mn_subcategory ?>" href="<?= base_url() ?>m3rc4n73/business/business_category">
                                    Business Category
                                </a>
                                <a class="nav-link <?= @$mn_subbisnis ?>" href="<?= base_url() ?>m3rc4n73/business">
                                    Business Registered
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?= base_url() ?>m3rc4n73/auth/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>