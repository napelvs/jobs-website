<main class="sidebar">

	<section class="left">
		<ul>
            <?php foreach ($categories as $categories) { ?>
                <li <?php if ($categories['id'] == $_GET['id']) {echo ' class="current"';} ?> 
                ><a href="category.php?id=<?=$categories['id']?>"><?=$categories['name']?></a></li>
            <?php } ?>
		</ul>
        
	</section>

	<section class="right">
    <form method="POST">
        <input type="submit" name="submit" value="Filter by" />
        <select name="job_filter" class="event-type-select">
            <?php
            foreach ($jobsLocation as $job) { ?>
                <option value="<?=$job['location']?>"><?=$job['location']?></option>
            <?php
            } 
        ?>
        </select>
    </form>
	<h1>  <?=$category['name']?> Jobs</h1>
    
    <ul class="listing">
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
