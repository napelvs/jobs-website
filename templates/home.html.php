<main class="home">
    <?php require 'aboutus.html.php'; ?>
    <h2>Jobs closing soon:</h2>
    <ul>
        <?php foreach ($jobs as $job) { ?>
            <li>
                <div class="details">
                    <h2> <?=$job['title']?></h2>
                    <h3> <?= $job['salary']?></h3>
                    <p> <?=nl2br($job['description'])?></p>
                    <a class="more" href="/apply.php?id=<?=$job['id']?>">Apply for this job</a>
                </div>
            </li>
        <?php } ?>
    </ul>
</main>