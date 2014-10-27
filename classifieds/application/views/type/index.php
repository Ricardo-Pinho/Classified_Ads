<?php foreach ($types as $type_item): ?>

    <h2><?php echo $type_item['name'] ?></h2>

    <p><a href="type/<?php echo $type_item['id'] ?>">View article</a></p>

<?php endforeach ?>