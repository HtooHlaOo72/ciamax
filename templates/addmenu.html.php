
<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport style="background-color:#8dc9d7;">
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large" style="background-color:#2d7484;border-radius:25px;">
                            <h3 class="uk-card-title uk-text-center" style="color:#fff">New Menu</h3>
                            <form method="POST" action='' enctype="multipart/form-data">
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <label class='uk-form-label' for='name' style="color:#fff">Name</label>
                                        <input class=""style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000;"  type="text"  placeholder="Enter menu name" name="name">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class='form-label' style="color:#fff">Description</label>
                                    <textarea class="" style="height:100px;width:100%;box-sizing:border-box;vertical-align:top;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding-left:10px;padding-top: 6px;padding-bottom:6px;font:inherit;color:#000;" rows="5" placeholder='Enter description about your menu' aria-label="Textarea" name='description'></textarea>
                                </div>
                                <div class="uk-margin">
                                    <div class='uk-inline uk-width-1-1'>
                                        <label class='form-label' style="color:#fff">Price</label>
                                        <input class="" style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000;"  type="number" name="price">
                                    </div>
                                </div>
                                
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <label class='uk-form-label' style="color:#FFF" for='img'>Menu Photo</label>
                                        <div class="js-upload" uk-form-custom>
                                            <input type="file" name='img' id='img'>
                                            <button class="uk-button uk-button-default" style="color:#000 ; background-color:#ADD8E6;font-size:20px;width:25%;min-width:150px;padding-left:20px;padding-right:20px;border-radius:25px;" type="button" tabindex="-1">Select</button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1" style="width:100%">
                                    <div class="uk-margin-small" style="display:inline-block;width:58%;min-width:150px;text-align:left">
        <a class="uk-button uk-button-large uk-button-secondary uk-box-shadow-large uk-border-rounded "
            href='/ciamax/public/menu/list' style="color:#000 ; background-color:#ADD8E6;font-size:20px;width:25%;min-width:150px;padding-left:20px;padding-right:20px;border-radius:25px;"
        >Cancel</a></div>
                                    <div class="uk-margin-small" style="display:inline-block;text-align:right;width:30%;min-width:150px"><button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type='submit' style="color:#000 ; background-color:#ADD8E6;font-size:20px;width:25%;min-width:150px;padding-left:20px;padding-right:20px;border-radius:25px;">Create</button></div>
                                    </div>
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