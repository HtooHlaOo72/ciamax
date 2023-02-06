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
<div class='uk-container' uk-height-viewport>
    <div class="uk-margin-small-top uk-margin-small-bottom uk-child-width-1-2 uk-grid">
        <div>
            <h4 style="text-decoration:underline">Students</h4>
        </div>
        <div>
            <a class="uk-button uk-button-small uk-button-secondary"
               href="/ciamax/public/user/registrationform">Create New Student</a>
        </div>
    </div>
    <di class="uk-child-width-1-4 uk-grid-match" uk-grid>
        <?php foreach($users as $user):?>
            <div class="uk-card uk-card-hover uk-box-shadow-small" type="button">
                <div class="uk-text-right">
                    <span class='uk-margin-small-right' uk-icon="more" type="button"></span>
                    <div uk-dropdown="mode:click" class="uk-padding-remove width_100">
                        <ul class='uk-nav uk-dropdown-nav'>
                            <li class="uk-background-default uk-text-center width_100">
                                Update<span class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></span>
                            </li>
                            <li class="uk-background-secondary uk-text-center uk-text-danger width_100">
                                Delete<span class="uk-icon-link uk-margin-small-right" uk-icon="trash"></span>
                            </li>
                        </ul>
                    </div> 
                </div>
                <div class="uk-card-media-top" >
                    <img src="http://localhost/ciamax/public/images/canteen_img/student/male_avatar.jpg"  alt="" class='uk-width-expand uk-height-small' style='object-fit:cover;'>
                </div>                    
                <div class="uk-card-body uk-text-small uk-padding-remove uk-margin-small-bottom smallest_font_size">
                    <div>
                        Name : <strong><?=$user->name ?></strong>
                    </div>
                    <div>
                        Email   : <strong><?=$user->email ?></strong>
                    </div>
                </div>
            </div>
        <?php endforeach ?> 
    </div>  
</div>
