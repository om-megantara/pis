<!-- <script type="text/javascript">
    try {
        ace.settings.check('navbar', 'fixed')
    } catch (e) {}
</script> -->



<div id="navbar" class="navbar navbar-default">

    <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-tasks"></i>
                    <strong>Admin Page</strong>
                </small>
            </a>
        </div>



        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">

                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?= base_url('assets/'); ?>img/logo_nesiyo.png" alt="Logo" />

                        <span class="user-info" style="font-weight:bold; line-height:250%;">
                            <small><?php echo "User " . ucfirst($user['name']); ?></small>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>

                            <a href="<?= base_url('admin/ganti-password/'); ?>">
                                <i class="ace-icon fa fa-cog"></i>
                                Ganti Password
                            </a>

                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url('auth/logout'); ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>