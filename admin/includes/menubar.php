<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
   
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">RELATÓRIOS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>PAINEL</span></a></li>
      <li class=""><a href="votes.php"><span class="glyphicon glyphicon-lock"></span> <span>VOTOS</span></a></li>
      <li class="header">GERIR</li>
      <li class=""><a href="voters.php"><i class="fa fa-users"></i> <span>ELEITORES</span></a></li>
      <li class=""><a href="positions.php"><i class="fa fa-tasks"></i> <span>PARTIDOS</span></a></li>
      <li class=""><a href="candidates.php"><i class="fa fa-black-tie"></i> <span>CANDIDATOS</span></a></li>
      <li class="header">DEFINIÇÕES</li>
      <!--<li class=""><a href="ballot.php"><i class="fa fa-file-text"></i> <span>PARTIDOS</span></a></li>-->
      <li class=""><a href="#config" data-toggle="modal"><i class="fa fa-cog"></i> <span>TÍTULO DA ELEIÇÃO</span></a></li>
    </ul>
  </section>
  
</aside>
<?php include 'config_modal.php'; ?>