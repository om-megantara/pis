<?php
// $idupload    = $_GET['idupload'];
?>
<!-- #section:basics/content.breadcrumbs -->


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
            Rekap Karyawan
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
                        <input type="hidden" value="<?php //echo $idupload; 
                                                    ?>">
                        <tr>
                            <th>No</th>
                            <th>No. Pin</th>
                            <th>NIP</th>
                            <th>Nama Karyawan</th>
                            <th>Durasi Terlambat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "application/config/database.php";
                        // $nip2 = mysqli_query($link, "select * from absensi_terlambat group by nip");
                        // $no = 1;
                        // while ($nip = mysqli_fetch_array($nip2)) {
                        //     $nipx = $nip["nip"]; //echo $nipx;

                        //     $tampil = mysqli_query($link, "select durasi from absensi_terlambat where nip='$nipx'");



                        /*echo "Jam Mulai : ".$jam_mulai='08:30:09'; 
												echo ""; 
												echo "Jam Selesai : ".$jam_selesai='09:45:01'; 
												echo ""; 
												$times = array($jam_mulai,$jam_selesai); 
												//$times = array(’08:30:22′,’09:45:53′); 
												$seconds = 0; 
												foreach ( $times as $time ) { 
													list( $g, $i, $s ) = explode( ':', $time ); 
													$seconds += $g * 3600; 
													$seconds += $i * 60; 
													$seconds += $s; } 
													$hours = floor( $seconds / 3600 ); 
													$seconds -= $hours * 3600; 
													$minutes = floor( $seconds / 60 ); 
													$seconds -= $minutes * 60; 
													echo "Hasil penjumlahan : {$hours}:{$minutes}:{$seconds}"; 
													echo "";*/


                        $jumtot = 0;
                        $jam_mulai = "00:00:00";
                        // while ($row = mysqli_fetch_array($tampil)) {
                        //     $jam_selesai = $row["durasi"];
                        //     $times = array($jam_mulai, $jam_selesai);
                        //     foreach ($times as $time) {
                        //         list($g, $i, $s) = explode(':', $time);
                        //         $seconds += $g * 3600;
                        //         $seconds += $i * 60;
                        //         $seconds += $s;
                        //     }
                        //     $hours = floor($seconds / 3600);
                        //     $seconds -= $hours * 3600;
                        //     $minutes = floor($seconds / 60);
                        //     $seconds -= $minutes * 60;

                        //     $jam_mulai = "{$hours}:{$minutes}:{$seconds}";
                        //     $no++;
                        // } 
                        ?>
                        <!-- <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nip['pin']; ?></td>
                                <td><?php echo $nip['nip']; ?></td>
                                <td><?php echo $nip['nama_karyawan']; ?></td>
                                <?php
                                $jam = "{$hours}";
                                $menit = "{$minutes}";
                                $detik = "{$secons}";
                                if (Strlen($jam) == 1) {
                                    $jam = "0" . $jam;
                                }
                                if (Strlen($menit) == 1) {
                                    $menit = "0" . $menit;
                                }
                                //if (Strlen($detik)==1){$detik="0".$detik;}
                                $detik = "00";
                                ?>
                                <td><?php echo $jam . ":" . $menit . ":" . $detik; ?></td>
                            </tr> -->

                        <?php //}
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