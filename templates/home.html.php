<?php

use Util\Authentication;
?>
<div class="uk-responsive-height">
        
        <main class="uk-height-large uk-width-expand  uk-inline" style='background-color:#034250;color:white;'>
            <div class="uk-overlay uk-dark uk-position-center normal_opacity ">
                <h4 class="text_white uk-text-bolder" style='color:white;'>A solution for our environment</h4>
                <p class="uk-text-bold text_white" >Please be sure to join</p>
                <a class="uk-button uk-button-secondary uk-border-rounded uk-box-shadow-small" style='background-color:#db9914 !important;color:black;' href="/ciamax/public/user/registrationform">Register Here</a>
            </div>
        </main>
        <section class="uk-responsive-height uk-height-medium@s uk-width-expand uk-text-left uk-margin-medium-top ">
            <h3 class="uk-margin-small-left uk-margin-small-right uk-border small_title text_white"></h3>
            <div class="uk-child-width-1-2@s uk-height-max-large uk-grid-match " uk-grid>
                <div>
                    <div class="uk-light uk-background-secondary uk-padding">
                        <h3 class="" >Contact us via email to join as a store owner</h3>
                        <p>Sell your best services to students</p>
                        <button class="uk-button uk-button-default">ciamax@uit.edu.mm</button>
                    </div>
                </div>
                <div>
                    <div class="uk-dark uk-background-muted uk-padding">
                        <h3>Hosteler Package</h3>
                        <p>Hostelers can join lunch and dinner package which is only <span>2800 MMK</span> per day</p>
                        <a class="uk-button uk-button-default" href="/user/registrationForm">Join</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
   
    <div class="uk-margin-medium-top">
        <h3 class="small_title uk-margin-small-left text_white">Menu</h3>
        <div class="uk-grid uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">
            <?php foreach($menus as $menu): ?>
            <div class="uk-margin-small-top">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="/ciamax/public/<?=$menu->img??'images/canteen_img/c1.jpg' ?>" width="1800" height="1200" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title"><?=$menu->name??"Empty Name" ?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <a class="uk-button uk-button-default uk-align-center uk-width-small text_white" href="/ciamax/public/menu/list">See More</a>
    </div>
    <hr/>
    