<section class="left">
    <ul> 
        <?php   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
                    <li><a href="jobs.php">Jobs</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="archivedjobs.php">Archived Jobs</a></li>
                    <li><a href="enquiry.php">Enquiries</a></li>
        <?php   } 
                if(isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {?>
                    <li><a href="jobs.php">Jobs</a></li>
                    <li><a href="archivedjobs.php">Archived Jobs</a></li>
        <?php   } ?> 
    </ul>
</section>