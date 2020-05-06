<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
    <section class="right">
        <h2>Enquires</h2>
        <a class="new" href="viewcompletedenquires.php">View completed enquires</a>
        <table>
            <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 20%">First Name</th>
                    <th style="width: 20%">Last Name</th>
                    <th style="width: 20%">Email Address</th>
                    <th style="width: 15%">Telephone</th>
                    <th style="width: 10%">&nbsp;</th>
                </tr>

            <?php foreach ($enquires as $enquiry) { ?>
                    <tr>
                        <td><?=$enquiry['id']?></td>
                        <td><?=$enquiry['first_name']?></td>
                        <td><?=$enquiry['last_name']?></td>
                        <td><?=$enquiry['email_address']?></td>
                        <td><?=$enquiry['telephone']?></td>
                        <td><a style="float: right" href="respondenquiry.php?id=<?=$enquiry['id']?>">Respond</a></td>
                    </tr>
            <?php } ?>
            </thead>
        </table>
    </section>
</main>