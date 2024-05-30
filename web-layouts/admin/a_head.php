<?php $url = "http://localhost/workman2/"; ?>
<?php

if (!isset($_COOKIE['username']) && !isset($_COOKIE['password'])) {
    // Redirect to admin-dashboard.php if the cookies exist
    header("Location: ../admin-login.php");
    exit; // Make sure to exit after setting the header to prevent further execution
}
?>
<?php $_SESSION['username'] = $_COOKIE['username']; ?>
<meta charset="utf-8">
<title>workman</title>

<!-- Stylesheets -->
<link href="<?php echo $url; ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $url; ?>css/style.css" rel="stylesheet">
<link href="<?php echo $url; ?>css/responsive.css" rel="stylesheet">

<link rel="shortcut icon" href="<?php echo $url; ?>images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo $url; ?>images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
