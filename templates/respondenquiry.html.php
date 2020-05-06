<main class="sidebar">
<?php require 'leftadminnav.html.php' ?>
	<section class="right">
    <h2>Respond to <?=$enquiry['first_name'] . ' ' . $enquiry['last_name']?></h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?=$enquiry['id']?>" />
            <p><b>ID: </b><?=$enquiry['id']?></p>
            <p><b>First Name: </b><?=$enquiry['first_name']?></p>
            <p><b>Last Name: </b><?=$enquiry['last_name']?></p>
            <p><b>Email Address: </b><?=$enquiry['email_address']?></p>
            <p><b>Telephone: </b><?=$enquiry['telephone']?></p>
            <p><b>Enquiry Description: <br><br></b><?=$enquiry['description']?></p>
            <label>Enquiry Response: </label>
            <textarea name="response"></textarea>

            <input type="submit" name="submit" value="Save" />
		</form>
    </section>
</main>