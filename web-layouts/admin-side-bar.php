<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="nav-item"><a href="<?php echo $url; ?>admin/admin-dashboard.php"> <i class="la la-home"></i> Dashboard</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/user.php"><i class="la la-user-tie"></i> User</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/skills.php"><i class="fa fa-tasks"></i> Skills</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/job-type.php"><i class="fa fa-briefcase"></i> Job Type</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/experience.php"><i class="fa fa-history"></i> Career Level</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/qualification.php"><i class="fa fa-graduation-cap"></i> Qualification</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/categories.php"><i class="fa fa-list-alt"></i> Categories</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/specialisms.php"><i class='fas fa-medal fa-rotate-180'></i> Specialisms</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/industry.php"><i class="fa fa-industry"></i> Industry</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/provinces.php"><i class='fas fa-map-marker'></i></i> Provinces</a></li>
            <li class="nav-item"><a href="<?php echo $url; ?>admin/cities.php"><i class='fas fa-map'></i> Cities</a></li>
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
