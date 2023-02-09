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
<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">User Registration</h3>
                            <form method="POST" action='' enctype='multipart/form-data'>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                                        <input class="uk-input uk-form-large" type="text"  placeholder="Enter username" name="user[name]" value="<?=isset($user->name)?$user->name : '' ?>">
                                    </div>
                                </div>
                                <input type='hidden' name="user[id]" id='id' value=<?=$user->id??"" ?> />
                                <!-- <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon:info"></span>
                                        <input class="uk-input uk-form-large" name='section' type="text" placeholder="Enter section(1cst-A)" name='name' id='name'>
                                    </div>
                                </div> -->
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input class="uk-input uk-form-large" type="email" placeholder="example@gmail.com" name="user[email]" id='email' value=<?=isset($user->email)?$user->email :"" ?> >
                                    </div>
                                </div>
                                <?php if(isset($is_update) and $is_update){ ?>
                                    <div class="uk-margin">
                                        <div class="uk-inline uk-width-1-1">
                                            <label class='uk-form-label' for='qr_img'>Profile Picture</label>
                                            <div class="js-upload" uk-form-custom>
                                                <input type="file" name='img' id='img'>
                                                <button class="uk-button uk-button-default" type="button" tabindex="-1"><?=isset($user->img)?"Select New":"Select" ?></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input uk-form-large" type="password" placeholder=<?=(isset($is_update)? "'Old Password'":"'Password'") ?> name="user[password]" id='password'>	
                                    </div>
                                </div>
                                <?php if(isset($is_update) and $is_update){ ?>
                                    <div
                                        class='uk-margin'
                                    >
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input uk-form-large" type="password" placeholder="New Password" name="user[new_password]" id='new_password' value="">	
                                    </div>
                                    </div>
                                <?php } ?>
                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type='submit'><?=(isset($is_update))?"Submit":"Register" ?></button>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>