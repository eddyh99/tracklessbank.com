<header class="slider bg-slider-bank">
    <nav class="navbar navbar-expand-lg bg-transparent" id="mainNav">
        <div class="container-fluid ps-0 pe-5">
            <a class="navbar-brand fw-bold" href="#page-top">
                <img src="<?= base_url(); ?>assets/images/tc-bank-new.png">
            </a>
            <button class="navbar-toggler toggler-trackless" type="button" data-bs-toggle="offcanvas"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3 mt-lg-3 text-white" href="#service">Service</a>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3 mt-lg-3 text-white" href="#price">Price</a>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3 mt-lg-3 text-white" href="#">Technology</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://tracklessproject.com" class="bg-trackless nav-link me-lg-3">
                            <svg width="57" height="53" viewBox="0 0 57 53" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.908 1.37204C27.8784 0.750986 29.1214 0.750986 30.0918 1.37204L54.7011 17.122C56.0749 18.0012 56.4758 19.8276 55.5966 21.2013C54.7174 22.575 52.8911 22.9759 51.5174 22.0967L49.1717 20.5955V44.2188C49.1717 48.568 45.646 52.0938 41.2967 52.0938H15.703C11.3538 52.0938 7.828 48.568 7.828 44.2188V20.5955L5.48239 22.0967C4.10868 22.9759 2.28235 22.575 1.40317 21.2013C0.523991 19.8276 0.924893 18.0012 2.29861 17.122L26.908 1.37204ZM19.1483 24.0391C18.3328 24.0391 17.6717 24.7001 17.6717 25.5156C17.6717 26.3311 18.3328 26.9922 19.1483 26.9922H37.8514C38.6669 26.9922 39.328 26.3311 39.328 25.5156C39.328 24.7001 38.6669 24.0391 37.8514 24.0391H19.1483ZM17.6717 31.4219C17.6717 30.6064 18.3328 29.9453 19.1483 29.9453H27.0233C27.8388 29.9453 28.4999 30.6064 28.4999 31.4219C28.4999 32.2374 27.8388 32.8984 27.0233 32.8984H19.1483C18.3328 32.8984 17.6717 32.2374 17.6717 31.4219ZM19.1483 35.8516C18.3328 35.8516 17.6717 36.5126 17.6717 37.3281C17.6717 38.1436 18.3328 38.8047 19.1483 38.8047H30.9608C31.7763 38.8047 32.4374 38.1436 32.4374 37.3281C32.4374 36.5126 31.7763 35.8516 30.9608 35.8516H19.1483Z"
                                    fill="#00DD9C" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close close-trackless" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Technology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://tracklessproject.com">
                                <svg width="57" height="53" viewBox="0 0 57 53" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M26.908 1.37204C27.8784 0.750986 29.1214 0.750986 30.0918 1.37204L54.7011 17.122C56.0749 18.0012 56.4758 19.8276 55.5966 21.2013C54.7174 22.575 52.8911 22.9759 51.5174 22.0967L49.1717 20.5955V44.2188C49.1717 48.568 45.646 52.0938 41.2967 52.0938H15.703C11.3538 52.0938 7.828 48.568 7.828 44.2188V20.5955L5.48239 22.0967C4.10868 22.9759 2.28235 22.575 1.40317 21.2013C0.523991 19.8276 0.924893 18.0012 2.29861 17.122L26.908 1.37204ZM19.1483 24.0391C18.3328 24.0391 17.6717 24.7001 17.6717 25.5156C17.6717 26.3311 18.3328 26.9922 19.1483 26.9922H37.8514C38.6669 26.9922 39.328 26.3311 39.328 25.5156C39.328 24.7001 38.6669 24.0391 37.8514 24.0391H19.1483ZM17.6717 31.4219C17.6717 30.6064 18.3328 29.9453 19.1483 29.9453H27.0233C27.8388 29.9453 28.4999 30.6064 28.4999 31.4219C28.4999 32.2374 27.8388 32.8984 27.0233 32.8984H19.1483C18.3328 32.8984 17.6717 32.2374 17.6717 31.4219ZM19.1483 35.8516C18.3328 35.8516 17.6717 36.5126 17.6717 37.3281C17.6717 38.1436 18.3328 38.8047 19.1483 38.8047H30.9608C31.7763 38.8047 32.4374 38.1436 32.4374 37.3281C32.4374 36.5126 31.7763 35.8516 30.9608 35.8516H19.1483Z"
                                        fill="#00DD9C" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container px-5 py-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-7">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-start">
                    <h1 class="f-dmsans text-white mb-3">Open your own
                        Online Bank for
                        FREE
                        <svg class="line" width="231" height="10" viewBox="0 0 231 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.99998 7.28623C44.4229 3.94673 149.19 -0.964693 228.874 6.1057" stroke="#1AA37A"
                                stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </h1>
                    <p class="text-trackless lead fw-normal mt-3 mb-3">With us you don’t have to worry about :</p>
                    <div class="row text-trackless list-slider">
                        <div class="col-md-4">
                            <!-- Feature item-->
                            <div class="">
                                <p class="mb-2">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="26" height="26" rx="13" fill="#55FAB8" />
                                        <path
                                            d="M11.5001 15.3791L18.3941 8.48438L19.4553 9.54488L11.5001 17.5001L6.72705 12.7271L7.78755 11.6666L11.5001 15.3791Z"
                                            fill="black" />
                                    </svg>
                                    License
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- Feature item-->
                            <div class="">
                                <p class="mb-2">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="26" height="26" rx="13" fill="#55FAB8" />
                                        <path
                                            d="M11.5001 15.3791L18.3941 8.48438L19.4553 9.54488L11.5001 17.5001L6.72705 12.7271L7.78755 11.6666L11.5001 15.3791Z"
                                            fill="black" />
                                    </svg>
                                    Safety and security
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Feature item-->
                            <div class="">
                                <p class="mb-2">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="26" height="26" rx="13" fill="#55FAB8" />
                                        <path
                                            d="M11.5001 15.3791L18.3941 8.48438L19.4553 9.54488L11.5001 17.5001L6.72705 12.7271L7.78755 11.6666L11.5001 15.3791Z"
                                            fill="black" />
                                    </svg>
                                    Liquidity
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- Feature item-->
                            <div class="">
                                <p class="mb-2">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="26" height="26" rx="13" fill="#55FAB8" />
                                        <path
                                            d="M11.5001 15.3791L18.3941 8.48438L19.4553 9.54488L11.5001 17.5001L6.72705 12.7271L7.78755 11.6666L11.5001 15.3791Z"
                                            fill="black" />
                                    </svg>
                                    Complicated KYC & AML procedures
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-sm-none d-lg-inline">
                <!-- Masthead device mockup feature-->
                <div class="masthead-device-mockup text-center">
                    <img class="img-fluid" src="<?= base_url(); ?>assets/images/earthcoin.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="box-line-slider">
        <img src="<?= base_url(); ?>assets/images/linevector.png" alt="">
    </div>
</header>

<section id="service" class="bg-black py-5">
    <div class="box-bumi">
        <img src="<?= base_url(); ?>assets/images/earth.png" alt="">
    </div>
    <div class="container p-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-7">
                <h2 class="service-header-text lh-1 mb-4 text-white f-dmsans fw-semibold">Which services can you provide
                    to your
                    future
                    clients ?
                </h2>
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6 p-2">
                        <div class="box-service">
                            <div class="text-center">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#00DD9C" />
                                    <path
                                        d="M16.8333 14.5V33.1667H35.5V35.5H14.5V14.5H16.8333ZM34.6752 18.3418L36.3248 19.9915L29.6667 26.6497L26.1667 23.1508L21.1582 28.1582L19.5085 26.5085L26.1667 19.8503L29.6667 23.3492L34.6752 18.3418V18.3418Z"
                                        fill="black" />
                                </svg>
                                <p class="mb-0 mt-3 mt-lg-4">Anonymous multicurrencies current accounts
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 p-2">
                        <div class="box-service">
                            <div class="text-center">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#00DD9C" />
                                    <path
                                        d="M22.6668 34.3334H18.0002V36.6667H15.6668V34.3334H14.5002C14.1907 34.3334 13.894 34.2105 13.6752 33.9917C13.4564 33.7729 13.3335 33.4761 13.3335 33.1667V15.6667C13.3335 15.3573 13.4564 15.0605 13.6752 14.8417C13.894 14.623 14.1907 14.5 14.5002 14.5H22.6668V12.855C22.6669 12.7704 22.6853 12.6867 22.721 12.6099C22.7566 12.5331 22.8085 12.4649 22.8731 12.4102C22.9377 12.3555 23.0135 12.3155 23.0951 12.293C23.1767 12.2704 23.2623 12.266 23.3458 12.2799L35.6915 14.3379C35.9639 14.3832 36.2114 14.5236 36.39 14.7343C36.5686 14.9449 36.6667 15.212 36.6668 15.4882V18H37.8335V20.3334H36.6668V28.5H37.8335V30.8334H36.6668V33.3452C36.6667 33.6214 36.5686 33.8885 36.39 34.0992C36.2114 34.3098 35.9639 34.4502 35.6915 34.4955L34.3335 34.7219V36.6667H32.0002V35.1115L23.3458 36.5535C23.2623 36.5674 23.1767 36.563 23.0951 36.5405C23.0135 36.5179 22.9377 36.4779 22.8731 36.4232C22.8085 36.3685 22.7566 36.3003 22.721 36.2235C22.6853 36.1467 22.6669 36.063 22.6668 35.9784V34.3334ZM25.0002 33.9134L34.3335 32.357V16.4764L25.0002 14.9212V33.9122V33.9134ZM30.2502 27.3334C29.2842 27.3334 28.5002 26.0267 28.5002 24.4167C28.5002 22.8067 29.2842 21.5 30.2502 21.5C31.2162 21.5 32.0002 22.8067 32.0002 24.4167C32.0002 26.0267 31.2162 27.3334 30.2502 27.3334Z"
                                        fill="black" />
                                </svg>

                                <p class="mb-0 mt-3 mt-lg-4">Anonymous and free custody of funds in over 50 currencies
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 p-2">
                        <div class="box-service">
                            <div class="text-center">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#00DD9C" />
                                    <path
                                        d="M24.3594 18.125H21.6875V16.3438H19.9062V28.8125H17.2344V30.5938H19.9062V32.375H21.6875V19.9062H24.3594V18.125Z"
                                        fill="black" />
                                    <path
                                        d="M35.0469 19.9062H32.375V16.3438H30.5938V27.0312H27.9219V28.8125H30.5938V32.375H32.375V21.6875H35.0469V19.9062Z"
                                        fill="black" />
                                    <path
                                        d="M37.7188 37.7188H14.5625C14.0901 37.7188 13.637 37.5311 13.303 37.197C12.9689 36.863 12.7812 36.4099 12.7812 35.9375V12.7812H14.5625V35.9375H37.7188V37.7188Z"
                                        fill="black" />
                                </svg>

                                <p class="mb-0 mt-3 mt-lg-4">Receive in 10 currencies & convert and send in over 50
                                    currencies
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 p-2">
                        <div class="box-service">
                            <div class="text-center">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#00DD9C" />
                                    <path
                                        d="M26.1665 21.5H35.4998L23.8332 39V28.5H15.6665L26.1665 11V21.5ZM23.8332 23.8333V19.4233L19.7872 26.1667H26.1665V31.293L31.14 23.8333H23.8332Z"
                                        fill="black" />
                                </svg>

                                <p class="mb-0 mt-3 mt-lg-4">Low fees and fast transactions
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 p-2">
                        <div class="box-service">
                            <div class="text-center">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#00DD9C" />
                                    <path
                                        d="M14.5002 14.5H35.5002C35.8096 14.5 36.1063 14.6229 36.3251 14.8417C36.5439 15.0605 36.6668 15.3572 36.6668 15.6667V34.3333C36.6668 34.6428 36.5439 34.9395 36.3251 35.1583C36.1063 35.3771 35.8096 35.5 35.5002 35.5H14.5002C14.1907 35.5 13.894 35.3771 13.6752 35.1583C13.4564 34.9395 13.3335 34.6428 13.3335 34.3333V15.6667C13.3335 15.3572 13.4564 15.0605 13.6752 14.8417C13.894 14.6229 14.1907 14.5 14.5002 14.5ZM34.3335 25H15.6668V33.1667H34.3335V25ZM34.3335 20.3333V16.8333H15.6668V20.3333H34.3335Z"
                                        fill="black" />
                                </svg>

                                <p class="mb-0 mt-3 mt-lg-4">Virtual debit cards & physical debit card
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 p-2">
                        <div class="box-service">
                            <div class="text-center">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#00DD9C" />
                                    <path
                                        d="M19.1668 15.6668V34.3335H30.8335V15.6668H19.1668ZM18.0002 13.3335H32.0002C32.3096 13.3335 32.6063 13.4564 32.8251 13.6752C33.0439 13.894 33.1668 14.1907 33.1668 14.5002V35.5002C33.1668 35.8096 33.0439 36.1063 32.8251 36.3251C32.6063 36.5439 32.3096 36.6668 32.0002 36.6668H18.0002C17.6907 36.6668 17.394 36.5439 17.1752 36.3251C16.9564 36.1063 16.8335 35.8096 16.8335 35.5002V14.5002C16.8335 14.1907 16.9564 13.894 17.1752 13.6752C17.394 13.4564 17.6907 13.3335 18.0002 13.3335ZM25.0002 30.8335C25.3096 30.8335 25.6063 30.9564 25.8251 31.1752C26.0439 31.394 26.1668 31.6907 26.1668 32.0002C26.1668 32.3096 26.0439 32.6063 25.8251 32.8251C25.6063 33.0439 25.3096 33.1668 25.0002 33.1668C24.6907 33.1668 24.394 33.0439 24.1752 32.8251C23.9564 32.6063 23.8335 32.3096 23.8335 32.0002C23.8335 31.6907 23.9564 31.394 24.1752 31.1752C24.394 30.9564 24.6907 30.8335 25.0002 30.8335Z"
                                        fill="black" />
                                </svg>

                                <p class="mb-0 mt-3 mt-lg-4">Clients can connect wallet of your online bank, powered by
                                    TracklessMoney, to a truly anonymous chat TracklessChat
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-footer-trackless border-0">
    <div class="container px-5 refferal-slide">
        <div class="row gx-5 justify-content-center">
            <div class="col-12 col-lg-8 col-xl-8" style="position: relative;">
                <svg class="circle-1" width="155" height="155" viewBox="0 0 155 155" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="77.5" cy="77.5" r="77.5" fill="#00DD9C" />
                </svg>
                <svg class="circle-2" width="116" height="116" viewBox="0 0 116 116" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="58" cy="58" r="58" fill="#00DD9C" />
                </svg>

                <div class="text-white mb-4">
                    <h1 class="f-dmsans">Referral link <br>campaign</h1>
                    <p class="f-inter">You can have the possibility of making an affiliate campaign through
                        the use of the <span class="text-green">Referral link</span>, with this it will be easier
                        to build customer loyalty because the <span class="text-green">Referral link</span> will
                        provide
                        source of earning to affiliates</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="price" class="bg-black py-5">
    <div class="container p-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-8 clr-price">
                <div>
                    <h2 class="text-green f-poppins my-3 my-lg-3 m-lg-0">Clear & transparent prices</h2>
                    <p class="text-white m-0 f-poppins mb-2">We provide to our clients clear and transparent prices.</p>
                    <a href="#" class="btn btn-learn text-green f-poppins">Learn more</a>
                </div>
                <div class="my-4">
                    <p class="text-white f-poppins">
                        <span class="text-green fw-bold">How the platform manager can have his own
                            profit?</span><br>
                        The platform manager will decide fees
                        & commissions for his own clients in order to have his own profit. In addiction he will decide
                        if activate or not the Referral link affiliate campaign
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="px-5 px-sm-0 d-none d-sm-none d-lg-inline">
                    <img class="img-fluid" src="<?= base_url() ?>assets/images/money.png" alt="..." />
                </div>
            </div>
            <div class="col-12 col-lg-12 my-5">
                <div class="col-12 col-lg-8 domain-text text-white">
                    <h2 class="f-baij my-3">
                        Hot deals for you
                        <svg width="25" height="38" viewBox="0 0 25 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.4063 7.38067C15.4498 8.84159 16.0108 10.5921 16.0108 12.3874V14.1195C16.5607 14.1195 17.0949 13.9357 17.5284 13.5973C17.9618 13.2588 18.2698 12.7852 18.4032 12.2517L18.578 11.5523L19.0522 12.1215C19.8169 13.0391 20.2319 14.1979 20.2237 15.3923C20.2154 16.5867 19.7843 17.7396 19.007 18.6465C18.7157 18.9863 18.5634 19.4235 18.5805 19.8708C18.5976 20.3181 18.783 20.7424 19.0994 21.059C19.2761 21.2357 19.4881 21.3731 19.7215 21.4623C19.9549 21.5515 20.2046 21.5905 20.4541 21.5766C20.7036 21.5628 20.9474 21.4965 21.1695 21.3821C21.3916 21.2676 21.5871 21.1076 21.7432 20.9125L23.0705 19.2539L24.3541 22.4629C24.9362 24.4031 24.9821 26.4647 24.4869 28.4289C23.9917 30.3931 22.9739 32.1865 21.5415 33.6189L21.3796 33.7807C19.1749 35.9855 16.1846 37.2242 13.0665 37.2242H11.7569C9.72662 37.2242 7.73098 36.6985 5.96427 35.6982C4.19755 34.6979 2.71998 33.2572 1.67543 31.5162C0.424667 29.4316 -0.14912 27.0105 0.0330705 24.5863C0.215261 22.162 1.14447 19.8539 2.69276 17.9796L7.88843 11.69C8.40043 11.0703 8.72948 10.32 8.8386 9.52357C8.94772 8.72712 8.8326 7.91602 8.50616 7.18139C8.09196 6.24952 8.02055 5.20122 8.30454 4.22179C8.58854 3.24236 9.20966 2.39487 10.0581 1.82912L12.8018 0V2.37393C12.8018 4.16927 13.3627 5.91975 14.4063 7.38067V7.38067Z"
                                fill="url(#paint0_linear_1588_29279)" />
                            <path
                                d="M17.5419 32.8448L17.5476 32.8391C18.5458 31.8332 19.258 30.5795 19.6109 29.207C19.9637 27.8345 19.9445 26.3927 19.5552 25.0301L17.6881 26.8972C17.5119 27.0735 17.3027 27.2132 17.0725 27.3086C16.8423 27.404 16.5955 27.4531 16.3463 27.4531C16.0971 27.4531 15.8504 27.404 15.6201 27.3086C15.3899 27.2132 15.1807 27.0735 15.0045 26.8972C14.6696 26.5624 14.472 26.1145 14.4505 25.6415C14.429 25.1684 14.5852 24.7044 14.8883 24.3406C15.5124 23.5916 15.9047 22.6769 16.0172 21.7085C16.1296 20.74 15.9572 19.7597 15.5212 18.8877L12.4954 12.8359L12.0301 17.9543C11.9743 18.5681 11.7951 19.1644 11.5032 19.7073C11.2113 20.2502 10.8128 20.7286 10.3315 21.1137L7.68626 23.2299C6.98411 23.7916 6.41729 24.5041 6.02778 25.3145C5.63826 26.125 5.43603 27.0126 5.43604 27.9118V28.6402C5.43604 29.5191 5.62929 30.3873 6.00209 31.1833C6.3749 31.9793 6.91814 32.6836 7.59336 33.2463C8.68654 34.1572 10.0681 34.6497 11.491 34.6357L13.3456 34.6173C14.9231 34.6016 16.4308 33.9647 17.5419 32.8448V32.8448Z"
                                fill="#FDD04A" />
                            <path
                                d="M1.89521 13.4773C1.725 13.4773 1.56176 13.4097 1.4414 13.2894C1.32104 13.169 1.25342 13.0058 1.25342 12.8355V11.552C1.25342 11.3817 1.32104 11.2185 1.4414 11.0981C1.56176 10.9778 1.725 10.9102 1.89521 10.9102C2.06543 10.9102 2.22867 10.9778 2.34903 11.0981C2.46939 11.2185 2.53701 11.3817 2.53701 11.552V12.8355C2.53701 13.0058 2.46939 13.169 2.34903 13.2894C2.22867 13.4097 2.06543 13.4773 1.89521 13.4773Z"
                                fill="#FE691E" />
                            <path
                                d="M3.82051 10.2684C3.65029 10.2684 3.48705 10.2007 3.36669 10.0804C3.24633 9.96002 3.17871 9.79678 3.17871 9.62656V8.34297C3.17871 8.17275 3.24633 8.00951 3.36669 7.88915C3.48705 7.76879 3.65029 7.70117 3.82051 7.70117C3.99072 7.70117 4.15397 7.76879 4.27433 7.88915C4.39469 8.00951 4.4623 8.17275 4.4623 8.34297V9.62656C4.4623 9.79678 4.39469 9.96002 4.27433 10.0804C4.15397 10.2007 3.99072 10.2684 3.82051 10.2684Z"
                                fill="#FF8D54" />
                            <path
                                d="M1.25361 7.70195C1.0834 7.70195 0.920155 7.63434 0.799795 7.51398C0.679434 7.39362 0.611816 7.23037 0.611816 7.06016V5.77656C0.611816 5.60635 0.679434 5.4431 0.799795 5.32274C0.920155 5.20238 1.0834 5.13477 1.25361 5.13477C1.42383 5.13477 1.58707 5.20238 1.70743 5.32274C1.82779 5.4431 1.89541 5.60635 1.89541 5.77656V7.06016C1.89541 7.23037 1.82779 7.39362 1.70743 7.51398C1.58707 7.63434 1.42383 7.70195 1.25361 7.70195Z"
                                fill="#FFB895" />
                            <path
                                d="M23.7165 15.4031C23.5463 15.4031 23.383 15.3355 23.2627 15.2151C23.1423 15.0948 23.0747 14.9315 23.0747 14.7613V13.4777C23.0747 13.3075 23.1423 13.1443 23.2627 13.0239C23.383 12.9036 23.5463 12.8359 23.7165 12.8359C23.8867 12.8359 24.05 12.9036 24.1703 13.0239C24.2907 13.1443 24.3583 13.3075 24.3583 13.4777V14.7613C24.3583 14.9315 24.2907 15.0948 24.1703 15.2151C24.05 15.3355 23.8867 15.4031 23.7165 15.4031Z"
                                fill="#FE691E" />
                            <path
                                d="M21.7912 10.9109C21.621 10.9109 21.4578 10.8433 21.3374 10.723C21.217 10.6026 21.1494 10.4394 21.1494 10.2691V8.98555C21.1494 8.81533 21.217 8.65209 21.3374 8.53173C21.4578 8.41137 21.621 8.34375 21.7912 8.34375C21.9614 8.34375 22.1247 8.41137 22.245 8.53173C22.3654 8.65209 22.433 8.81533 22.433 8.98555V10.2691C22.433 10.4394 22.3654 10.6026 22.245 10.723C22.1247 10.8433 21.9614 10.9109 21.7912 10.9109Z"
                                fill="#FF8D54" />
                            <path
                                d="M24.3581 8.98535C24.1879 8.98535 24.0246 8.91773 23.9043 8.79737C23.7839 8.67701 23.7163 8.51377 23.7163 8.34356V6.41816C23.7163 6.24795 23.7839 6.08471 23.9043 5.96435C24.0246 5.84399 24.1879 5.77637 24.3581 5.77637C24.5283 5.77637 24.6916 5.84399 24.8119 5.96435C24.9323 6.08471 24.9999 6.24795 24.9999 6.41816V8.34356C24.9999 8.51377 24.9323 8.67701 24.8119 8.79737C24.6916 8.91773 24.5283 8.98535 24.3581 8.98535Z"
                                fill="#FFB895" />
                            <defs>
                                <linearGradient id="paint0_linear_1588_29279" x1="12.4136" y1="0" x2="12.4136"
                                    y2="37.2242" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF9159" />
                                    <stop offset="0.6875" stop-color="#FF7631" />
                                    <stop offset="1" stop-color="#FF6A1F" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </h2>
                    <p class="f-poppins">Your online bank will be host by our servers,
                        you just need to choose your own domain.</p>
                    <a href="#" class="btn btn-learn text-white">Click here to generate your domain</a>
                </div>
                <div class="col-12 mt-5 mb-3 my-lg-5 powered">
                    <span class="text-white f-monserat">Powered by</span>&nbsp;
                    <img src="<?= base_url() ?>assets/images/tracklessbankonly.png" alt="">
                </div>
                <div class="col-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 col-md-4 col-lg-4 p-3">
                            <div class="box-powered text-center">
                                <img src="<?= base_url() ?>assets/images/magnify.png" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4 p-3">
                            <div class="box-powered text-center">
                                <img src="<?= base_url() ?>assets/images/piggylogo.png" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4 p-3">
                            <div class="box-powered text-center">
                                <img src="<?= base_url() ?>assets/images/freedylogo.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="bg-footer-trackless py-3">
    <div class="container-fluid px-md-5">
        <div class="container">
            <div class="bg-imagebox">
                <img src="<?= base_url() ?>assets/images/trackless-fit.png" alt="" class="footer-logo-center">
            </div>
            <div class="d-flex justify-content-around">
                <div class="col-4">
                    <img src="<?= base_url(); ?>assets/images/footer-logo.png" class="footer-logo">
                    <div class="d-flex flex-wrap icon-sosmed">
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/fb-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/twitter-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/ig-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/c-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/linkedin-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/tiktok-icon.png" class="p-1">
                        </div>
                        <div class="me-md-2 me-lg-2 me-xl-3 mt-3">
                            <img src="<?= base_url() ?>assets/images/youtube-icon.png" class="p-1">
                        </div>
                    </div>
                </div>
                <div class="col-4">&nbsp;</div>
                <div class="col-4 footer-contact">
                    <h2>Contact us</h2>
                    <span>Telegramchanel</span>
                </div>
            </div>
        </div>
        <div translate="no" class="d-flex flex-wrap justify-content-end footer-menus">
            <a href="https://tracklessproject.com" class="">TracklessProject</a> |
            <a href="https://tracklessmail.com" class="">TracklessMail</a> |
            <a href="#" class="">TracklessChat</a> |
            <a href="#" class="">TracklessCompany</a> |
            <a href="#" class="active">TracklessBank</a> |
            <a href="#" class="">TracklessCrypto</a> |
            <a href="#" class="">TracklessMoney</a>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-trackless">
            <div class="modal-header border-0">
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body text-center">
                This email will be used only for password recovery and all the information, included your email, are
                encrypted SHA256 on NP blockchain and obfuscated with CRYPTONOTE protocol
            </div>
        </div>
    </div>
</div>