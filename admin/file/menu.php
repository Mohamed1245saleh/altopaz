<!-- Right side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image"> <img src="setting/pics/avatar.png" class="img-circle" alt="User Image"> </div>
        <div class="pull-right info">
          <p>اهلا بك</p>
          <span><i class="fa fa-circle text-success"></i>  <?php echo $name; ?> </span></div>
      </div>

      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="header">القائمة</li>
    		<li class="<?php if(basename($_SERVER['PHP_SELF'])=='home.php'){echo 'active';}else{ echo '';}?>"> <a href="home.php"> <i class="fa fa-home"></i> <span>الرئيسية</span> <span class="pull-right-container"> </span> </a> </li>
		<?php if(  $userview_u == 'on' ){ ?>
    <li class="<?php if(basename($_SERVER['PHP_SELF'])=='clients.php'){echo 'active';}else{ echo '';}?>"> <a href="clients.php"> <i class="fa fa-users"></i> <span>العملاء</span> <span class="pull-right-container"> </span> </a> </li>
  <?php }
    if(  $userview2_u == 'on' ){ ?>
   <li class="<?php if(basename($_SERVER['PHP_SELF'])=='users.php'){echo 'active';}else{ echo '';}?>"> <a href="users.php"> <i class="fa fa-user"></i> <span>المستخدمين</span> <span class="pull-right-container"> </span> </a> </li>
  <?php }
  if(  $userview3_u == 'on' ){ ?>
   <li class="<?php if(basename($_SERVER['PHP_SELF'])=='settings.php'){echo 'active';}else{ echo '';}?>"> <a href="settings.php"> <i class="fa fa-sticky-note-o"></i> <span>الاعدادت</span> <span class="pull-right-container"> </span> </a> </li>
<?php
  }
  if(  $userview4_u == 'on' ){
      ?>
      <li class="<?php if(basename($_SERVER['PHP_SELF'])=='groups.php'){echo 'active';}else{ echo '';}?>"><a href="groups.php"> <i class="fa fa-object-group"></i> <span>المجموعات</span> <span class="pull-right-container"> </span> </a> </li>
          <?php
  }
  ?>

          <li ><a href="logout.php"> <i class="fa fa-lock"></i> <span>خروج</span> <span class="pull-right-container"> </span> </a> </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
