<!-- #section:basics/content.breadcrumbs -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="dash.php?hp=home">Home</a>
        </li>
        <li class="active">Absensi</li>
        <li class="active">Daftar Absensi</li>
    </ul><!-- /.breadcrumb -->

    <!-- #section:basics/content.searchbox -->

    <!-- /.nav-search -->

    <!-- /section:basics/content.searchbox -->
</div>

<!-- /section:basics/content.breadcrumbs -->
<div class="page-content">
    <!-- #section:settings.box -->
    <?php //include "container.php"; 
    ?>

    <!-- /section:settings.box -->
    <div class="page-header">
        <h1>
            Daftar Absensi
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Daftar Absensi
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "application/config/database.php";
                        // $tampil = mysqli_query($link, "select distinct tgl_input from tb_absensi");
                        $no = 1;
                        $jumtot = 0;
                        // while ($row = mysqli_fetch_array($tampil)) {
                        ?>
                        <!-- <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['tgl_input']; ?></td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="dash.php?hp=daftar-absensi2&idupload=<?php echo $row['tgl_input']; ?>">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr> -->
                        <?php
                        $no++;
                        //}
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<script>
    function PopupCenter(pageURL, title, w, h) {
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 3) - (h / 2);
        var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }
</script>