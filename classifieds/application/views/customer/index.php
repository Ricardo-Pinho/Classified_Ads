<?php foreach ($customers as $customer_item): ?>

    <h2><?php echo $customer_item['name'] ?></h2>
    <div class="main">
        <?php echo '<p> Location: '.$customer_item['location'].'</p>' ?>
        <?php echo '<p> Email: '.$customer_item['email'].'</p>' ?>
        <?php echo '<p> Phone: '.$customer_item['phone'].'</p>' ?>
    </div>
    <p><a href="customer/<?php echo $customer_item['id'] ?>">View article</a></p>

<?php endforeach ?>