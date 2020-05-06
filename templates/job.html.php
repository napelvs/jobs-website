<main class="sidebar">
<?php require 'templates/leftadminnav.html.php' ?>
    <section class="right">

        <h2>Jobs</h2>
        <a class="new" href="addjob.php">Add new job</a>

        <form method="POST">
         <input type="submit" name="submit" value="Filter by" />
            <select name="category_filter" class="event-type-select">
            <?php
            foreach ($categories as $category) { ?>
                <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php
            } 
            ?>
            </select>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th style="width: 15%">Category</th>
                    <th style="width: 15%">Salary</th>
                    <th style="width: 5%">&nbsp;</th>
                    <th style="width: 15%">&nbsp;</th>
                    <th style="width: 5%">&nbsp;</th>
                    <th style="width: 5%">&nbsp;</th>
                </tr>

            <?php foreach ($jobs as $job) { 
                    require '../../databaseConnection.php';
                    $applicants = $pdo->prepare('SELECT COUNT(*) AS count FROM applicants WHERE jobId = :jobId');
                    $applicants->execute(['jobId' => $job['id']]);
                    $applicantCount = $applicants->fetch();

                    $jobCategory = findWithInnerJoin($pdo, 'job', 'category', 'categoryId', 'id', 'id', $job['id']);
                    ?>
                    <tr>
                        <td><?=$job['title']?></td>
                        <td><?=$jobCategory['name']?></td>
                        <td><?=$job['salary']?></td>
                        <td><a style="float: right" href="editjob.php?id=<?=$job['id']?>">Edit</a></td>
                        <td><a style="float: right" href="applicants.php?id=<?=$job['id']?>">View applicants (<?=$applicantCount['count']?>)</a></td>

                        <td><form method="post" action="deletejob.php">
                            <input type="hidden" name="id" value="<?=$job['id']?>" />
                            <input type="submit" name="submit" value="Delete" />
                        </form></td>
                        <?php 
                        if ($job['archived'] == 'N') { ?>
                            <td><form method="post" action="archivejob.php">
                            <input type="hidden" name="id" value="<?=$job['id']?>" />
                            <input type="submit" name="submit" value="Archive" />
                        </td>
                        <?php 
                        }  
                        if ($job['archived'] == 'Y') { ?>
                            <td><form method="post" action="repostjob.php">
                            <input type="hidden" name="id" value="<?=$job['id']?>" />
                            <input type="submit" name="submit" value="Repost" />
                        </td>
                        <?php 
                        } ?>
                        </form>
                    </tr>
            <?php } ?>
            </thead>
        </table>
    </section>
</main>