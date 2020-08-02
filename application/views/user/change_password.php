<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>CHANGE PASSWORD</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>CHANGE PASSWORD</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('user/changePassword'); ?>" method="POST">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-2 col-sm-2" for="current_password">Current Password <font color="red">*</font></label>
                            <div class="col-md-5 col-sm-5">
                                <input class="form-control" type="password" name="current_password" id="current_password" data-validate-length="6,8" required='required' />
                            </div>
                        </div>
                        <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                        <br>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-2 col-sm-2" for="new_password1">New Password <font color="red">*</font></label>
                            <div class="col-md-5 col-sm-5">
                                <input class="form-control" type="password" name="new_password1" id="new_password1" data-validate-length="6,8" required='required' />
                            </div>
                        </div>
                        <?= form_error('new_password1', '<div class="text-danger">', '</div>'); ?>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-2 col-sm-2" for="new_password2">Repeat Password <font color="red">*</font></label>
                            <div class="col-md-5 col-sm-5">
                                <input class="form-control" type="password" name="new_password2" id="new_password2" data-validate-length="6,8" required='required' />
                            </div>
                        </div>
                        <?= form_error('new_password2', '<div class="text-danger">', '</div>'); ?>

                        <hr>
                        <div class="field item form-group">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>