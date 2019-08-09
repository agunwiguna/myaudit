<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Polsub | <?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- jQuery 3 -->
  <script src="<?=base_url()?>assets/back/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>SB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>POL</b>SUB</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <?php if ($this->session->userdata('level')=='Admin') { ?>


          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">
                <?php echo ($notif+$notif_capel+$notif_dokumen+$notif_kecukupan); ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                Identitas Prodi <span class="label label-danger"><?php echo ($notif); ?></span>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($limit_prodi as $d){?>
                  <li>
                    <a href="<?=base_url('prodi')?>">
                      <i class="fa fa-edit text-aqua"></i> <?=$d['prodi']?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="header">
                Capaian Pembelajaran <span class="label label-danger"><?php echo ($notif_capel); ?></span>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($limit_capel as $d){?>
                  <li>
                    <a href="<?=base_url('capaian')?>">
                      <i class="fa fa-edit text-aqua"></i> <?=$d['nama']?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
               <li class="header">
                Dokumen <span class="label label-danger"><?php echo ($notif_dokumen); ?></span>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($limit_dokumen as $d){?>
                  <li>
                    <a href="<?=base_url('dokumen')?>">
                      <i class="fa fa-file text-aqua"></i> <?=$d['ket']?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="header">
                Assesmen Kecukupan <span class="label label-danger"><?php echo ($notif_kecukupan); ?></span>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($limit_kecukupan as $d){?>
                  <li>
                    <a href="<?=base_url('kecukupan')?>">
                      <i class="fa fa-folder text-aqua"></i> <?=$d['nama_ins']?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="#">Lihat Semua</a></li>
            </ul>
          </li>
            


          <?php } else if($this->session->userdata('level')=='Auditee' || $this->session->userdata('level')=='Auditor') { ?>


           <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">
                <?php echo ($notif_jadwal); ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                Jadwal <span class="label label-danger"><?php echo ($notif_jadwal); ?></span>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($limit_jadwal as $d){?>
                    <li>
                      <a href="<?=base_url('jadwal/view/').$d['id_jadwal']?>">
                        <i class="fa fa-calendar text-aqua"></i> <?=$d['jenis']?>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="<?=base_url('jadwal')?>">Lihat Semua</a></li>
            </ul>
          </li>
            


          <?php }?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama');?>
                  <small>Status : <?php echo $this->session->userdata('level');?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <?php if ($this->session->userdata('level')=='Admin') { ?>

          <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?=isset($active_menu_master)?$active_menu_master:'' ?>">
          <a href="#">
            <i class="fa fa-th"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_auditor)?$active_menu_auditor:'' ?>">
              <a href="<?=base_url('auditor')?>"><i class="fa fa-circle-o"></i>Data Auditor</a>
            </li>
            <li class="<?=isset($active_menu_auditee)?$active_menu_auditee:'' ?>">
              <a href="<?=base_url('auditee')?>"><i class="fa fa-circle-o"></i> Data Auditee</a>
            </li>
          </ul>
        </li>
        <li class="<?=isset($active_menu_jadwal)?$active_menu_jadwal:'' ?>">
          <a href="<?=base_url('jadwal')?>">
            <i class="fa fa-calendar"></i><span>Jadawal AMI</span>
          </a>
        </li>
        <li class="treeview <?=isset($active_menu_ins)?$active_menu_ins:'' ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Instrumen Audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_prodi)?$active_menu_prodi:'' ?>">
              <a href="<?=base_url('prodi')?>">
                <i class="fa fa-circle-o"></i>Identitas Prodi
              </a>
            </li>
            <li class="<?=isset($active_menu_cp)?$active_menu_cp:'' ?>">
              <a href="<?=base_url('capaian')?>"><i class="fa fa-circle-o"></i>Capaian Pembelajaran</a>
            </li>
          </ul>
        </li>
         <li class="<?=isset($active_menu_dok)?$active_menu_dok:'' ?>">
          <a href="<?=base_url('dokumen')?>">
            <i class="fa fa-file"></i><span>Dokumen</span>
          </a>
        </li>
        <li class="treeview <?=isset($active_menu_as)?$active_menu_as:'' ?>">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Assesmen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_kc)?$active_menu_kc:'' ?>">
              <a href="<?=base_url('kecukupan')?>"><i class="fa fa-circle-o"></i>Assesmen Kecukupan</a>
            </li>
            <li class="<?=isset($active_menu_lp)?$active_menu_lp:'' ?>">
              <a href="<?=base_url('lapangan')?>"><i class="fa fa-circle-o"></i>Assesmen Lapangan</a>
            </li>
          </ul>
        </li>
         <li>
          <a href="">
            <i class="fa fa-file-text-o"></i><span>Laporan AMI</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_set)?$active_menu_set:'' ?>">
          <a href="<?=base_url('pengaturan')?>">
            <i class="fa fa-cog"></i><span>Pengaturan</span>
          </a>
        </li>
      </ul>

      <?php } else if($this->session->userdata('level')=='Auditee') { ?>

         <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_jadwal)?$active_menu_jadwal:'' ?>">
          <a href="<?=base_url('jadwal')?>">
            <i class="fa fa-calendar"></i><span>Jadawal Audit</span>
          </a>
        </li>
        <li class="treeview <?=isset($active_menu_ins)?$active_menu_ins:'' ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Instrumen Audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_prodi)?$active_menu_prodi:'' ?>">
              <a href="<?=base_url('prodi')?>">
                <i class="fa fa-circle-o"></i>Identitas Prodi
              </a>
            </li>
            <li class="<?=isset($active_menu_cp)?$active_menu_cp:'' ?>">
              <a href="<?=base_url('capaian')?>"><i class="fa fa-circle-o"></i>Capaian Pembelajaran</a>
            </li>
          </ul>
        </li>
         <li class="<?=isset($active_menu_dok)?$active_menu_dok:'' ?>">
          <a href="<?=base_url('dokumen')?>">
            <i class="fa fa-file"></i><span>Dokumen</span>
          </a>
        </li>
        <li class="treeview <?=isset($active_menu_as)?$active_menu_as:'' ?>">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Assesmen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_kc)?$active_menu_kc:'' ?>">
              <a href="<?=base_url('kecukupan')?>"><i class="fa fa-circle-o"></i>Assesmen Kecukupan</a>
            </li>
            <li class="<?=isset($active_menu_lp)?$active_menu_lp:'' ?>">
              <a href="<?=base_url('lapangan')?>"><i class="fa fa-circle-o"></i>Assesmen Lapangan</a>
            </li>
          </ul>
        </li>
         <li>
          <a href="">
            <i class="fa fa-file-text-o"></i><span>Laporan AMI</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_set)?$active_menu_set:'' ?>">
          <a href="<?=base_url('pengaturan')?>">
            <i class="fa fa-cog"></i><span>Pengaturan</span>
          </a>
        </li>
      </ul>

      <?php }else{ ?>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_jadwal)?$active_menu_jadwal:'' ?>">
          <a href="<?=base_url('jadwal')?>">
            <i class="fa fa-calendar"></i><span>Jadawal Audit</span>
          </a>
        </li>
        <li class="treeview <?=isset($active_menu_ins)?$active_menu_ins:'' ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Instrumen Audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_prodi)?$active_menu_prodi:'' ?>">
              <a href="<?=base_url('prodi')?>">
                <i class="fa fa-circle-o"></i>Identitas Prodi
              </a>
            </li>
            <li class="<?=isset($active_menu_cp)?$active_menu_cp:'' ?>">
              <a href="<?=base_url('capaian')?>"><i class="fa fa-circle-o"></i>Capaian Pembelajaran</a>
            </li>
          </ul>
        </li>
         <li class="<?=isset($active_menu_dok)?$active_menu_dok:'' ?>">
          <a href="<?=base_url('dokumen')?>">
            <i class="fa fa-file"></i><span>Dokumen</span>
          </a>
        </li>
          <li class="treeview <?=isset($active_menu_as)?$active_menu_as:'' ?>">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Assesmen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_kc)?$active_menu_kc:'' ?>">
              <a href="<?=base_url('kecukupan')?>"><i class="fa fa-circle-o"></i>Assesmen Kecukupan</a>
            </li>
            <li class="<?=isset($active_menu_lp)?$active_menu_lp:'' ?>">
              <a href="<?=base_url('lapangan')?>"><i class="fa fa-circle-o"></i>Assesmen Lapangan</a>
            </li>
          </ul>
        </li>
         <li>
          <a href="">
            <i class="fa fa-file-text-o"></i><span>Laporan AMI</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_set)?$active_menu_set:'' ?>">
          <a href="<?=base_url('pengaturan')?>">
            <i class="fa fa-cog"></i><span>Pengaturan</span>
          </a>
        </li>
      </ul>

      <?php } ?>  
    </section>
    <!-- /.sidebar -->
  </aside>


  