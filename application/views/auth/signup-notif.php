<div class="login bg-signin-succes">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-5 box-form hide-bg">
                <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                    action="<?= base_url(); ?>member">
                    <div class="col-12 mt-auto text-center my-auto">
                        <img src="<?= base_url(); ?>assets/img/tracklessbank/trackless.png" alt="">
                    </div>
                    <div class="col-12 d-grid gap-2">
                        <p class="text-center f-roboto">Check your email to activate your account</p>
                        <p class="text-center f-roboto text-mute">If you don't receive any email check in spam</p>
                        <a href="<?= base_url() ?>auth/login" class="btn btn-login f-roboto">ENTER</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>