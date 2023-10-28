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

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`,`icon`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <ul class="nav nav-list">
        <li class="active">
            <a href="<?= base_url('admin'); ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>

            <!-- SUB MENU MATCHES -->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * FROM `user_sub_menu`WHERE`menu_id` = $menuId AND `is_active` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <li class="">
                <a href="#" class="dropdown-toggle">

                    <i class="<?= 'menu-icon fa fa-' . $m['icon']; ?>"></i>
                    <span class="menu-text"> <?= $m['menu']; ?></span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <?php foreach ($subMenu as $sm) : ?>
                    <ul class="submenu">
                        <li class="">
                            <a href="<?= base_url($sm['url']); ?>">
                                <i class="fa fa-minus-square-o"></i>
                                <?= $sm['title']; ?>
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </li>
        <?php endforeach; ?>
    </ul>






    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
<div class="main-content">
    <div class="main-content-inner">