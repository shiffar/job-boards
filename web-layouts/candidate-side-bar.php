<div class="user-sidebar">

      <div class="sidebar-inner">
        <ul class="navigation">
          <li class="nav-item"><a href="candidate-dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
          <li class="nav-item"><a href="<?php echo $url; ?>candidate-dashboard-profile.php"><i class="la la-user-tie"></i>My Profile</a></li>
          <li class="nav-item"><a href="<?php echo $url; ?>candidate-dashboard-resume.php"><i class="la la-file-invoice"></i>My Resume</a></li>
          <li class="nav-item"><a href="<?php echo $url; ?>candidate-dashboard-applied-job.php"><i class="la la-briefcase"></i> Applied Jobs </a></li>
          <!--<li class="nav-item"><a href="<?php echo $url; ?>candidate-dashboard-job-alerts.php"><i class="la la-bell"></i>Job Alerts</a></li>
          <li class="nav-item"><a href="<?php echo $url; ?>dashboard-messages.php"><i class="la la-comment-o"></i>Messages</a></li>-->
          <li class="nav-item"><a href="<?php echo $url; ?>candidate-change-password.php"><i class="la la-lock"></i>Change Password</a></li>
        </ul>

        
      </div>
    </div>

    <script>
    // Get the current URL
    var currentUrl = window.location.href;

    // Get all navigation links
    var navLinks = document.querySelectorAll('.nav-item');

    // Loop through the links and check if their href matches the current URL
    for (var i = 0; i < navLinks.length; i++) {
        var link = navLinks[i].querySelector('a');
        if (link.href === currentUrl) {
            navLinks[i].classList.add('active');
        }
    }
</script>