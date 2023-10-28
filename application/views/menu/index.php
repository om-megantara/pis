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
        <li class="active">Manajemen Menu</li>
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

                        <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="ace-icon fa fa-plus bigger-160"></i>Tambah Menu Baru</a>
                        <h2></h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <center>No.</center>
                                        </th>
                                        <th width="25%">
                                            <center>Menu</center>
                                        </th>
                                        <th width="20%">
                                            <center>Icon</center>
                                        </th>
                                        <th width="15%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($menu as $m) : ?>

                                        <tr>
                                            <td>
                                                <center><?php echo $no; ?></center>
                                            </td>
                                            <td><?= $m['menu']; ?></td>
                                            <td><?= $m['icon']; ?></td>
                                            <td>
                                                <center>
                                                    <!-- <a href="<?= base_url('menu/edit-menu/') . $m['id']; ?>" data-id="<?= $m['id']; ?>" data-toggle="modal" data-target="#newEditMenu"><i class="fa fa-edit"></i> Edit</a> -->

                                                    <a href="#" data-toggle="modal" data-target="#newEditMenu<?= $m['id']; ?>"><i class="fa fa-edit"></i> Edit</a>

                                                    <a onclick="return confirm('Delete this menu?')" href="<?= base_url('menu/delete/menu/') . $m['id']; ?>"><i class="fa fa-remove"></i> Hapus</a>
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

            <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu'); ?>" method="post">
                            <div class="modal-body menu-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Sub Menu">
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

            <?php foreach ($menu as $m) : ?>
                <div class="modal fade" id="newEditMenu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">

                    <!-- <div class="modal fade" id="modal_edit<?php echo $barang_id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true"> -->

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMenuModalLabel">Edit Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('menu/edit_menu'); ?>" method="post">
                                <input type="hidden" name="id" class="form-control" value="<?= $m['id']; ?>">
                                <div class="modal-body menu-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>" placeholder="Nama Menu">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $m['icon']; ?>" placeholder="Icon Sub Menu">
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