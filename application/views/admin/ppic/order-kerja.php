<!-- Page Heading -->
<?php
include "application/config/database.php";
?>
                <div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="dash.php?hp=home">Home</a>
							</li>
							<li class="active">PPIC</li>
							<li class="active">Order Kerja</li>
						</ul><!-- /.breadcrumb -->
						</div>
						
						<div class="page-content">
						<!-- #section:settings.box -->
						<?php //include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Order Kerja
							</h1>
						</div><!-- /.page-header -->
<div class="page-content">
    <div id="page-wrapper">
			<div class="container-fluid">

                <div class="row">
					<form role="form" id="frm_galv" name="frm_galv">
					<!-- ----------------------------------------------------Header------------------------------------------ -->
					<!--<div class="row">
						<div class="col-lg-8">
							<!--<h1>Order Kerja</h1>-->
							<div class="row"></div>
							<h4><a href="input-orker"><i class="fa fa-pencil"></i> Masukkan Data Baru</button></a></h4>
						</div>
					<!--</div>
					<!--<h2>&nbsp;</h2>-->

					<div class="row"></div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%"><center>No.</center></th>
                                        <th width="20%"><center>Nomor Order</center></th>
                                        <th width="10%"><center>Tanggal</center></th>
										<th width="25%"><center>Nama Customer</center></th>
                                        <th width="5%"><center>Diameter</center></th>
										<th width="5%"><center>BWG</center></th>
										<th width="15%"><center>Jumlah (Kg)</center></th>
										<th width="15%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$no=1;
									$totnet_gaji=0;
									$result=mysqli_query($link,"SELECT * FROM ppic_orker where status='1' order by tanggal Desc") or die(mysqli_error($link));
									//$baris=mysql_num_rows($result);
									while($row = mysqli_fetch_array($result))
									{
										//$baris=mysql_num_rows($result);
										$kd = $row["kd_orker"];
										$noker = $row["no_orker"];
										$tanggal = $row["tanggal"];
										$namac=$row["nama_customer"];
										$diameter= $row["diameter"];
										$bwg= $row["bwg"];
										$jml= $row["jumlah"];
										
										if ($no % 2) {
											$wrn="active";
										} else {
											$wrn="success";
										}
									?>
									<tr class="<?php echo $wrn;?>">
										<td><center><?php echo $no;$kd;?></center></td>
										<td><center><?php echo $noker;?></center></td>
                                        <td><center><?php echo $tanggal;?></center></td>
                                        <td><center><?php echo $namac;?></center></td>
										<td><center><?php echo $diameter;?></center></td>
                                        <td><center><?php echo $bwg;?></center></td>
										<td><center><?php echo $jml;?></center></td>
										<td><center><a href="?p=update-orker&kd=<?php echo $kd;?>"><i class="fa fa-edit">&nbsp;</i>Edit</a> || 
										<a href="?p=tutup-orker&kd=<?php echo $kd;?>"><i class="fa fa-close">&nbsp;</i>Tutup</a></center></td>
									</tr>
                                    <?php 
									$no++;
									} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </form>    
            
		</div>
        <!-- /#page-wrapper -->
    </div>
</div>
	
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script>
function pengawas(){
  var timx=document.getElementById("frm_galv").tim.value;
  if (timx=="A")
    {
        document.getElementById("nama_pengawas").value = 'Andik'; 
    }
  else if (timx=="B")
    {
       document.getElementById("nama_pengawas").value = 'Komari';
    }
	else
    {
       document.getElementById("nama_pengawas").value = 'Sari';
      
    }
}
function total_bahan(){
  var bahan_bawl=document.getElementById("frm_galv").bahan_baw.value;
  var bahan_bakh=document.getElementById("frm_galv").bahan_bak.value;
  
        document.getElementById("tot_bahanb").value = Number(bahan_bawl)+Number(bahan_bakh); 
    
}
</script>
	