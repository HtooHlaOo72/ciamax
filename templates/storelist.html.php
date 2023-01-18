<?php
if (!empty($errors)) :
    ?>
  <div class="errors">
    <p>Your account could not be created, please check the following:</p>
    <ul>
    <?php
            foreach ($errors as $error) :
                ?>
        <li><?= $error ?></li>
        <?php
            endforeach; ?>
    </ul>
  </div>
<?php
endif;
?>
<div>
    <h3>Store List</h3>
    <h2></h2>
    <ul>
    <?php foreach($stores as $store): ?>
        <li>
            <?= 'Name : '.$store->name ?>
            <?= '| Owner : '.$store->getOwner()->name ?>
        </li>
    <?php endforeach ?>
    </ul>
</div>