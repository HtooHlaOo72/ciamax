
<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">Student Registration</h3>
                            <form method="POST" action='/ciamax/public/store/register' enctype="multipart/form-data">
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                                        <input class="uk-input uk-form-large" type="text"  placeholder="Enter store name" name="name">
                                    </div>
                                </div>
                                
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <label class='uk-form-label' for='img'>Profile Picture</label>
                                        <div class="js-upload" uk-form-custom>
                                            <input type="file" name='img' id='img'>
                                            <button class="uk-button uk-button-default"  type="button" tabindex="-1">Select</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <label class='uk-form-label' for='qr_img'>KPAY QR</label>
                                        <div class="js-upload" uk-form-custom>
                                            <input type="file" name='qr_img' id='qr_img'>
                                            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type='submit'>Create Store</button>
                                </div>
                                <div class="uk-text-small uk-text-center">
                                    Not registered? <a href="/ciamax/public/user/success">Create an account</a>
                                </div>
                                <?php
                                if (!empty($errors)) :
                                    ?>
                                <div class="errors">
                                    <p>Your store could not be created, please check the following:</p>
                                    <ul class='uk-text-danger'>
                                    <?php
                                            foreach ($errors as $error) :
                                                ?>
                                        <li><p class='uk-alert uk-alert-danger'><?= $error ?></p></li>
                                        <?php
                                            endforeach; ?>
                                    </ul>
                                </div>
                                <?php
                                endif;
                                ?> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>