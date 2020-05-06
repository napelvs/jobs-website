<main class="sidebar">
<?php require '../public/admin/templates/leftadminnav.html.php' ?>
	<section class="right">
    <h2>Contact Us</h2>

        <form action="contactus.php" method="POST">
            <input type="hidden" name="id" value="" />
            <label>First Name</label>
            <input type="text" name="first_name"/>

            <label>Last Name</label>
            <input type="text" name="last_name"/>

            <label>Email Address</label>
            <input type="text" name="email_address"/>

            <label>Telephone</label>
            <input type="text" name="telephone"/>

            <label>Enquiry Description</label>
            <textarea name="description"></textarea>

            <input type="submit" name="submit" value="Save" />
		</form>
    </section>
</main>