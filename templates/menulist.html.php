<div class="">
            <div class="uk-child-width-1-2@m uk-grid-column-small uk-margin-small-left uk-margin-small-right" uk-grid>
            <?php foreach($menus as $menu) : ?>    
            <div>
                    <div class="uk-card uk-card-default uk-border-rounded">
                        <div class="uk-card-media-top">
                            <img src="/ciamax/public/<?=$menu->img??'images/canteen_img/m4.jpg' ?>" width="1800" height="1200" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><?=$menu->name??"Empty Menu Name" ?></h3>
                            <p><?=$menu->price ?> Kyats</p>
                            <p><?=isset($menu->getStore()->name)?$menu->getStore()->name:"No Owner" ?></p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>