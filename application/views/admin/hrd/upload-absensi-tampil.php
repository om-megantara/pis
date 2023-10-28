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
        <li class="active">Upload Data</li>
        <li class="active">Absensi</li>
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
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form action="build/build-upload/insert-upload-absensi.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>Tanggal Absensi</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input name="tglabsensi" class="date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" required />
                                <!--<span class="input-group-addon"><i class="fa fa-calendar bigger-110"></i></span>-->
                            </div>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="150">Upload File</td>
                        <td>:</td>
                        <td>

                            <input type="file" name="namafile" id="namafile">
                            <?php
                            $depan = date('H');
                            $tengah = date('i');
                            $belakang = date('s');
                            $jam = $depan . ':' . $tengah . ':' . $belakang;
                            $tgllog = date("Y-m-d");
                            ?>
                            <input name="tgl_input" value="<?php echo date('Y-m-d') . " " . $jam; ?>" type="hidden" /> </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Kosongkan </button>
                            <button class="btn btn-info" type="submit" name="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Upload</button></td>
                        <!--<td>&nbsp;</td>-->
                    </tr>
                </table>
            </form>

            <div class="row">

            </div><!-- /.row -->
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->