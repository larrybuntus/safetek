<header>
  <ul id="slide-out" class="side-nav fixed">
    <div class="card blue darken-3 side-nav-card" style="margin-top: 0px;">
        <li><a href="#" class="waves-effect user-email white-text">Howdy, <?= $_SESSION['admin_name'] ?></a></li>
    </div>
    <li><a class="waves-effect link" data-display="Dashboard" href="<?php echo __url__.'/admin/dashboard'; ?>"><i class="material-icons">dashboard</i> Dashboard</a></li>
    <li><a class="waves-effect link" data-display="Groups" href="<?php echo __url__.'/admin/groups' ?>"><i class="material-icons">people</i> Groups</a></li>
    <li><a class="waves-effect link" data-display="Students" href="<?php echo __url__.'/admin/students' ?>"><i class="material-icons">people</i> Students</a></li>
    <li><a class="waves-effect link" data-display="Hostels" href="<?php echo __url__.'/admin/hostels' ?>"><i class="material-icons">home</i> Hostels</a></li>
    <li><a class="waves-effect link" data-display="Meetpoints" href="<?php echo __url__.'/admin/meetpoints' ?>"><i class="material-icons">place</i> Meetpoints</a></li>
    <li><a class="waves-effect link" data-display="Admins" href="<?php echo __url__.'/admin/admins' ?>"><i class="material-icons">view_column</i> Admins</a></li>

    <li><div class="divider"></div></li>

    <li><a class="waves-effect link" data-display="Settings" href="<?php echo __url__.'/admin/settings' ?>"><i class="material-icons">settings</i> Settings</a></li>

  </ul>
  <nav class="top-nav">
    <div class="nav-wrapper blue darken-3">
      <a href="<?php echo __url__.'/home/' ?>" class="brand-logo center main">Home</a>

      <ul class="right">
        <li><a href="#!" class="dropdown-button" data-activates="top"><i class="fa fa-ellipsis-v fa-fx"></i></a>
          <ul id="top" class="dropdown-content">
            <li><a href="">Hello</a></li>
          </ul>


        </li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

       <!-- Dropdown Trigger -->
    </div>
  </nav>
</header>
