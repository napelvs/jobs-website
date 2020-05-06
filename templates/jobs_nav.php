<?php 
$categories = findAll($pdo, 'category');

foreach ($categories as $category) { ?>
    <li><a href="category.php?id=<?=$category['id']?>"><?=$category['name']?></a></li>
<?php } ?>