<!-- Page Heading -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Admin</a>
        </li>
        <li class="active">Manajemen user</li>
        <!--<li class="active">Hasil Drawing</li>-->
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <!-- #section:settings.box -->
    <?php //include "container.php"; 
    ?>

    <!-- /section:settings.box -->
    <div class="page-header">
        <h1>
            <?= $title; ?>
        </h1>
    </div><!-- /.page-header -->
    <div class="page-content">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newUserModal"><i class="ace-icon fa fa-plus bigger-160"></i>Tambah User Baru</a>
                        <h2></h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <center>No.</center>
                                        </th>
                                        <th width="15%">
                                            <center>Jabatan</center>
                                        </th>
                                        <th width="10%">
                                            <center>Username</center>
                                        </th>
                                        <th width="5%">
                                            <center>Role ID</center>
                                        </th>
                                        <th width="5%">
                                            <center>Is Active</center>
                                        </th>
                                        <th width="15%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($useradmin as $u) : ?>

                                        <tr>
                                            <td>
                                                <center><?php echo $no; ?></center>
                                            </td>
                                            <td><?= $u['name']; ?></td>
                                            <td><?= $u['username']; ?></td>
                                            <td>
                                                <center><?= $u['role_id']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php

                                                        if ($u['is_active'] == 1) {
                                                            $check = "checked='true'";
                                                            $nilai = 1;
                                                            $text = "Aktif";
                                                        } else {
                                                            $check = "";
                                                            $nilai = 0;
                                                            $text = "Non Aktif";
                                                        }

                                                        echo '<input class="mb-3" type="checkbox" ' . $check . 'name="is_active"  value="1">';

                                                        ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <!-- <a href="<?= base_url('menu/edit-menu/') . $u['id']; ?>" data-id="<?= $u['id']; ?>" data-toggle="modal" data-target="#newEditMenu"><i class="fa fa-edit"></i> Edit</a> -->

                                                    <a href="#" type="button" data-toggle="modal" data-target="#newEditUser<?= $u['id']; ?>"><i class="fa fa-edit"></i> Edit</a>

                                                    <a onclick="return confirm('Delete this user?')" href="<?= base_url('admin/delete-user/') . $u['id']; ?>"><i class="fa fa-remove"></i> Hapus</a>
                                                </center>
                                            </td>

                                        </tr>
                                        <?php $no++;         ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- MODAL -->

            <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newMenuModalLabel">Tambah User Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/add_user'); ?>" method="post">
                            <div class="modal-body menu-body">
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control" id="name" name="name" placeholder="Jabatan">
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="role_id" name="role_id" placeholder="role ID">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" value="<?= $user['is_active']; ?>" id=" is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Aktif?
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL -->

            <?php foreach ($useradmin as $u) : ?>
                <div class="modal fade" id="newEditUser<?= $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">

                    <!-- <div class="modal fade" id="modal_edit<?php echo $barang_id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true"> -->

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMenuModalLabel">Edit Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/edit-user'); ?>" method="post">
                                <input type="hidden" name="id" class="form-control" value="<?= $u['id']; ?>">
                                <div class="modal-body menu-body">
                                    <div class="form-group">
                                        <input autocomplete="off" type="text" class="form-control" id="name" name="name" value="<?= $u['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="text" class="form-control" id="username" name="username" value="<?= $u['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="password" class="form-control" id="password" name="password" value="<?= $u['password']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $u['role_id']; ?>">
                                    </div>
                                    <div class="form-group">

                                        <?php
                                        if ($u['is_active'] == 1) {
                                            $check = "checked='true'";
                                            $nilai = 1;
                                            $text = "Aktif";
                                        } else {
                                            $check = "";
                                            $nilai = 0;
                                            $text = "Non Aktif";
                                        }

                                        echo '<input type="checkbox" ' . $check . 'name="is_active"  value="1">(' . $text . ')';

                                        ?>

                                        <!-- <a onclick="return confirm('Reset Password Sekarang?')" href="<?= base_url('admin/reset_password/') . $u['id']; ?>">Reset Password</a> -->
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>