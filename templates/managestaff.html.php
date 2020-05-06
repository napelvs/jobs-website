<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
    <section class="right">

        <h2>Staff</h2>
        <a class="new" href="addstaff.php">Add new staff</a>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th style="width: 25%">First Name</th>
                    <th style="width: 25%">Last Name</th>
                    <th style="width: 15%">&nbsp;</th>
                </tr>

            <?php foreach ($staffs as $staff) { ?>
                    <tr>
                        <td><?=$staff['username']?></td>
                        <td><?=$staff['first_name']?></td>
                        <td><?=$staff['last_name']?></td>
                        <td><form method="post" action="deletestaff.php">
                            <input type="hidden" name="id" value="<?=$staff['id']?>" />
                            <input type="submit" name="submit" value="Delete" />
                        </form></td>
                    </tr>
            <?php } ?>
            </thead>
        </table>
    </section>
</main>