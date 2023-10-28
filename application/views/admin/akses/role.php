<style>
    .box {
        background-color: #438eb9;
        width: 100px;
        height: 100px;
        line-height: 100px;
        border-radius: 5px;
        /* padding: 35px; */
        margin: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .textbox {
        color: #fff;
        font-weight: 500;
        text-decoration: none;
    }

    .delbox {
        position: absolute;
        top: 15px;
        right: 70px;
        background-color: #d15b47;
        width: 23px;
        padding: 5px;
        border-radius: 100%;
        color: #000;
    }

    .editbox {
        position: absolute;
        top: 15px;
        right: 45px;
        background-color: #87b87f;
        width: 23px;
        padding: 5px;
        border-radius: 100%;
        color: #000;
    }

    .borderbtm {
        border-bottom: 1px dotted #000;
    }
</style>
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
        <li class="active">Configurasi</li>
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

                        <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Menu Baru</a>

                        <!-- <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">

                                </a>
                            </div>
                        </div> -->


                        <div class="row">

                            <?php foreach ($role as $r) : ?>
                                <div class="col-lg-2 borderbtm">
                                    <a onclick="return confirm('Delete this menu?')" href="<?= base_url('admin/delete/') . $r['id']; ?>"><i class="glyphicon glyphicon-remove delbox"></i></a>
                                    <a href="<?= base_url('admin/edit/') . $r['id']; ?>" data-toggle="modal" data-target="#newEditRole<?= $r['id']; ?>"><i class="glyphicon glyphicon-edit editbox"></i></a>
                                    <div class="box">
                                        <center>
                                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="textbox"><?= $r['role']; ?></a>
                                        </center>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>


                        <!-- MODAL -->

                        <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newRoleModalLabel">Tambah Menu Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/role'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role">
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

                        <!-- EDIT MODAL -->
                        <?php foreach ($role as $r) : ?>
                            <div class="modal fade" id="newEditRole<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newRoleModalLabel">Tambah Menu Baru</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/edit_role'); ?>" method="post">
                                            <input type="hidden" name="id" class="form-control" value="<?= $r['id']; ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>" placeholder="Nama Role">
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
        </div>
    </div>
</div>