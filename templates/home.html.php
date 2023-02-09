<div class="uk-responsive-height">
        <main class="uk-height-large uk-width-expand uk-background-cover uk-inline" data-src="/images/banner.jpg" uk-img>
            <div class="uk-overlay uk-dark uk-position-center normal_opacity ">
                <h4 class="text_white uk-text-bolder">A solution for our environment</h4>
                <p class="uk-text-bold text_white" >Please be sure to join</p>
                <a class="uk-button uk-button-secondary text_white">Register Here</a>
            </div>
        </main>
        <section class="uk-responsive-height uk-height-medium@s uk-width-expand uk-text-left uk-margin-medium-top">
            <h3 class="uk-margin-small-left uk-margin-small-right uk-border small_title text_white"></h3>
            <div class="uk-child-width-1-2@s uk-height-max-large " uk-grid>
                <div>
                    <div class="uk-light uk-background-secondary uk-padding">
                        <h3 class="" >Contact us to join as a store owner</h3>
                        <p>Sell your best services to students</p>
                        <a class="uk-button uk-button-default" href="/user/contact_us">Join</a>
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
        <h3 class="small_title uk-margin-small-left text_white">Stores</h3>
        <div class="uk-child-width-1-1@s uk-text-center">
            <div class="uk-position-relative uk-visible-toggle uk-light uk-height-medium" tabindex="-1" uk-slider="center: true">
                <ul class="uk-slider-items uk-grid uk-grid-match" uk-height-viewport="offset-top: true; offset-bottom: 30">
                    <?php foreach($stores as $store):?>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="/ciamax/public/<?=$store->img??'images/canteen_img/shop/store_default.jpg' ?>" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1><?=$store->name ?></h1></div>
                        </div>
                    </li>
                    <?php endforeach ?>
                    <!-- <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="/images/canteen_img/c2.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>2</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="/images/canteen_img/c3.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>3</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="/images/canteen_img/c4.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>4</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="/images/canteen_img/c5.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>5</h1></div>
                        </div>
                    </li> -->

                </ul>
                <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
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
        <a class="uk-button uk-button-default uk-align-center uk-width-small text_white">See More</a>
    </div>
    <hr/>
    <div class="uk-margin-medium-top">
        <h3 class="small_title uk-text-center text_white" id="contact_us">Contact Us</h3>
        <div class="uk-container uk-flex uk-flex-center uk-margin-medium-top">
            <div class="uk-width-3-4 ">
                <form class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="text" placeholder="Full name*" required>
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="text" placeholder="Email*" required>
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="text" placeholder="Subject*" required>
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="number" placeholder="Mobile number*" required>
                    </div>
                    <div class="uk-width-1">
                        <textarea class="uk-textarea" rows="5" placeholder="Message*" required></textarea>
                    </div>
                </form>
                <button class="uk-button uk-button-secondary uk-margin-small-top ">Send</button>
            </div>
        </div>
    </div>