<?php

use Util\Authentication;
?>

<div class="uk-responsive-height" style="background-color:#8dc9d7;">
        <main class="uk-height-large uk-width-expand uk-background-cover uk-inline" data-src="/images/banner.jpg" uk-img>
            <div class="uk-overlay  uk-position-center normal_opacity uk-card-default" style="background-color:#2d7484;border-radius:25px">
                <h4 class="text_white uk-text-bolder" style="color:#fff;">A solution for our environment</h4>
                <p class="uk-text-bold text_white" style="color:#fff;">Please be sure to join</p>
                <a class="uk-button uk-button-secondary " style="color:#000;background-color:#ADD8E6;border-radius:25px" href="/ciamax/public/user/registrationform">Register Here</a>
            </div>
        </main>
        <section class="uk-responsive-height uk-height-medium@s uk-width-expand uk-text-left uk-margin-medium-top">
            <h3 class="uk-margin-small-left uk-margin-small-right uk-border small_title text_white"></h3>
            <div class="uk-child-width-1-2@s uk-height-max-large " uk-grid>
                <div>
                    <div class="uk-light uk-background-secondary uk-padding uk-card-default" style="background-color:#2d7484;border-radius:25px;">
                        <h3 class="" >Contact us to join as a store owner</h3>
                        <p class="uk-text-bold">Sell your best services to students</p>
                        <a class="uk-button uk-button-secondary " href="mailto:ciamax@uit.edu.mm" style="color:#000;background-color:#ADD8E6;border-radius:25px;">Ciamax@uit.edu.mm</a>
                    </div>
                </div>
                <div>
                    <div class="uk-light uk-background-muted uk-padding uk-card-default" style="background-color:#2d7484;border-radius:25px">
                        <h3>Hosteler Package</h3>
                        <p class="uk-text-bold">Hostelers can join lunch and dinner package which is only <span>2800 MMK</span> per day</p>
                        <a class="uk-button uk-button-secondary " style="color:#000;background-color:#ADD8E6;border-radius:25px;"href="/user/registrationform">Join</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="uk-container  "style="background-color:#8dc9d7;" >
      <div class=" uk-padding-small uk-margin-medium-top uk-margin-medium-bottom" style="background-color:#2d7484;border-radius:25px" >
      <h3 class="small_title uk-margin-small-left uk-margin-small-top" style="color:#fff;">Stores</h3>
  
      <div class="uk-child-width-1-2 uk-child-width-1-4@m uk-grid-match uk-grid-small uk-padding-small"  uk-grid>
            <?php foreach($stores as $store):?>
            <div>
                <div class="card uk-card  uk-padding-remove " style="border-top:5px solid #000;border-bottom:5px  solid #000">
                    
                    <div class="uk-card-media-top " >
                        <a href='/ciamax/public/store/profile/<?=$store->id??'' ?>'>
                            <img src="http://localhost/ciamax/public/<?=$store->img ?>" alt="" 
                                class='uk-height-small uk-width-expand'>
                        </a>
                    </div>                    
                    <div class="uk-card-body smallest_font_size uk-padding-remove uk-margin-small-bottom" uk-accordion >
                        <!--<h3 class="uk-margin-small-left uk-margin-small-right uk-card-title uk-text-small " ><?=$store->name ?> </h3>-->
                        <p class="uk-margin-small-left uk-margin-small-right uk-card-title uk-text-small uk-text-bold"><?= $store->name ?></p>
                        <div class="" id="info">
                            <p class='uk-margin-small-left uk-margin-small-right' >Owner     : <?=!empty($store->getOwner())?$store->getOwner()->name:"No Owner" ?> </p>
                            <p class='uk-margin-small-left uk-margin-small-right' >Phone no  : <?=isset($store->ph_no)?$store->ph_no:"09xxxxxxxxx" ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?> 
        </div>
    </div>
   </div>
   <!--<div class="uk-container "style="background-color:#8dc9d7;" >
   
    <div class="uk-card-default uk-padding-small uk-margin-small-top" style="background-color:#2d7484;border-radius:25px;">
    <h3 class="small_title uk-margin-small-left" style="color:#FFF;">Menu</h3>
        <div class="uk-grid uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">
            <?php foreach($menus as $menu): ?>
            <div class="uk-margin-small-top">
                <div class="uk-card uk-card-default" style="background-color:#034250;border-radius:25px">
                    <div class="uk-card-media-top">
                        <img src="/ciamax/public/<?=$menu->img??'images/canteen_img/c1.jpg' ?>" width="180" height="120" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title text_white" style="color:#fff;"><?=$menu->name??"Empty Name" ?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <a class="uk-button uk-button-default uk-align-center uk-width-small " style="color:#000;background-color:#ADD8E6;border-radius:25px;">See More</a>
    </div>
    </div>
    <div class="uk-container"style="background-color:#8dc9d7;" >
    <div class="uk-margin-medium-top uk-margin-small-bottom uk-card-default uk-padding-small" style="background-color:#2d7484;border-radius:25px">
        <h3 class="small_title uk-text-center text_white" style="color:#fff;" id="contact_us">Contact Us</h3>
        <div class="uk-container uk-flex uk-flex-center uk-margin-medium-top">
            <div class="uk-width-3-4 ">
                <form class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@s">
                        <input class=""style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000" type="text" placeholder="Full name*" required>
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="" style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000;" type="text" placeholder="Email*" required>
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="" style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000;" type="text" placeholder="Subject*" required>
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class=""style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000;" type="number" placeholder="Mobile number*" required>
                    </div>
                    <div class="uk-width-1">
                        <textarea class=""style="height:100px;width:100%;box-sizing:border-box;vertical-align:top;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding-left:10px;padding-top: 6px;padding-bottom:6px;font:inherit;color:#000;" rows="5" placeholder="Message*" required></textarea>
                    </div>
                </form>
                <button class="uk-button uk-button-secondary uk-margin-small-top "style="width:100%;box-sizing:border-box;height:40px;vertical-align:center;background-color:#ADD8E6;border-radius:25px;border:1px solid #e5e5e5;padding:0 10px;font:inherit;color:#000;">Send</button>
            </div>
        </div>
    </div>-->
    </div>    
    
