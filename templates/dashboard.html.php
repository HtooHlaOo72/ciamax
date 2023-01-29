<div class="uk-container" uk-height-viewport="expand:true">
        <h3>Admin Dashboard</h3>
        <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation:uk-animation-fade">
            <li><a href="/ciamax/public/store/list">Stores</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Manage Home</a></li>
        </ul>
        <ul class="uk-switcher uk-margin">
            <li>
                <div>
                    <div class="uk-margin-small-top uk-margin-small-bottom uk-child-width-1-2 uk-grid">
                        <div>
                        <h4 style="text-decoration:underline">Stores</h4>
                        </div>
                        <div>
                        <a class="uk-button uk-button-small uk-button-secondary"
                            href='/ciamax/public/user/registrationForm'
                        >Create New Store</a>
                        </div>
                    </div>                    
                    <div>
                        <div class="uk-child-width-1-3 uk-child-width-1-5@m uk-grid-match uk-grid" uk-grid>
                            <?php foreach($stores as $store):?>
                            <div class="uk-card uk-card-hover " type="button">
                                <div class="uk-text-right">
                                    <span class='uk-margin-small-right' uk-icon="more" type="button"></span>
                                    <div uk-dropdown="mode:click" class="uk-padding-remove width_100" style='width:100px;'>
                                        <ul class='uk-nav uk-dropdown-nav width_100'>
                                            <li class="uk-background-default uk-text-center width_100 btn_round">
                                                Update<span class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></span>
                                            </li>
                                            <li class="uk-background-secondary uk-text-center uk-text-danger width_100 border_round">
                                                Delete<span class="uk-icon-link uk-margin-small-right" uk-icon="trash"></span>
                                            </li>
                                        </ul>
                                    </div> 
                                </div>
                                <div class="uk-card-media-top uk-padding-remove" >
                                    <img src="http://localhost/ciamax/public/images/canteen_img/shop/shop_df_icon.jpg" alt="" >
                                </div>                    
                                <div class="uk-card-body smallest_font_size uk-padding-remove uk-margin-small-bottom">
                                    <h3 class="uk-card-title uk-text-small"><?=$store->name ?></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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
                                href="/ciamax/public/user/registrationForm"
                            >Create New Student</a>
                        </div>
                    </div>
                    <di class="uk-child-width-1-4 uk-grid-match" uk-grid>
                        <?php foreach($users as $user):?>
                            <div class="uk-card uk-card-hover uk-box-shadow-small" type="button">
                                <div class="uk-text-right">
                                    <span class='uk-margin-small-right' uk-icon="more" type="button"></span>
                                    <div uk-dropdown="mode:click" class="uk-padding-remove width_100">
                                        <ul class='uk-nav uk-dropdown-nav'>
                                            <li class="uk-background-default uk-text-center width_100">
                                                Update<span class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></span>
                                            </li>
                                            <li class="uk-background-secondary uk-text-center uk-text-danger width_100">
                                                Delete<span class="uk-icon-link uk-margin-small-right" uk-icon="trash"></span>
                                            </li>
                                        </ul>
                                    </div> 
                                </div>
                                <div class="uk-card-media-top" >
                                    <img src="http://localhost/ciamax/public/images/canteen_img/student/male_avatar.jpg"  alt="" class='uk-width-expand uk-height-small'>
                                </div>                    
                                <div class="uk-card-body uk-text-small uk-padding-remove uk-margin-small-bottom smallest_font_size">
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