<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
    <section class="right">

        <h2>Users</h2>
        <a class="new" href="adduser.php">Add new user</a>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th style="width: 25%">First Name</th>
                    <th style="width: 25%">Last Name</th>
                    <th style="width: 15%">&nbsp;</th>
                </tr>

            <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?=$user['username']?></td>
                        <td><?=$user['first_name']?></td>
                        <td><?=$user['last_name']?></td>
                        <td><form method="post" action="deleteuser.php">
                            <input type="hidden" name="id" value="<?=$user['id']?>" />
                            <input type="submit" name="submit" value="Delete" />
                        </form></td>
                    </tr>
            <?php } ?>
            </thead>
        </table>
    </section>
</main>