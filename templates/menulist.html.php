<div class="uk-container" uk-height-viewport="expand:true" style="background-color:#8dc9d7">
<div class="">
<h4 style="text-decoration:underline">Menus</h4>            
<div class="uk-child-width-1-4@m uk-grid-match uk-grid-small " uk-grid>
            <?php foreach($menus as $menu) : ?>    
            <div>
                    <div class="uk-card card uk-border-rounded" >
                    <div class="uk-card-media-top uk-padding-remove" >
                        
                            <img src="http://localhost/ciamax/public/<?=$menu->img ?>" alt="" 
                                class='uk-height-small uk-width-expand' style="max-height:130px;">
                       
                    </div>                    
                    <div class="uk-card-body smallest_font_size uk-padding-remove uk-margin-small-bottom" >
                        <p class="uk-margin-small-left uk-margin-small-right uk-card-title uk-text-small uk-text-bolder"><?= $menu->name ?></p>
                        <div class="uk-text-bold" id="info">
                            <p class='uk-margin-small-left uk-margin-small-right' ><?=$menu->description  ??"empty" ?> </p>
                            <p class='uk-margin-small-left uk-margin-small-right' >Price   : <?=$menu->price??"empty" ?> </p>
                            <p class='uk-margin-small-left uk-margin-small-right' >From  :<span style='color:gold;'><?=$menu->getStore()->name??"empty"?><span></p>
                        </div>
                    </div>
                        
                    </div>
            </div>
            
            <?php endforeach ?></div>
            </div>
</div>