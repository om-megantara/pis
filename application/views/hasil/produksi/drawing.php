<?php if (isset($_POST["btn_proses"]) == "") { ?>
    <h3>Tentukan Periode:</h3>
    <form method="POST" action="<?= base_url('hasil/produksi-galvanis'); ?>">
        <div class="row"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_aw" id="txttgl_aw" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_ak" id="txttgl_ak" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label>Setelah menentukan periode klik Proses</label>
                        <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } else {

?>
    <h3>Tentukan Periode:</h3>
    <form method="POST" action="<?= base_url('hasil/produksi-galvanis'); ?>">
        <div class="row"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_aw" id="txttgl_aw" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <div class="input-group date " data-date="" data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" name="txttgl_ak" id="txttgl_ak" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label>Setelah menentukan periode klik Proses</label>
                        <button type="submit" class="btn btn-default" name="btn_proses" id="btn_proses">Proses</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--<style>-->
    <div class="row"></div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Laporan Produksi Galvanis</h2>

                <div class="row">
                    <table class="tables table-hover" border="1" rules="all">
                        <thead>
                            <tr class="tengah">
                                <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">No.</th>
                                <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Tanggal</th>
                                <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Team</th>
                                <th style="font-size:10px;" rowspan="2" width="4%" class="tengah">Shif</th>
                                <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Jumlah Operator</th>
                                <th style="font-size:10px;" colspan="3" width="15%" class="tengah">Bahan Baku</th>
                                <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Diameter</th>
                                <th style="font-size:10px;" colspan="2" width="8%" class="tengah">Hasil Baik</th>
                                <th style="font-size:10px;" colspan="2" width="8%" class="tengah">Hasil SB</th>
                                <th style="font-size:10px;" colspan="2" width="8%" class="tengah">Total Hasil</th>
                                <th style="font-size:10px;" colspan="2" width="10%" class="tengah">Aval</th>
                                <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Total Pemakaian</th>
                                <th style="font-size:10px;" rowspan="2" width="5%" class="tengah">Sisa Sesudah</th>
                                <th style="font-size:10px;" rowspan="2" width="9%" class="tengah">Keterangan</th>
                            </tr>
                            <tr>
                                <!--<th style="font-size:10px;" width="5%" >Absensi</th>-->
                                <th style="font-size:10px;" width="5%" class="tengah">Awal</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Masuk</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Total</th>
                                <th style="font-size:10px;" width="3%" class="tengah">Roll</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                <th style="font-size:10px;" width="3%" class="tengah">Roll</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                <th style="font-size:10px;" width="3%" class="tengah">Roll</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Berat (Kg)</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Aval Baik</th>
                                <th style="font-size:10px;" width="5%" class="tengah">Aval Ruwet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $baku_awalx = 0;
                            $baku_akirx = 0;
                            $total_bahanx = 0;
                            $total_baik_rol = 0;
                            $total_baik_berat = 0;
                            $total_sb_rol = 0;
                            $total_sb_berat = 0;
                            $total_rolx = 0;
                            $total_beratx = 0;
                            $total_aval_baikx = 0;
                            $total_aval_ruwetx = 0;
                            $total_pemakaianx = 0;
                            $total_sisax = 0;
                            $tgl_aw = $_POST["txttgl_aw"];
                            $tgl_ak = $_POST["txttgl_ak"];
                            $r_tgl = mysqli_query($link, "SELECT * FROM galvanis where tanggal>='$tgl_aw' AND tanggal<='$tgl_ak' group by tanggal order by tanggal") or die(mysqli_error($link));
                            while ($r_tgl1 = mysqli_fetch_array($r_tgl)) {
                                $r_tanggal = $r_tgl1["tanggal"];

                                $result = mysqli_query($link, "SELECT * FROM galvanis where tanggal='$r_tanggal' order by tanggal, shif desc ") or die(mysqli_error($link));
                                //$baris=mysql_num_rows($result);
                                while ($row = mysqli_fetch_array($result)) {
                                    $baris = mysqli_num_rows($result);
                                    $tanggal = $row["tanggal"];
                                    $team = $row["team"];
                                    $shif = $row["shif"];
                                    $jml_opt = $row["jml_opt"];
                                    $baku_awal = $row["bahan_baku_aw"];
                                    $baku_akir = $row["bahan_baku_ak"];
                                    $total_bahan = $row["bahan_baku_tot"];
                                    $diameter = $row["diameter"];
                                    $baik_rol = $row["hasil_baik_roll"];
                                    $baik_berat = $row["hasil_baik_berat"];
                                    $sb_rol = $row["hasil_sb_roll"];
                                    $sb_berat = $row["hasil_sb_berat"];
                                    $total_rol = $row["total_rol"];
                                    $total_berat = $row["total_berat"];
                                    $aval_baik = $row["aval_baik"];
                                    $aval_ruwet = $row["aval_ruwet"];
                                    $total_pemakaian = $row["total_pemakaian"];
                                    $sisa_sesudah = $row["sisa_sesudah"];
                                    $keterangan = $row["ket"];
                                    //$total_berat = $row["total_berat"];
                            ?>
                                    <tr class="tengah">
                                        <td style="font-size:11px;"><?php echo $no; ?>.</td>
                                        <td style="font-size:11px;"><?php echo $tanggal; ?></td>
                                        <td style="font-size:11px;"><?php echo $team; ?></td>
                                        <td style="font-size:11px;"><?php echo $shif; //$gaji;
                                                                    ?></td>
                                        <td style="font-size:11px;"><?php echo $jml_opt; ?></td>
                                        <td style="font-size:11px;"><?php echo $baku_awal; ?></td>
                                        <td style="font-size:11px;"><?php echo $baku_akir; ?></td>
                                        <td style="font-size:11px;"><?php echo $total_bahan; ?></td>
                                        <td style="font-size:11px;"><?php echo $diameter; ?></td>
                                        <td style="font-size:11px;"><?php echo $baik_rol; ?></td>
                                        <td style="font-size:11px;"><?php echo $baik_berat; ?></td>
                                        <td style="font-size:11px;"><?php echo $sb_rol; ?></td>
                                        <td style="font-size:11px;"><?php echo $sb_berat; ?></td>
                                        <td style="font-size:11px;"><?php echo $total_rol; ?></td>
                                        <td style="font-size:11px;"><?php echo $total_berat; ?></td>
                                        <td style="font-size:11px;"><?php echo $aval_baik; ?></td>
                                        <td style="font-size:11px;"><?php echo $aval_ruwet; ?></td>
                                        <td style="font-size:11px;"><?php echo $total_pemakaian; ?></td>
                                        <td style="font-size:11px;"><?php echo $sisa_sesudah; ?></td>
                                        <td style="font-size:11px;"><?php echo $keterangan; ?></td>

                                    </tr>
                                <?php
                                    $no++;
                                    $baku_awalx = $baku_awalx + $baku_awal;
                                    $baku_akirx = $baku_akirx + $baku_akir;
                                    $total_bahanx = $total_bahanx + $total_bahan;
                                    $total_baik_rol = $total_baik_rol + $baik_rol;
                                    $total_baik_berat = $total_baik_berat + $baik_berat;
                                    $total_sb_rol = $total_sb_rol + $sb_rol;
                                    $total_sb_berat = $total_sb_berat + $sb_berat;
                                    $total_rolx = $total_rolx + $total_rol;
                                    $total_beratx = $total_beratx + $total_berat;
                                    $total_aval_baikx = $total_aval_baikx + $aval_baik;
                                    $total_aval_ruwetx = $total_aval_ruwetx + $aval_ruwet;
                                    $total_pemakaianx = $total_pemakaianx + $total_pemakaian;
                                    $total_sisax = $total_sisax + $sisa_sesudah;
                                }
                                ?>
                                <tr>
                                    <td style="font-size:12px;" colspan="5" class="tengah"><b><?php echo "Total " . $r_tanggal; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $baku_awalx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $baku_akirx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_bahanx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo "-"; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_baik_rol; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_baik_berat; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_sb_rol; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_sb_berat; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_rolx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_beratx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_aval_baikx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_aval_ruwetx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_pemakaianx; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo $total_sisax; ?></b></td>
                                    <td style="font-size:12px;" class="tengah"><b><?php echo "-"; ?></b></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                    <div class="row">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div><!-- /#page-wrapper -->
        </div>
    <?php } ?>