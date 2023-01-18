<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/css/uikit.min.css" />
	    <link rel="stylesheet" href="style/style.css" />
        <script src="uikit/dist/js/uikit-icons.min.js"></script>
    </head>
	<body>
    <header class="">
        <!-- Main Navbar -->
        <nav class="uk-container uk-navbar">
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active ">
                        <a href="/" ><strong class="logo_text">Ciamax</strong></a>
                    </li>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@s">
                    <li><a class="uk-text-large" href="/">Home</a></li>
                    <li><a class="uk-text-large" href="/menu.php">Courts</a></li>
                    <li><a class="uk-text-large" href="/menu.php">Dishes</span></a></li>
                    <li><a class="uk-text-large" href="/menu.php">Login</a></li>
                </ul>
                <a href="#" class="uk-navbar-toggle uk-hidden@s" uk-navbar-toggle-icon uk-toggle="target: #sidenav"></a>
            </div>
        </nav>
    </header>
    <div id="sidenav" uk-offcanvas="flip: true" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav">
                <li><a class="uk-text-large" href="/">Home</a></li>
                <li><a class="uk-text-large" href="/menu.php">Menu List</a></li>
                <li><a class="uk-text-large" href="/menu.php">Cart <span uk-icon="icon:cart"></span></a></li>
                <li><a class="uk-text-large" href="/menu.php">Login</a></li>
            </ul>
        </div>
    </div>
    <div class="uk-responsive-height">
        <main class="uk-height-large uk-width-expand uk-background-cover uk-inline" data-src="images/canteen.jpg" uk-img>
            <div class="uk-overlay uk-dark uk-position-center normal_opacity ">
                <h4 class="text-brown" uk-parallax="opacity: 1,0; y: 0,-100; scale:1,2; end: 50vh + 50%;">Digitalized Canteen Management System</h4>
                <p class="uk-text-secondary uk-text-bolder" uk-parallax="opacity: 1,0; y: 0,-100; scale:1,2; end: 50vh + 50%;">Easily accept orders and manage records</p>
                <button class="uk-button uk-button-secondary uk-text-lighter" uk-parallax="opacity: 101; y: 0,-100; scale: 1,2; end: 50vh + 50%;">Register Here</button>
            </div>
        </main>
        <section class="uk-responsive-height uk-height-medium@s uk-width-expand uk-text-left uk-margin-medium-top">
            <h3 class="uk-margin-small-left uk-margin-small-right uk-border small_title ">Features</h3>
            <div class="uk-child-width-1-2@s uk-height-max-large " uk-grid>
                <div>
                    <div class="uk-light uk-background-secondary uk-padding">
                        <h3>Join as Shop Owner</h3>
                        <p>Sell your best products to students</p>
                        <button class="uk-button uk-button-default">Join</button>
                    </div>
                </div>
                <div>
                    <div class="uk-dark uk-background-muted uk-padding">
                        <h3>Monthly Package</h3>
                        <p>Hostelers can join lunch and dinner package which is only <span>86800 MMK</span> per month</p>
                        <button class="uk-button uk-button-default">Join</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="uk-margin-medium-top">
        <h3 class="small_title uk-margin-small-left">Courts</h3>
        <div class="uk-child-width-1-1@s uk-text-center">
            <div class="uk-position-relative uk-visible-toggle uk-light uk-height-medium" tabindex="-1" uk-slider="center: true">
                <ul class="uk-slider-items uk-grid uk-grid-match" uk-height-viewport="offset-top: true; offset-bottom: 30">
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="images/canteen_img/c1.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>1</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="images/canteen_img/c2.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>2</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="images/canteen_img/c3.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>3</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="images/canteen_img/c4.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>4</h1></div>
                        </div>
                    </li>
                    <li class="uk-width-3-4 uk-height-medium">
                        <div class="uk-cover-container">
                            <img src="images/canteen_img/c5.jpg" alt="" uk-cover>
                            <div class="uk-position-center uk-panel"><h1>5</h1></div>
                        </div>
                    </li>

                </ul>
                <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </div>
    <div class="uk-margin-medium-top">
        <h3 class="small_title uk-margin-small-left">Foods</h3>
        <div class="uk-grid uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body ">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        <div class="uk-margin-small-top">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Media Top</h3>
                </div>
            </div>
        </div>
        </div>
        <a class="uk-button uk-button-default uk-align-center uk-width-small">See More</a>
    </div>
    <hr/>
    <div class="uk-margin-medium-top">
        <h3 class="small_title uk-text-center">Contact Us</h3>
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

    <footer class="uk-text-center uk-text-middle uk-margin-small-top">
        Copy Right©uit.edu.mm
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/js/uikit-icons.min.js"></script>
    </body>
</html>
