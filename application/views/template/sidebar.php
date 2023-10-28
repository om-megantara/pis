<div id="sidebar" class="sidebar responsive">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>

            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="<?= base_url('home/'); ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <!--<i class="menu-icon fa fa-upload"></i>-->
                <i class="menu-icon glyphicon glyphicon-plus"></i>
                <span class="menu-text"> Gudang</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <!--<b class="arrow"></b>-->
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('gudang/tampil-zn'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Timah Putih (Zn)
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('gudang/tampil-pb'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Timah Hitam (Pb)
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('gudang/tampil-kp'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Input Kawat Paku
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
            <!--<ul class="submenu">
								<li class="">
									<a href="?p=mutasi-gdg">
										<i class="fa fa-minus-square-o"></i>
										Kawat KP->Buffer produksi
									</a>
									<b class="arrow"></b>
								</li>
								
							</ul>-->
            <ul class="submenu">
                <!--<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer KP Coil->produksi
									</a>
									<b class="arrow"></b>
								</li>-->
                <li class="">
                    <!--<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer Drawing->produksi
									</a>
									<b class="arrow"></b>-->
                </li>
                <!--<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer PA1->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer PA2->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer PB->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer WDPC->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer Oven Gas->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer Oven Galvanis->produksi
									</a>
									<b class="arrow"></b>
								</li>-->

            </ul>
            <!--<ul class="submenu">
								<li class="">
									<a href="?p=report-kp">
										<i class="fa fa-minus-square-o"></i>
										Rekap Kawat KP
									</a>
									<b class="arrow"></b>
								</li>
								
							</ul>-->
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <!--<i class="menu-icon fa fa-upload"></i>-->
                <i class="menu-icon glyphicon glyphicon-plus"></i>
                <span class="menu-text"> Mutasi Gudang KP</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('mutasi/kp'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Kawat KP->Buffer produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <!--<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer KP Coil->produksi
									</a>
									<b class="arrow"></b>
								</li>-->
                <li class="">
                    <a href="<?= base_url('mutasi/drawing'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer Drawing->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/kpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer KPC->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/pa1'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer PA1->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/pa2'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer PA2->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/pb'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer PB->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/oven-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer Oven Galvanis->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/oven-gas'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer Oven Gas->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('mutasi/wdpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Buffer WDPC->produksi
                    </a>
                    <b class="arrow"></b>
                </li>
                <!--<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer WDPC->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer Oven Gas->produksi
									</a>
									<b class="arrow"></b>
								</li>
								<li class="">
									<a href="?p=mutasi-prod">
										<i class="fa fa-minus-square-o"></i>
										Buffer Oven Galvanis->produksi
									</a>
									<b class="arrow"></b>
								</li>-->
            </ul>

        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <!--<i class="menu-icon fa fa-upload"></i>-->
                <i class="menu-icon glyphicon glyphicon-plus"></i>
                <span class="menu-text"> Input Hasil Produksi</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <!--<a href="?p=drawing-tampil">-->
                    <a href="<?= base_url('produksi/input-drawing'); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil Drawing
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?= base_url('produksi/tampil-galvanis'); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?= base_url('produksi/tampil-wdpc'); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil WD PC
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?= base_url('produksi/tampil-wdpl'); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil WD PL
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?= base_url('produksi/tampil-kd'); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/tampil-bendrat'); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil Bendrat
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <!--<i class="menu-icon fa fa-upload"></i>-->
                <i class="menu-icon glyphicon glyphicon-plus"></i>
                <span class="menu-text"> Input Hasil QC</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('qc/hasil-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil QC Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('qc/laporan-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Laporan QC Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('qc/hasil-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil QC WDPL
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('qc/laporan-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Laporan QC WDPL
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('qc/hasil-kd'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil QC KD
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('qc/laporan-kd'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Laporan QC KD
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa  fa-folder-open-o"></i>
                <span class="menu-text"> Hasil Produksi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('produksi/hasil-drawing'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil Drawing
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/hasil-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/hasil-wdpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil WD PC
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/hasil-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Hasil WD PL
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/hasil-kd'); ?>">
                        <!--<a href="?p=uc">-->
                        <i class="fa fa-minus-square-o"></i>
                        Hasil Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa  fa-folder-open-o"></i>
                <span class="menu-text"> Pemakaian B.Bantu </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('bahan-bantu/drawing'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Bahan Bantu Drawing
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('bahan-bantu/galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Bahan Bantu Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('bahan-bantu/wdpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Bahan Bantu WD PC
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('bahan-bantu/wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Bahan Bantu WD PL
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-time"></i>
                <span class="menu-text"> Downtime Mesin </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('downtime/mesin-drawing'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Downtime Drawing
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('downtime/mesin-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Downtime Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                <span class="menu-text"> Rekap Hasil Produksi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <!--<li class="">
								<a href="?p=uc">
									<i class="fa fa-minus-square-o"></i>
									Rekap Hasil Drawing
								</a>
								<b class="arrow"></b>
							</li>-->
                <li class="">
                    <a href="<?= base_url('produksi/rekap-hasil-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Hasil Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/rekap-hasil-wdpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Hasil WD PC
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/rekap-hasil-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Hasil WD PL
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('produksi/rekap-hasil-kd'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Hasil Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                <span class="menu-text"> Rek. Bahan Bantu </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <!--<li class="">
								<a href="?p=uc">
									<i class="fa fa-minus-square-o"></i>
									Rek. Bhn. Bantu Drawing
								</a>
								<b class="arrow"></b>
							</li>-->
                <li class="">
                    <a href="<?= base_url('bahan-bantu/rekap-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rek. Bhn. Bantu Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('bahan-bantu/rekap-wdpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Bhn. Bantu WDPC
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('bahan-bantu/rekap-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Bhn. Bantu WDPL
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('bahan-bantu/rekap-kd'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Hasil Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                <span class="menu-text"> Rek. Downtime Mesin </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('downtime/rekap-drawing'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Downtime Drawing
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('downtime/rekap-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Downtime Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                <span class="menu-text"> Rekap Sesuai WO </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('work-order/rekap-wo-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap Hasil Galvanis (WO)
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                <span class="menu-text"> R. Gudang K. Paku </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

                <li class="">
                    <a href="<?= base_url('gudang/report-stok-kp'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Report Stok Gudang Kawat Paku
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
            <b class="arrow"></b>
            <ul class="submenu">

                <li class="">
                    <a href="<?= base_url('gudang/cetak-stok-kp'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Cetak Stok Gudang Kawat Paku
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
            <b class="arrow"></b>
            <!--<ul class="submenu">
							
							<li class="">
								<a href="?p=cetak-mts-gdg-kmbli">
									<i class="fa fa-minus-square-o"></i>
									Cetak Laporan Serah Terima
								</a>
								<b class="arrow"></b>
							</li>
							
						</ul>-->
            <ul class="submenu">

                <li class="">
                    <a href="<?= base_url('gudang/cetak-permintaan-brg'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Cetak Permintaan Barang
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
            <ul class="submenu">

                <li class="">
                    <a href="<?= base_url('gudang/cetak-pengembalian-brg'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Cetak Pengembalian Barang
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                <span class="menu-text"> Rekap NG Produksi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

                <li class="">
                    <a href="<?= base_url('notgood/rekap-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap NG Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('notgood/rekap-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap NG WDPL
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?= base_url('notgood/rekap-kp'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Rekap NG Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bar-chart"></i>
                <span class="menu-text"> Grafik/Chart</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <!--<li class="">
								<a href="?p=uc">
									<i class="fa fa-minus-square-o"></i>
									Laporan Harian Drawing
								</a>
								<b class="arrow"></b>
							</li>-->
                <li class="">
                    <a href="<?= base_url('chart/galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('chart/kawat-duri'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('chart/wdpc'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        WD PC
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('chart/wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        WD PL
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-print"></i>
                <span class="menu-text"> Cetak Laporan </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?= base_url('cetak/laporan-drawing'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Laporan Harian Drawing
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('cetak/terima-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Serah Terima Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('cetak/laporan-kd'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Laporan Harian Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('cetak/laporan-bendrat'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Laporan Harian Bendrat
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('cetak/terima-qc-galvanis'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Serah Terima QC Galvanis
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('cetak/terima-qc-wdpl'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Serah Terima QC WDPL
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('cetak/terima-qc-kd'); ?>">
                        <i class="fa fa-minus-square-o"></i>
                        Serah Terima QC Kawat Duri
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
<div class="main-content">
    <div class="main-content-inner">