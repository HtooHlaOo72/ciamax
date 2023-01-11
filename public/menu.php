<!DOCTYPE html>
<html>
	<head>
		<title>v.je server is running</title>
		<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/css/uikit.min.css" />
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
        <div class="">
            <div class="uk-child-width-1-2@m uk-grid-column-small uk-margin-small-left uk-margin-small-right" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-border-rounded">
                        <div class="uk-card-media-top">
                            <img src="images/canteen_img/c1.jpg" width="1800" height="1200" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Media Top</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-border-rounded">
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Media Bottom</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="uk-card-media-bottom">
                            <img src="images/canteen_img/c2.jpg" width="1800" height="1200" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="uk-child-width-1-2@m" uk-grid>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="images/canteen_img/c3.jpg" width="1800" height="1200" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Media Top</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Media Bottom</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="uk-card-media-bottom">
                            <img src="images/canteen_img/c4.jpg" width="1800" height="1200" alt="">
                        </div>
                        
                    </div>
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
