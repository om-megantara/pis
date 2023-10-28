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
          <div class="col-lg">
            <?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>

            <?php endif; ?>

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newSubMenuModal"><i class="ace-icon fa fa-plus bigger-160"></i>Tambah Sub Menu Baru</a>
            <h2></h2>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="data-table">
                <thead>
                  <tr>
                    <th width="5%">
                      <center>No.</center>
                    </th>
                    <th width="15%">
                      <center>Title</center>
                    </th>
                    <th width="10%">
                      <center>Menu</center>
                    </th>
                    <th width="10%">
                      <center>Url</center>
                    </th>
                    <th width="15%">
                      <center>Aksi</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($subMenu as $sm) : ?>

                    <tr>
                      <td>
                        <center><?php echo $no; ?></center>
                      </td>
                      <td><?= $sm['title']; ?></td>
                      <td><?= $sm['menu']; ?></td>
                      <td><?= $sm['url']; ?></td>
                      <td>
                        <center>
                          <a href="#" data-toggle="modal" data-target="#newEditSubmenu<?= $sm['id']; ?>"><i class="fa fa-edit"></i> Edit</a>

                          <a onclick="return confirm('Delete this menu?')" href="<?= base_url('menu/delete/submenu/') . $sm['id']; ?>"><i class="fa fa-remove"></i> Hapus</a>
                        </center>
                      </td>

                    </tr>
                    <?php $no++;         ?>
                  <?php endforeach; ?>

                </tbody>
              </table>


            </div>
            <!-- /.container-fluid -->

          </div>
        </div>
        <!-- End of Main Content -->


        <!-- MODAL -->

        <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('menu/sub-menu'); ?>" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title Sub Menu">
                  </div>
                  <div class="form-group">
                    <select name="menu_id" id="menu_id" class="form-control">
                      <option value="">Select Menu</option>
                      <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                      <?php endforeach; ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="url" name="url" placeholder="Url Sub Menu">
                  </div>
                  <!-- <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Sub Menu">
          </div> -->
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
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
      </div>

      <?php foreach ($subMenu as $sm) : ?>
        <div class="modal fade" id="newEditSubmenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Edit Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('menu/edit_submenu'); ?>" method="post">
                <input type="hidden" name="id" class="form-control" value="<?= $sm['id']; ?>">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                  </div>
                  <div class="form-group">
                    <select name="menu_id" id="menu_id" class="form-control">
                      <option>
                        <section><?= $sm['menu']; ?></section>
                      </option>
                      <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                      <?php endforeach; ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                  </div>
                  <!-- <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Sub Menu">
          </div> -->
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="is_active" value="<?= $sm['is_active']; ?>" id=" is_active" checked>
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
      <?php endforeach; ?>
    </div>