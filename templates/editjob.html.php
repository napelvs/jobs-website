<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
	<section class="right">

    <h2>Edit Job</h2>

        <form action="editjob.php" method="POST">

            <input type="hidden" name="id" value="<?=$job['id']?>" />
            <label>Title</label>
            <input type="text" name="title" value="<?=$job['title']?>" />

            <label>Description</label>
            <textarea name="description"><?=$job['description']?></textarea>

            <label>Location</label>
            <input type="text" name="location" value="<?=$job['location']?>" />


            <label>Salary</label>
            <input type="text" name="salary" value="<?=$job['salary']?>" />

            <label>Category</label>

            <select name="categoryId">
                <?php 
                    foreach ($rows as $row) { 
                    if ($job['categoryId'] == $row['id']) {?> 
                        <option selected="selected" value="<?=$row['id']?>"> <?=$row['name']?> </option>
                    <?php } 
                    else { ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                    <?php }
                } ?>

			</select>

            <label>Closing Date</label>
            <input type="date" name="closingDate" value="<?=$job['closingDate']?>"  />

            <input type="submit" name="submit" value="Save" />

		</form>
    </section>
</main>