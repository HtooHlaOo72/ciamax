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
<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport style='background-color:#8dc9d7;'>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large" style='background-color:#2d7484;width:65%;border-radius:25px;min-width:400px;'>
                            <h3 class="uk-card-title uk-text-center" style="color:#FFF;">User Registration</h3>
                            <form method="POST" action='' enctype='multipart/form-data'>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1" >
                                        <!--<span class="uk-form-icon" uk-icon="icon: info"></span>-->
                                        <div style="display:inline-block;width:25%;min-width:100px"><label class="uk-text-large"style="color:#fff;">Name :</label></div>
                                        <div style="display:inline-block;text-align:right;width:70%;min-width:300px"><input class=" uk-form-large" style="width:100%;color : #000;border: 0 solid #fff;background-color:#ADD8E6; box-sizing:border-box;border-radius:25px;border-color:#ADD8E6;" type="text"  placeholder="Enter username" name="user[name]" value="<?=isset($user->name)?$user->name : '' ?>"></div>
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
                                    <div style="display:inline-block;width:25%;min-width:100px"><label class="uk-text-large"style="color:#fff">Email :</label></div>
                                    <div style="display:inline-block;text-align:right;width:70%;min-width:300px"><input class=" uk-form-large"style="color : #000;background-color:#ADD8E6;border: 0 solid #fff; width:100%;box-sizing:border-box;border-radius:25px;border-color:#ADD8E6;" type="email" placeholder="example@uit.edu.mm" name="user[email]" id='email' value=<?=isset($user->email)?$user->email :"" ?> ></div>
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
                                    <div style="display:inline-block;width:25%;min-width:120px"><label class="uk-text-large"style="color:#fff">Password :</label></div>
                                        <!--<span class="uk-form-icon" uk-icon="icon: lock"></span>-->
                                        <div style="display:inline-block;text-align:right;width:70%;min-width:300px"><input class=" uk-form-large" style=" color : #000;background-color:#ADD8E6;border: 0 solid #fff; width:100%;box-sizing:border-box;border-radius:25px;border-color:#ADD8E6;"type="password" placeholder=<?=(isset($is_update)? "'Old Password'":"'Password'") ?> name="user[password]" id='password'></div>
                                    </div>
                                </div>
                                <?php if(isset($is_update) and $is_update){ ?>
                                    <div
                                        class='uk-margin'
                                    >
                                    <div class="uk-inline uk-width-1-1">
                                    <div style="display:inline-block;width:25%;min-width:120px"><label class="uk-text-large"style="color:#fff">New Password :</label></div>
                                    <div style="display:inline-block;text-align:right;width:70%;min-width:300px"><input class=" uk-form-large" style=" color : #000;background-color:#ADD8E6;border: 0 solid #fff; width:100%;box-sizing:border-box;border-radius:25px;border-color:#ADD8E6;"type="password" placeholder="New Password" name="user[new_password]" id='new_password' value=""></div>
                                    </div>
                                    </div>
                                <?php } ?>
                                <div class="uk-margin" style="text-align:right;width:100%">
                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="max-width: 25%;min-width:150px;background-color:#ADD8E6;font-size:20px;padding-left:20px;padding-right:20px;border-radius:25px;color:#000;"type='submit'><?=(isset($is_update))?"Submit":"Register" ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>