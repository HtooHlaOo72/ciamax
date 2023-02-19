<?php
if (!empty($errors)) :
    ?>
  <div class="errors">
    <p>Please Check the Following Errors:</p>
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
<div class='uk-container' uk-height-viewport style="background-color:#8dc9d7">
    <div class="uk-margin-small-top uk-margin-small-bottom uk-child-width-1-2 uk-grid">
        <div class=''>
        <h4 style="text-decoration:underline">Stores</h4>
        </div>
        <div>
        <?php if($role==2 and $ownerNoStore): ?>
        <a class="uk-button uk-button-small uk-button-secondary uk-box-shadow-large uk-border-rounded uk-float-right"
            href='/ciamax/public/store/register' style="background-color:#2d7484"
        >Create Your Store</a>
        <?php endif ?>
        </div>
        
    </div>                    
    <div>
        <div class="uk-child-width-1-2 uk-child-width-1-4@m uk-grid-match uk-grid-small uk-padding-small"  uk-grid>
            <?php foreach($stores as $store):?>
            <div>
                <div class="uk-card card uk-padding-remove uk-border-rounded" >
                    <?php if($role==3){ ?>
                    <div class="uk-text-right">
                        <span class='uk-margin-small-right' uk-icon="more" type="button"></span>
                        <div uk-dropdown="mode:click" class="uk-padding-remove width_100" style='width:100px;background:none;'>
                            <ul class='uk-nav uk-dropdown-nav width_100' style='background:none;'>
                                <li class="uk-background-default uk-text-center uk-text-warning uk-border-rounded" style='background:none;'>
                                    <a href="/ciamax/public/store/register/<?=isset($store->id)?$store->id:"" ?>" class="uk-button uk-button-primary uk-border-rounded uk-flex uk-flex-center uk-flex-middle width_100" style="color:white !important;height:3em;">Update</a>
                                </li>
                                <li class="uk-background-secondary uk-text-center uk-text-danger uk-border-rounded" style='background:none;'>
                                    <form method='POST' action='/ciamax/public/store/remove' class='uk-border-rounded'>
                                        <input type='hidden' name='id' value=<?=$store->id??"" ?>/>
                                        <input type='submit' value="Delete" class='uk-button uk-button-danger uk-border-rounded width_100 ' />
                                    </form>
                                </li>
                            </ul>
                        </div> 
                    </div>
                
                    <?php } ?>
                    <div class="uk-card-media-top uk-padding-remove" >
                        <a href='/ciamax/public/store/profile/<?=$store->id??'' ?>'>
                            <img src="http://localhost/ciamax/public/<?=$store->img ?>" alt="" 
                                class='uk-height-small uk-width-expand' style="max-height:130px;">
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
