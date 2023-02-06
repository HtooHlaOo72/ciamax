<div class="uk-container" uk-height-viewport="expand:true">
        <h3 class=''>Admin Dashboard</h3>
        <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation:uk-animation-fade">
            <li><a href="#" class='uk-border-rounded uk-box-shadow-large'>Stores</a></li>
            <li><a href="#" class='uk-border-rounded uk-box-shadow-large'>Users</a></li>
            <li><a href="#" class='uk-border-rounded uk-box-shadow-large'>Manage Home</a></li>
        </ul>
        <ul class="uk-switcher uk-margin">
            <li>
                <div>
                    <div class="uk-margin-small-top uk-margin-small-bottom uk-child-width-1-2 uk-grid">
                        <div>
                        <h4 style="text-decoration:underline">Stores</h4>
                        </div>
                        <div>
                        <a class="uk-button uk-button-small uk-button-secondary uk-box-shadow-large uk-border-rounded"
                            href='/ciamax/public/store/register'
                        >Create New Store</a>
                        </div>
                    </div>                    
                    <div>
                        <div class="uk-child-width-1-3 uk-child-width-1-4@m uk-grid-match uk-grid-medium" uk-grid>
                            <?php foreach($stores as $store):?>
                            <div class="uk-card uk-card-hover uk-padding-remove " type="button">
                                <div class="uk-text-right">
                                    <span class='uk-margin-small-right' uk-icon="more" type="button"></span>
                                    <div uk-dropdown="mode:click" class="uk-padding-remove width_100" style='width:100px;background:none;'>
                                        <ul class='uk-nav uk-dropdown-nav width_100' style='background:none;'>
                                            <li class="uk-background-default uk-text-center uk-text-warning uk-border-rounded" style='background:none;'>
                                                <a href="/ciamax/public/store/register/<?=isset($store->id)?$store->id:"" ?>" class="uk-button uk-button-default uk-border-rounded uk-flex uk-flex-center uk-flex-middle width_100">Update</a>
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
                                <div class="uk-card-media-top uk-padding-remove" >
                                    <img src="http://localhost/ciamax/public/<?=$store->img ?>" alt="" >
                                </div>                    
                                <div class="uk-card-body smallest_font_size uk-padding-remove uk-margin-small-bottom">
                                    <h3 class="uk-margin-small-left uk-margin-small-right uk-card-title uk-text-small "><?=$store->name ?></h3>
                                    <p class='uk-margin-small-left uk-margin-small-right' >Owner     : <?=!empty($store->getOwner())?$store->getOwner()->name:"No Owner" ?> </p>
                                    <p class='uk-margin-small-left uk-margin-small-right' >Phone no  : <?=isset($store->ph_no)?$store->ph_no:"09xxxxxxxxx" ?></p>
                                </div>
                            </div>
                            <?php endforeach ?> 
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <div class="uk-margin-small-top uk-margin-small-bottom uk-child-width-1-2 uk-grid">
                        <div>
                            <h4 style="text-decoration:underline">Students</h4>
                        </div>
                        <div>
                            <a  class="uk-button uk-button-small uk-button-secondary"
                                href="/ciamax/public/user/registrationform"
                            >Create New Student</a>
                        </div>
                    </div>
                    <div class="uk-child-width-1-4 uk-margin-small-left uk-margin-small-right uk-grid-match" uk-grid>
                        <?php foreach($users as $user):?>
                            <div class="uk-card uk-card-hover uk-box-shadow-small uk-padding-remove uk-border-rounded" type="button">
                                <div class="uk-text-right">
                                    <span class='uk-margin-small-right' uk-icon="more" type="button"></span>
                                    <div uk-dropdown="mode:click" class="uk-padding-remove width_100" style='width:100px;background:none;'>
                                        <ul class='uk-nav uk-dropdown-nav width_100' style='background:none;'>
                                            <li class="uk-background-default uk-text-center uk-text-warning uk-border-rounded" style='background:none;'>
                                                <form>
                                                    <input type='hidden' name='id' value=<?=$user->id??"" ?>/>
                                                    <input type='submit' value="Update" class='uk-button uk-button-default uk-background-default uk-border-rounded width_100'/>
                                                </form>
                                            </li>
                                            <li class="uk-background-default uk-text-center uk-text-warning uk-border-rounded" style='background:none;'>
                                                <a href="/ciamax/public/user/changeinfo/<?=$user->id??""?>" >Change</a>
                                            </li>
                                            <li class="uk-background-secondary uk-text-center uk-text-danger uk-border-rounded" style='background:none;'>
                                                <form method='POST' action='/ciamax/public/user/remove' class='uk-border-rounded'>
                                                    <input type='hidden' name='id' value=<?=$user->id??"" ?>/>
                                                    <input type='submit' value="Delete" class='uk-button uk-button-danger uk-border-rounded width_100 ' />
                                                </form>
                                            </li>
                                        </ul>
                                    </div> 
                                </div>
                                <div class="uk-card-media-top uk-padding-remove" >
                                    <img src="http://localhost/ciamax/public/images/canteen_img/student/male_avatar.jpg"  alt="" class='uk-width-expand uk-height-small'>
                                </div>                    
                                <div class="uk-card-body uk-text-small uk-padding-remove uk-margin-small-bottom uk-margin-small-left uk-margin-small-right smallest_font_size">
                                    <div>
                                        Name : <strong><?=$user->name ?></strong>
                                    </div>
                                    <div>
                                        Email   : <strong><?=$user->email ?></strong>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?> 
                    </div>
                    
                </div>
            </li>
            
        </ul>
        
    </div> 