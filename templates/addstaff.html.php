<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
    <section class="right">
        <h2>Add Staff</h2>
        <form action="addstaff.php" method="POST">
            <label>First Name</label>
            <input type="text" name="first_name" />
            <label>Last Name</label>
            <input type="text" name="last_name" />
            <label>Username</label>
            <input type="text" name="username" />
            <label>Password</label>
            <input type="password" name="password" />
            <input type="submit" name="submit" value="Add Staff" />
        </form>
    </section>    
</main>