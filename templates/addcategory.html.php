<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
    <section class="right">
    <h2>Add Category</h2>
        <form action="addcategory.php" method="POST">
            <label>Name</label>
            <input type="text" name="name" />
            <input type="submit" name="submit" value="Add Category" />
        </form>
    </section>    
</main>