<!-- Page Heading -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>
            <a href="<?= base_url('admin'); ?>">Admin</a>
        </li>
        <li class="active"><i class="fa fa-edit"></i> Forms</li>
        <!--<li class="active">Hasil Drawing</li>-->
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="page-header">
                <h1>
                    <?= $title; ?>
                </h1>
            </div>
            <!-- /.row -->
            <ol class="breadcrumb"></ol>
            <div class="row"></div>
            <div class="row">



                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('admin/ganti_password'); ?>" method="POST">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-3">
                            <input name="username" autofocus type="text" class="form-control" id="username" value="<?= $user['username']; ?>" readonly>
                            <!-- error message -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pass_lama" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-3">
                            <input name="pass_lama" autofocus type="password" class="form-control" id="pass_lama">
                            <!-- error message -->
                            <?= form_error('pass_lama', '<small class="text-danger pl-2 pt-1">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pass_baru" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-3">
                            <input autocomplete="off" name="pass_baru" type="password" class="form-control" id="pass_baru">
                            <!-- error message -->
                            <?= form_error('pass_baru', '<small class="text-danger pl-2 pt-1">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="confirm_password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-3">
                            <input autocomplete="off" name="confirm_password" type="password" class="form-control" id="confirm_password">
                            <!-- error message -->
                            <?= form_error('confirm_password', '<small class="text-danger pl-2 pt-1">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Change password</button>
                        </div>
                    </div>
                </form>

                <!--</div>-->

            </div>
            <!-- /#page-wrapper -->
        </div>
        <script>
            function cek() {

                var passl = document.getElementById("pass_lama").value;
                var passb = document.getElementById("pass_baru").value;
                var passc = document.getElementById("pass_conf").value;
                var psw = "<?php echo $pass['password']; ?>";
                if (passl == "") {
                    alert('Password Lama kosong, silahkan masukkan password lama..!');
                    return false;
                } else if (passl != psw) {
                    alert('Password Lama salah, silahkan masukkan password lama..!');
                    return false;
                } else if (passb == "") {
                    alert('Password Baru kosong, silahkan masukkan password baru..!');
                    return false;
                } else if (passc == "") {
                    alert('Konfirmasi Password kosong, silahkan masukkan konfirmasi password..!');
                    return false;
                } else if (passb != passc) {
                    alert('Password Baru dan Konfirmasi password harus sama..!');
                    return false;
                } else {
                    return true;
                }
            }
        </script>