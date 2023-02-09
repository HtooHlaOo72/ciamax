<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/css/uikit.min.css" />
	    <link rel="stylesheet" href="/ciamax/public/style/style.css" />
        <script src="uikit/dist/js/uikit-icons.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@600&display=swap" rel="stylesheet">
    </head>
	<body>
    <header class="">
        <!-- Main Navbar -->
        <nav class="uk-container uk-navbar">
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active ">
                        <a href="/ciamax/public/user/list" ><strong class="logo_text">Ciamax</strong></a>
                    </li>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@s">
                    <li><a class="uk-text-large" href="/ciamax/public/user/home">Home</a></li>
                    <li><a class="uk-text-large" href="/ciamax/public/store/list">Stores</a></li>
                    <li><a class="uk-text-large" href="/ciamax/public/menu/list">Menus</span></a></li>
                    <li>
                        <a class="uk-text-large" href="/ciamax/public/login/login" style='color:blue;'><?=(!empty($profile->name))?$profile->name." ($role) " :"Login"; ?></a>
                        <div uk-dropdown="pos: bottom-right; boundary: !.boundary; shift: false; flip: false">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#">Profile</a></li>
                                <li><a href="/ciamax/public/login/logout">Log out</a></li>
                            </ul>
                        </div>
                    </li>

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
    <?=$output ?>
    <footer class="uk-text-center uk-text-middle uk-margin-small-top">
        Copy Right©uit.edu.mm
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/js/uikit-icons.min.js"></script>
    </body>
</html>