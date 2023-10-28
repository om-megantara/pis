<?php
// $login = $_SESSION['namauser'];

$tgl_skg = date('d-m-Y');
/*$tgl_plh=date_format(date_create($tgl_skg),"Y-m-d"); 
 $result2=mysql_query("SELECT * FROM gudang_paku_statuspilih where tgl_pilih='$tgl_plh'") or die(mysql_error());
 if ($result2>=1){
 $result=mysql_fetch_array(mysql_query("SELECT * FROM gudang_paku_statuspilih where tgl_pilih='$tgl_plh'")) or die(mysql_error());
 $kpc=$result['kp_coil'];
 $drawing=$result['drawing'];
 $pa1=$result['pa1'];
 $pa2=$result['pa2'];
 $pb=$result['pb'];
 $wdpc=$result['wdpc'];
 $oven_gas=$result['oven_gas'];
 $oven_galv=$result['oven_galv'];
 }else{
	 $result=mysql_fetch_array(mysql_query("SELECT * FROM gudang_paku_statuspilih")) or die(mysql_error());
	 $kpc=$result['kp_coil'];
	 $drawing=$result['drawing'];
	 $pa1=$result['pa1'];
	 $pa2=$result['pa2'];
	 $pb=$result['pb'];
	 $wdpc=$result['wdpc'];
	 $oven_gas=$result['oven_gas'];
	 $oven_galv=$result['oven_galv'];
 }
 */
?>
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
        <li class="active">Mutasi</li>
        <li class="active">Kawat Paku</li>
    </ul><!-- /.breadcrumb -->
</div>

<!-- /section:settings.box -->
<div class="page-header">
    <h1>
        Mutasi Kawat Paku
    </h1>
</div><!-- /.page-header -->

<form id="demoform5m" action="?p=mut-gdgkp-proses" method="post">
    <div class="col-xs-12 col-sm-4">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Pilihan Kode Barang yang diberikan ke Produksi
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>Tanggal Mutasi</label>
                <?php if ($login = "") { ?>
                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                        <input class="form-control date-picker" readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_skg; ?>" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                <?php } else { ?>
                    <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                        <input readonly="readonly" name="txttgl" id="txttgl" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_skg; ?>" />
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-4">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Pilihan Lokasi Buffer
        </div>
        <div class=""></div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Buffer Bahan</label>
                <select class="form-control" onchange="test()" id="lokasi" name="lokasi">
                    <option value="0">-Pilih Lokasi-</option>
                    <?php if (($kpc <= 0) || ($login != "")) { ?>
                        <option value="2.1">Paku Coil</option>
                    <?php } ?>
                    <?php if (($drawing <= 0) || ($login != "")) { ?>
                        <option value="2.2">Drawing</option>
                    <?php } ?>
                    <?php if (($pa1 <= 0) || ($login != "")) { ?>
                        <option value="2.3">PA1</option>
                    <?php } ?>
                    <?php if (($pa2 <= 0) || ($login != "")) { ?>
                        <option value="2.4">PA2</option>
                    <?php } ?>
                    <?php if (($pb <= 0) || ($login != "")) { ?>
                        <option value="2.5">PB</option>
                    <?php } ?>
                    <?php if (($wdpc <= 0) || ($login != "")) { ?>
                        <option value="2.6">WDPC</option>
                    <?php } ?>
                    <?php if (($oven_gas <= 0) || ($login != "")) { ?>
                        <option value="2.7">Oven GAS</option>
                    <?php } ?>
                    <?php if (($oven_galv <= 0) || ($login != "")) { ?>
                        <option value="2.8">Oven Galvanis</option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <select multiple="multiple" size="10" name="duallistbox_demo1[]" id="duallistbox_demo1[]">

            <?php
            // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
            include "application/config/database.php";
            $tampil = mysqli_query($link, "select * from gudang_paku where status_gudang='1' order by kode desc");
            $no = 1;
            $jumtot = 0;
            while ($row = mysqli_fetch_array($tampil, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <option value="<?php echo $row['kode']; ?>"><?php echo $row['diameter'] . " | " . $row['kode_barang'] . " | " . $row['berat'] . " | " . $row['jns_brg']; ?></option>
                    <td></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </select>
        <br>
        <button type="submit" class="btn btn-default btn-block">Submit data</button></br>
        <!--<div class="hr hr-16 hr-dotted"></div>-->

    </div>
</form>
<!--</div>-->