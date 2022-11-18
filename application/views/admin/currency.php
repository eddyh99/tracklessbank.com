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
                        <a class="nav-link" href="member-1.html">
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
                        <a class="nav-link active" href="currency.html">
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
                    <div class="col-12 card my-5">
                        <div class="card-header fw-bold">
                            <i class="fas fa-money-bill me-1"></i>
                            Currency List
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Currency</h4>
                                    </div>
                                    <div class="col-12 px-5">
                                        <div class="row">
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-1" checked disabled>
                                                <label class="form-check-label" for="curr-1">USD</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-2">
                                                <label class="form-check-label" for="curr-2">Arab Emirat
                                                    Dirham</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-3">
                                                <label class="form-check-label" for="curr-3">Argentine
                                                    Peso</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-4">
                                                <label class="form-check-label" for="curr-4">Australian
                                                    Dollar</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-5">
                                                <label class="form-check-label" for="curr-5">Bangladesh
                                                    Taka</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-6">
                                                <label class="form-check-label" for="curr-6">Bulgarian
                                                    lev</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-7">
                                                <label class="form-check-label" for="curr-7">Botswana
                                                    Pula</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-8">
                                                <label class="form-check-label" for="curr-8">Canadian
                                                    Dollar</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-9">
                                                <label class="form-check-label" for="curr-9">Swiss
                                                    Franc</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-10">
                                                <label class="form-check-label" for="curr-10">Chilean
                                                    Peso</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-11">
                                                <label class="form-check-label" for="curr-11">Chinese
                                                    Yuan</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-12">
                                                <label class="form-check-label" for="curr-12">Costa Rican
                                                    Colon</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-13">
                                                <label class="form-check-label" for="curr-13">Czech
                                                    koruna</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-14">
                                                <label class="form-check-label" for="curr-14">Danish
                                                    Krone</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-15">
                                                <label class="form-check-label" for="curr-15">Egyptian
                                                    Pound</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-16">
                                                <label class="form-check-label" for="curr-16">Euro</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-17">
                                                <label class="form-check-label" for="curr-17">Pound
                                                    sterling</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-18">
                                                <label class="form-check-label" for="curr-18">Georgian
                                                    lari</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-19">
                                                <label class="form-check-label" for="curr-19">Ghanaian
                                                    cedi</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-20">
                                                <label class="form-check-label" for="curr-20">Hongkong
                                                    Dollar</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-21">
                                                <label class="form-check-label" for="curr-21">Croatian
                                                    kuna</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-22">
                                                <label class="form-check-label" for="curr-22">Hungarian
                                                    Forint</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-23">
                                                <label class="form-check-label" for="curr-23">Indonesian
                                                    Rupiah</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-24">
                                                <label class="form-check-label" for="curr-24">Israeli new
                                                    shekel</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-25">
                                                <label class="form-check-label" for="curr-25">Indian
                                                    Rupee</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-26">
                                                <label class="form-check-label" for="curr-26">Japanese
                                                    Yen</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-27">
                                                <label class="form-check-label" for="curr-27">Kenyan
                                                    Shi</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-28">
                                                <label class="form-check-label" for="curr-28">South
                                                    Kore</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-29">
                                                <label class="form-check-label" for="curr-29">Sri
                                                    Lankan</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-30">
                                                <label class="form-check-label" for="curr-30">Morrocan
                                                    D</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-31">
                                                <label class="form-check-label" for="curr-31">Mexican
                                                    Pe</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-32">
                                                <label class="form-check-label" for="curr-32">Malaysian</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-33">
                                                <label class="form-check-label" for="curr-33">Nigerian
                                                    N</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-34">
                                                <label class="form-check-label" for="curr-34">Norwegian</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-35">
                                                <label class="form-check-label" for="curr-35">Nepalese
                                                    R</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-36">
                                                <label class="form-check-label" for="curr-36">New
                                                    Zealan</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-37">
                                                <label class="form-check-label" for="curr-37">Peruvian
                                                    S</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-38">
                                                <label class="form-check-label" for="curr-38">Philippine</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-39">
                                                <label class="form-check-label" for="curr-39">Pakistani</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-40">
                                                <label class="form-check-label" for="curr-40">Poland
                                                    zło</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-41">
                                                <label class="form-check-label" for="curr-41">Romanian
                                                    L</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-42">
                                                <label class="form-check-label" for="curr-42">Russian
                                                    Ru</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-43">
                                                <label class="form-check-label" for="curr-43">Swedish
                                                    Kr</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-44">
                                                <label class="form-check-label" for="curr-44">Singapore</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-45">
                                                <label class="form-check-label" for="curr-45">Thailand
                                                    B</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-46">
                                                <label class="form-check-label" for="curr-46">Turkish
                                                    Li</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-47">
                                                <label class="form-check-label" for="curr-47">Tanzanian</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-48">
                                                <label class="form-check-label" for="curr-48">Ukranian
                                                    H</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-49">
                                                <label class="form-check-label" for="curr-49">Ugandan
                                                    Sh</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-50">
                                                <label class="form-check-label" for="curr-50">US.
                                                    Dollar</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-51">
                                                <label class="form-check-label" for="curr-51">Uruguayan</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-52">
                                                <label class="form-check-label" for="curr-52">Vietnamese</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-53">
                                                <label class="form-check-label" for="curr-53">CFA
                                                    Franc</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-54">
                                                <label class="form-check-label" for="curr-54">South
                                                    Afri</label>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="curr-55">
                                                <label class="form-check-label" for="curr-55">Zambian
                                                    Kw</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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