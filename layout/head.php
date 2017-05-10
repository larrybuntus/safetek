<!DOCTYPE html>
  <html>
    <head>
      <title></title>
      <!--Import Google Icon Font-->
      <link href="<?php echo __assets__.'/components/material-icons/material-icons.css' ?>" rel="stylesheet">

      <!-- Import Google fonts-->
      <!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> -->

      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo __assets__.'/components/materialize.min.css' ?>"  media="screen,projection"/>


      <link rel="stylesheet" href="<?php echo __assets__.'/sass_components/stylesheets/styles.min.css' ?>">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <meta name="theme-color" content="#3c3c43">
       <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo __assets__.'/js/jquery-3.2.0.min.js' ?>"></script>
      <script type="text/javascript" src="<?php echo __assets__.'/js/materialize.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php echo __assets__.'/js/index.js'; ?>"></script>
      <script>
        $(document).ready(function(){
          // Initialize collapse button
        $(".button-collapse").sideNav();
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        $('.collapsible').collapsible();
        // dropdown
        $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrainWidth: true, // Does not change width of dropdown to that of the activator
          gutter: 0, // Spacing from edge
          belowOrigin: true, // Displays dropdown below the button
          alignment: 'right', // Displays dropdown with edge aligned to the left of button
          stopPropagation: false // Stops event propagation
        });
        $(".dropdown-right").dropdown({
          inDuration: 300,
          outDuration: 255,
          constrainWidth: false,
          belowOrigin: true,
          alignment: 'left'
        });
        // modal
        $('.modal').modal();

      });
      </script>
    </head>
    <body>
    <?php if (!isset($_SESSION['admin_id'])){ ?>      
    <div class="logout">
      <a href="<?= __url__.'/login' ?>"><i class="material-icons white-text">exit_to_app</i></a>
    </div>
    <?php }else{ ?>
    <div class="logout">
      <a href="" class="spec-ajax" data-dest="<?= __url__.'/actions/admin/logs.actions.php' ?>" data-query="logout" data-output=".modal-content"><i class="material-icons white-text">exit_to_app</i></a>
    </div>
    <?php } ?>
     