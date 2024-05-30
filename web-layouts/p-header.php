<header class="main-header header-shaddow">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
              <div class="logo"><a href="index.php"><img src="images/logo.svg" alt="" title=""></a></div>
            </div>

            <nav class="nav main-menu">
              <ul class="navigation" id="navbar">
                <li>
                  <span><a href="index.php">Home</a></span>
                </li>
                <li>
                  <span><a href="#">Contact us</a></span>
                </li>
                <li>
                  <span><a href="#">About us</a></span>
                </li>
              </ul>
            </nav>
            <!-- Main Menu End-->
          </div>

          <div class="outer-box">

            <!--<button class="menu-btn">
              <span class="count">1</span>
              <span class="icon la la-heart-o"></span>
            </button>

            <button class="menu-btn">
              <span class="icon la la-bell"></span>
            </button>-->

            <!-- Dashboard Option -->
            <div class="dropdown dashboard-option">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo $url; ?>function/company/uploads/logo/<?php echo $_SESSION["logo"]; ?>" style="object-fit: cover;" alt="avatar" class="thumb">
                <span class="name">My Account</span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $url;?>dashboard-view-profile.php"><i class="la la-user-alt"></i>View Profile</a></li>
                <li><a href="<?php echo $url;?>logout.php"><i class="la la-sign-out"></i>Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="<?php echo $url;?>index.php"><img src="<?php echo $url;?>images/logo.svg" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
              <a href="<?php echo $url;?>login-popup.php" class="call-modal"><span class="icon-user"></span></a>
            </div>

            <button id="toggle-user-sidebar"><img src="<?php echo $url;?>images/resource/company-6.png" alt="avatar" class="thumb"></button>
            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
          </div>
        </div>

      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>