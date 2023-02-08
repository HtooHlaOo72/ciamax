
<div class='' uk-height-viewport="expand:true" >
<div class="uk-width-expand uk-background-fixed uk-background-center-center uk-height-medium uk-flex uk-flex-center uk-flex-middle" style="background-image:url(/ciamax/public/images/storewall.jpg);" >
    <main class='uk-flex-inline'>
        <div>
            <img src="http://localhost/ciamax/public/<?=$store->img ?>" alt="" class='uk-border-circle'>
        </div>
        <div class='uk-padding-small'>
        <p class='uk-text-large uk-text-bolder'><?=$store->name?$store->name:"Name is empty" ?></p>
        <p class='uk-text-default uk-text-bold'>Owner : <?=(isset($owner))?$owner->name:"Name is empty" ?></p>
        <p class='uk-text-default uk-text-bold'>Phone : <?=$store->ph_no?$store->ph_no:"Name is empty" ?></p>
        <p class='uk-text-default uk-text-bold'>Total Members : <?=$store->TotalMembers() ?></p>
        <a href="" class='uk-button uk-button-small uk-button-secondary'>
            Join Membership
        </a>
        </div>
        
    </main>
</div>

<ul class="uk-subnav uk-subnav-pill uk-child-width-1-3 uk-margin-small-top" uk-switcher="animation: uk-animation-fade" uk-grid>
    <li><a href="#" style="border:2px dotted black" class='uk-flex uk-flex-center'>Menus</a></li>
    <li><a href="#" style="border:2px dotted black" class='uk-flex uk-flex-center'>Members</a></li>
    <li><a href="#" style="border:2px dotted black" class='uk-flex uk-flex-center'>Store Info</a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li class=''>
    <div class="uk-child-width-1-2 uk-grid-small" uk-grid>
        <?php foreach($menus as $index=>$menu): ?>
            <div class="uk-card uk-card-default uk-border-rounded">
                <div class="uk-card-media-top">
                    <img class='uk-width-expand uk-height-medium uk-border-rounded' src=<?=$menu->img?"/ciamax/public/".$menu->img:"images/canteen_img/c2.jpg" ?> alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><?=$menu->name??"Empty Name" ?> <span class='uk-text-warning'><?=$menu->price?$menu->price." Kyats":"0 Kyat" ?></span></h3>
                    <p><?=($menu->description)??"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt." ?></p>
                </div>
                
            </div>            
        <?php endforeach ?>
    </div>
    </li>
    <li>Members</li>
    <li>
        <div>
            <h1>Info</h1>
            <p>
                Phone Number : <?=$store->ph_no??"<span class='uk-text-danger'>empty</span>" ?>
            </p>
            <p>
                Total Members : <?=$store->TotalMembers() ?>
            </p>
        </div>
    </li>
</ul>
</div>