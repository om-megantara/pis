<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>

    <div class="signinpanel">

        <div class="row">

            <div class="col-md-7">
                <center>
                    <div class="signin-info">
                        <div class="logopanel">
                            <h1><span>[</span> PT. New Simo Mulijo (NESIYO) <span>]</span></h1>
                        </div><!-- logopanel -->

                        <h5><strong>PRESTRESSED CONCRETE WIRE & IRON WIRE INDUSTRY</strong></h5>
                        <img src="<?= base_url('assets/'); ?>img/logo_nesiyo.png" width="30%"></img>
                        <ul>
                            <!--<li><i class="fa fa-arrow-circle-o-right mr5"></i> Jln. Raya Sukomanunggal Jaya</li>-->
                            <li> Jln. Simokalangan 95-K, Surabaya</li>
                            <li> Jawa Timur</li>
                            <li> Telp. :&nbsp; (031) 7493000, 7495000</li>
                            <li> Website: &nbsp;<a href="http://nesiyo.com/" target="_blank">http://www.nesiyo.com </a></li>


                        </ul>
                    </div><!-- signin0-info -->
                </center>
            </div><!-- col-sm-7 -->

            <div class="col-md-5">

                <form class="user" method="post" action="<?= base_url('auth/index'); ?>">
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access your account.</p>

                    <input autocomplete="off" type="text" name="username" class="form-control uname" placeholder="Username" required />
                    <input autocomplete="off" type="password" name="password" class="form-control pword" placeholder="Password" required />
                    <a href="#"><small>Keep Your Information!</small></a>
                    <button class="btn btn-success btn-block">Sign In</button>

                </form>
            </div><!-- col-sm-5 -->

        </div><!-- row -->

        <div class="signup-footer">
            <div class="pull-left">
                <?php

                include "application/config/database.php";

                // $link = mysqli_connect("localhost:3307", "root", "", "produksi");
                $versinya = mysqli_fetch_array(mysqli_query($link, "SELECT versi_skg FROM versi")) or die(mysqli_error($link));
                //$ver=mysqli_fetch_array($versinya);
                $versi = $versinya['versi_skg'];
                $thn = date('Y');
                //$thn=2018;
                if ($thn > 2018) {
                    echo "<center>Versi " . $versi . " &copy; 2018-$thn. All Rights Reserved. PT. New Simo Mulijo (NESIYO)</center>";
                } else {
                    echo "<center>Versi " . $versi . " &copy; 2018. All Rights Reserved. PT. New Simo Mulijo (NESIYO)</center>";
                } ?>

            </div>


        </div>

    </div><!-- signin -->

</section>