
<div class='' uk-height-viewport="expand:true" style="background-color:#8dc9d7">
<div class="uk-width-expand uk-background-fixed uk-background-center-center uk-height-medium uk-flex uk-flex-center uk-flex-middle"  >
    <main class='uk-flex-inline uk-card-default' style="background-color:#2d7484;color:#fff;border-radius:25px">
        <div>
            <div class="uk-padding-small" style="width:250px">
                <img src="http://localhost/ciamax/public/<?=$store->img ?>" alt="<?=$store->name?>'s Image" class='uk-border-circle'>
            </div>
            <div class='uk-padding-small' >
            <p class='uk-text-large uk-text-bolder'><?=$store->name?$store->name:"Name is empty" ?></p>
            <p class='uk-text-default uk-text-bold'>Owner : <?=(isset($owner))?$owner->name:"Name is empty" ?></p>
            <p class='uk-text-default uk-text-bold'>Phone : <?=$store->ph_no?$store->ph_no:"Name is empty" ?></p>
            <p class='uk-text-default uk-text-bold'>Total Members : <?=$store->TotalMembers() ?></p>
            <a href="/ciamax/public/member/request" style="background-color:#034250;color:#fff;border-radius:5px" class='uk-button uk-button-small uk-button-secondary'>
                Join Membership
            </a>
            </div>
        </div>
        <div>
            <div class="uk-padding-small" style="width:250px">
                <img src="http://localhost/ciamax/public/<?=$store->qr_img ?>" alt="<?=$store->name?>'s Image" class='uk-border-rounded'>
            </div>
        </div>
    </main>
</div>
<hr />
<ul class="uk-subnav subnav-pill uk-child-width-1-3 uk-margin-small-top" uk-switcher="animation: uk-animation-fade" uk-grid>
    <li><a href="#" style="border:2px solid #2d7484" class='uk-flex uk-flex-center'>Menus</a></li>
    <li><a href="#" style="border:2px solid #2d7484" class='uk-flex uk-flex-center'>Members</a></li>
    <li><a href="#" style="border:2px solid #2d7484" class='uk-flex uk-flex-center'>History</a></li>
</ul>
<hr />
<ul class="uk-switcher uk-margin-medium-top uk-padding-small" >
    <li class=''>
    <div class="uk-margin-small">
        <a class="uk-button uk-button-small uk-button-secondary uk-box-shadow-large uk-border-rounded"
        href='/ciamax/public/menu/addmenu' style="background-color:#034250;color:#fff;"
        >Create New Menu</a>
    </div>
    <div class="uk-child-width-1-3 uk-grid-small" uk-grid>
        <?php foreach($menus as $index=>$menu): ?>
            <div class="uk-card uk-border-rounded uk-margin-small-left uk-margin-small-bottom">
                <div class="uk-card-media-top">
                    <img class='uk-width-expand uk-height-small uk-border-rounded' src=<?=$menu->img?"/ciamax/public/".$menu->img:"images/canteen_img/c2.jpg" ?> alt="">
                </div>
                <div class="uk-card-body">
                    <p class="uk-card-title"><?=$menu->name??"Empty Name" ?> <span style="color:gold"><?=$menu->price?$menu->price." Kyats":"0 Kyat" ?></span></p>
                    <p><?=($menu->description)??"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt." ?></p>
                </div>
                
            </div>            
        <?php endforeach ?>
    </div>
    </li>
    <li>
        <div class='uk-child-width-1-3 uk-grid-small' style="background-color:#8dc9d7" uk-grid>
            <?php foreach($members as $member): ?>
            <div class="uk-card uk-border-rounded">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="/ciamax/public/<?=(isset($member->getUser()->img))?$member->getUser()->img:"/images/canteen_img/admin/admin_icon.jpg" ?>" alt="Avatar">
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom" style='color:gold;'><?=$member->getUser()->name??"<span class='uk-text-danger'>empty</span>" ?></h3>
                            <p class="uk-text-meta uk-margin-remove-top"><time><?=!empty($member->start_date)?$member->start_date:date("M-d-Y") ?></time></p>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                </div>
                <div class="uk-card-footer">
                    <a href="/ciamax/public/user/profile/<?=$member->getUser()->id?>" class="uk-button uk-button-text">To Profile</a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </li>
    <li>
        <div class='uk-child-width-1-1' style="background-color:#8dc9d7">
        <table class="uk-table uk-table-justify uk-table-divider">
            <thead>
                <tr>
                    <th class="uk-width-small">Type</th>
                    <!-- <th>No of Days</th> -->
                    <th>Date</th>
                    <!-- <th>Transferred Amount</th> -->
                    <!-- <th>Transaction ID</th> -->
                    <th>Status</th>
                    <th>Menu</th>
                    <th>Detail</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($histories as $meal): ?>
                <tr>
                    <td>
                        <?=
                        $meal->type??"<span class='uk-text-danger'>empty</span>"
                        ?>
                    </td>
                    <td><?=$meal->date??"<span class='uk-text-danger'>emty</span>" ?></td>
                    <td><?=$meal->status??"<span class='uk-text-danger'>emty</span>" ?></td>
                    <td><?=$meal->getMenu()->name??"<span class='uk-text-danger'>emty</span>" ?></td>
                    <td><a href="/ciamax/public/member/historydetail/<?=$meal->id ?>" class='uk-button uk-button-small uk-button-default'>Detail</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </li>
</ul>
</div>
