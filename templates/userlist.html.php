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
    <h3>User List</h3>
    <ul>
    <?php foreach($users as $user): ?>
        <li>
            <?= 'Name : '.$user->name ?>
            <?= '| Email : '.$user->email ?>
        </li>
    <?php endforeach ?>
    </ul>
</div>