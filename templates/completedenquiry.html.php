<main class="sidebar">
<?php require 'leftadminnav.html.php' ?>
	<section class="right">
    <h2>Response to <?=$enquiry['first_name'] . ' ' . $enquiry['last_name']?>  by staff ID <?=$enquiry['staffId']?></h2>
            <input type="hidden" name="id" value="<?=$enquiry['id']?>" />
            <p><b>ID: </b><?=$enquiry['id']?></p>
            <p><b>First Name: </b><?=$enquiry['first_name']?></p>
            <p><b>Last Name: </b><?=$enquiry['last_name']?></p>
            <p><b>Email Address: </b><?=$enquiry['email_address']?></p>
            <p><b>Telephone: </b><?=$enquiry['telephone']?></p>
            <p><b>Enquiry Description: <br><br></b><?=$enquiry['description']?></p>
            <p><b>Enquiry Response: <br><br></b><?=$enquiry['response']?></p>
    </section>
</main>