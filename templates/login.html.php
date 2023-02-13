<?php
if (isset($errorMessage)):
    echo '<div class="uk-alert-danger">Sorry, your username and password could not be found.</div>';
endif;
?>
<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport style='background-color:#8dc9d7;'>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large" style='background-color:#2d7484;width:50%;min-width:400px;border-radius:25px'>
                            <h3 class="uk-card-title uk-text-center" style="color:#FFF;">Login to Ciamax</h3>
                            <form method='post' action=''>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                    <div style="display:inline-block;width:25%;min-width:100px"><label class="uk-text-large"style="color:#fff">Email :</label></div>
                                    <div style="display:inline-block;text-align:right;width:70%;min-width:300px"><input class=" uk-form-large" style="color : #000;background-color:#ADD8E6; width:100%;box-sizing:border-box;border-radius:25px;border: 0 solid #fff" type="text" name='email' id='email'></div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                    <div style="display:inline-block;width:25%;min-width:120px"><label class="uk-text-large"style="color:#fff">Password :</label></div>
                                    <div style="display:inline-block;text-align:right;width:70%;min-width:300px"><input class="uk-form-large"style="color : #000; background-color:#ADD8E6;width:100%;box-sizing:border-box;border-radius:25px;border: 0 solid #fff" type="password" name='password' id='password'></div>	
                                    </div>
                                </div>
                                <div class="uk-margin" style="width:100%;text-align:center">
                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="color:#000 ; background-color:#ADD8E6;font-size:20px;width:25%;min-width:150px;padding-left:20px;padding-right:20px;border-radius:25px;" name='login'>Login</button>
                                </div>
                                <div class="uk-text-medium uk-text-center"style="color:#fff;">
                                    Not registered? 
                                    <br/>
                                    <a class="uk-button-primary uk-button uk-button-large uk-margin-small-top" href="/ciamax/public/user/registrationform" style="color:#000 ; background-color:#ADD8E6;font-size:20px;width:25%;min-width:150px;padding-left:20px;padding-right:20px;border-radius:25px;">Sign Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>