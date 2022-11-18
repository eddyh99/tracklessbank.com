<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-navbartop-freedy">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center" href="index.html">
            <img src="assets/img/logo.png" alt="" class="" style="height: 25px;">
            Freedy
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 ms-2 me-lg-0 py-2 px-3" id="sidebarToggle"
            href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="dashboard-1.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="master-wallet-1.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                            Master Wallet
                        </a>
                        <a class="nav-link active" href="member-1.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Memeber
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Operations
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="operation-topup-1.html">Process Topup</a>
                                <a class="nav-link" href="operation-card-1.html">Process Card</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Transactions
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="">Add/Receive Funds</a>
                                <a class="nav-link" href="">Wallet to Wallet</a>
                                <a class="nav-link" href="">Wallet to Bank</a>
                                <a class="nav-link" href="">Wallet to Card</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Default Cost
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Default Fee
                        </a>
                        <a class="nav-link" href="currency.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Currency
                        </a>
                        <a class="nav-link" href="mifs-bank.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>
                            MIF's Bank
                        </a>
                        <div class="sb-sidenav-menu-heading">Settings</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="col-12 my-5">
                        <a href="" class="btn btn-freedy-blue fw-bold px-5 py-3">Send Email</a>
                    </div>
                    <div class="col-12 card mb-5">
                        <div class="card-header fw-bold">
                            <i class="fas fa-list me-1"></i>
                            List Member
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Email</th>
                                        <th>Unique Code</th>
                                        <th>Referral Code</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border-top: 0;">
                                    <tr>
                                        <td>a@gmail.com</td>
                                        <td>asdwq1sq</td>
                                        <td>sadqq1sq</td>
                                        <td>active</td>
                                        <td>2021-08-16 00:00:00</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-secondary">Change Password</a>
                                            <a href="" class="btn btn-sm btn-danger">Disable</a>
                                            <a href="" class="btn btn-sm btn-light">Change Fee</a>
                                            <a href="" class="btn btn-sm btn-primary">View History</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Email</th>
                                        <th>Unique Code</th>
                                        <th>Referral Code</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>