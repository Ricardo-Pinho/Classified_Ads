<?php foreach ($subcategories as $subcategory_item): ?>

    <h2><?php echo $subcategory_item['name'] ?></h2>

    <p><a href="subcategory/<?php echo $subcategory_item['id'] ?>">View article</a></p>

<?php endforeach ?>