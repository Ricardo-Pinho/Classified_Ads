<?php foreach ($categories as $category_item): ?>

    <h2><?php echo $category_item['name'] ?></h2>

    <p><a href="category/<?php echo $category_item['id'] ?>">View article</a></p>

<?php endforeach ?>