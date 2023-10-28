<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-12">

      <?= $this->session->flashdata('message'); ?>

      <a class="btn btn-secondary" href="<?= base_url('admin/role'); ?>" role="button"><i class="ace-icon fa fa-mail-reply bigger-160"></i>Kembali</a>
      <h2></h2>

      <h5>Role : <?= $role['role']; ?></h5>

      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="data-table">
          <thead>
            <tr>
              <th width="5%">
                <center>No.</center>
              </th>
              <th width="20%">
                <center>Menu</center>
              </th>
              <th width="10%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($menu as $m) : ?>

              <tr>
                <th scope="row">
                  <center><?= $no; ?></center>
                </th>
                <td><?= $m['menu']; ?></td>
                <td>
                  <div class="form-check">
                    <center>
                      <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                    </center>
                  </div>
                </td>
              </tr>
              <?php $no++;         ?>
            <?php endforeach; ?>

          </tbody>
        </table>

      </div>



    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>