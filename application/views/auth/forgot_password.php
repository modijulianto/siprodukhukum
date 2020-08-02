<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-20 p-b-55">
            <center><?= $this->session->flashdata('registered'); ?></center>
            <form action="<?= base_url('Auth/forgotPassword'); ?>" method="POST" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-32">
                    <center><img src="<?= base_url('assets/images/Undiksha.png'); ?>" width="200px"></center>
                    <center class="p-t-10">Forgot Your Password?</center>
                </span>

                <span class="txt1 p-b-10">
                    Email
                </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate="Email is required">
                    <input class="input100" type="email" name="email" id="email">
                    <span class="focus-input100"></span>
                </div>

                <div class="login100-form-title">
                    <center><button class="login100-form-btn" type="submit">Login</button></center>
                    <hr>
                    <center><a class="txt1" href="<?= base_url('auth') ?>">
                            Back to login
                        </a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>