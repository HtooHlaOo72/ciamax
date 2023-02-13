<div class="uk-container" uk-height-viewport style="background-color:#8dc9d7">
<div class="uk-padding">            
<div class="uk-child-width-1-4@m uk-grid-match uk-grid-small " uk-grid>
            <?php foreach($menus as $menu) : ?>    
            <div>
                    <div class="uk-card card uk-border-rounded" >
                        <div class="uk-card-media-top" style="height:100px">
                            <img src="/ciamax/public/<?=$menu->img??'images/canteen_img/m4.jpg' ?>" width="100%" height="100%" alt="image">
                        </div>
                        <div class="uk-card-body">
                            <p class="uk-card-title"><?=$menu->name??"Empty Menu Name" ?></p>
                            <p><?=$menu->price ?> Kyats</p>
                            <p><?=isset($menu->getStore()->name)?$menu->getStore()->name:"No Owner" ?></p>
                        </div>
                        
                    </div>
            </div>
            
            <?php endforeach ?></div>
            </div>
</div>