  <?php $url="http://localhost/workman2/"?>
  <?php 
        session_start(); 
        if (!$_SESSION['js_id']) {
            ?>
                <script>
                    location.href="<?php echo $url ?>index.php";
                </script>
            <?php
        }
    ?>
  <meta charset="utf-8">
  <title>workman</title>

  <!-- Stylesheets -->
  <link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $url;?>css/style.css" rel="stylesheet">
  <link href="<?php echo $url;?>css/responsive.css" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo $url;?>images/favicon.png" type="image/x-icon">
  <link rel="icon" href="<?php echo $url;?>images/favicon.png" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->