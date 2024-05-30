<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="nav-item"><a href="<?php echo $url; ?>job-provider-dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>dashboard-company-profile.php"><i class="la la-user-tie"></i> Company Profile</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>dashboard-post-job.php"><i class="la la-paper-plane"></i> Post a New Job</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>dashboard-manage-job.php"><i class="la la-briefcase"></i> Manage Jobs</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>dashboard-applicants.php"><i class="la la-file-invoice"></i> All Applicants</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>dashboard-change-password.php"><i class="la la-lock"></i> Change Password</a></li>
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
