<div class="page-title">
    <div class="title_left">
        <h3>USER PROFILE</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>USER PROFILE</h2>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <center><img src="<?= base_url('upload/') . $akun['image'] ?>" title="Your photo" alt="Avatar" width="250px"></center>
                            <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                        </div>
                    </div>
                    <h3><?= $akun['name'] ?></h3>

                    <ul class="list-unstyled user_data">
                        <li>
                            <h4><i class="fa fa-user user-profile-icon"></i> <?= $akun['role']; ?></h4>
                        </li>
                        <li class="m-top-xs">
                            <h4><i class="fa fa-envelope user-profile-icon"></i> <?= $akun['email']; ?></h4>
                        </li>
                        <li>
                            <i class="fa fa-calendar user-profile-icon"></i>&ensp;<small>since</small> <?= date('d F Y', $akun['date_created']); ?>
                        </li>
                    </ul>


                    <br />

                </div>
                <div class="col-md-9 col-sm-9 ">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs  bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">My Profile</a>
                            </li>
                            <li role="presentation" class="active"><a href="#tab_content2" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="false">Edit Profile</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab_content1" aria-labelledby="home-tab">
                                <!-- start recent activity -->
                                <ul class="messages">
                                    <li>
                                        <!-- <h1><i class="fa fa-user"></i></h1> -->
                                        <div class="message_wrapper">
                                            <h4 class="heading">NAMA</h4>
                                            <blockquote class="message">
                                                <h4><?= $akun['name']; ?></h4>
                                            </blockquote>
                                            <br />
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">E-MAIL</h4>
                                            <blockquote class="message">
                                                <h4><?= $akun['email']; ?></h4>
                                            </blockquote>
                                            <br />
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">JABATAN</h4>
                                            <blockquote class="message">
                                                <h4><?= $akun['role']; ?></h4>
                                            </blockquote>
                                            <br />
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">TANGGAL DAFTAR</h4>
                                            <blockquote class="message">
                                                <h4><?= date('d F Y', $akun['date_created']); ?></h4>
                                            </blockquote>
                                            <br />
                                        </div>
                                    </li>
                                </ul>
                                <!-- end recent activity -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                <!-- start edit profile -->
                                <?= form_open_multipart('user/my_profile'); ?>
                                <div class="row form-group">
                                    <label class="col-form-label col-md-2 col-sm-2 ">Name <font color="red">*</font></label>
                                    <div class="col-md col-sm">
                                        <input type="text" class="form-control" name="nama" id="nama" required="required" value="<?= $akun['name'] ?>" />
                                        <?= form_error('nama', '<small class="text-warning">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-form-label col-md-2 col-sm-2 ">E-Mail <font color="red">*</font></label>
                                    <div class="col-md col-sm">
                                        <input type="text" class="form-control" name="email" id="email" required="required" value="<?= $akun['email'] ?>" readonly />
                                        <td><?php echo form_error('email'); ?></td>
                                        <td>Sorry, you can't edit your email</td>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2 col-sm-2 ">Picture </label>
                                    <div class="col-md col-sm">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                                    <label class="custom-file-label" for="foto">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <a href="<?= base_url('User/deletePhoto'); ?>" title="Delete your photo" class="btn btn-sm btn-danger">Delete Photo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                                </form>
                                <!-- end edit profile -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->