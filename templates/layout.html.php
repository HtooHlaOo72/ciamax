<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/css/uikit.min.css" />
	    <link rel="stylesheet" href="/ciamax/public/style/style.css" />
        <script src="uikit/dist/js/uikit-icons.min.js"></script>
        <style>
    ::placeholder{
        color:#000;
    }
    .card:hover{
        background-color:#fff;
        color:#000
    }
    .card{
        background-color:#034250;
        color:#fff;
        max-width:250px;
        border-top: 5px solid #2d7484;
        border-bottom:5px solid #2d7484;
        border-radius:5px;
    }
    .subnav-pill > * > :first-child {
  padding: 5px 10px;
  background-color: #034250;
  color: #fff;
}
/* Hover */
.subnav-pill > * > a:hover {
  background-color: #f8f8f8;
  color: #000;
}
/* OnClick */
.subnav-pill > * > a:active {
  background-color: #f8f8f8;
  color: #000;
}
/* Active */
.subnav-pill > .uk-active > a {
  background-color: #1e87f0;
  color: #fff;
}
</style>
    </head>
	<body>
    <header class="">
        <!-- Main Navbar -->
        <nav class="uk-container uk-navbar" style="background-color:#2d7484;">
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active ">
                        <a href="/ciamax/public/user/list" style='color:#fff;'><strong class="logo_text">Ciamax</strong></a>
                    </li>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@s">
                    <li><a class="uk-text-large" href="/ciamax/public/user/home"style='color:#fff;'>Home</a></li>
                    <li><a class="uk-text-large" href="/ciamax/public/store/list"style='color:#fff;'>Stores</a></li>
                    <li><a class="uk-text-large" href="/ciamax/public/menu/list"style='color:#fff;'>Menus</span></a></li>
                    <li>
                        <a class="uk-text-large" href="/ciamax/public/login/login" style='color:#fff;'><?=(!empty($profile->name))?$profile->name." ($role) " :"Login"; ?></a>
                        <div uk-dropdown="pos: bottom-right; boundary: !.boundary; shift: false; flip: false">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#">Profile</a></li>
                                <li><a href="#">Log out</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
                <a href="#" class="uk-navbar-toggle uk-hidden@s" uk-navbar-toggle-icon uk-toggle="target: #sidenav"></a>
            </div>
        </nav>
    </header>
    <div id="sidenav" uk-offcanvas="flip: true" class="uk-offcanvas" style="background-color:#2d7484;">
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
    <footer class="uk-text-center uk-text-middle " style="background-color : #2d7484; color : #FFF">
        Copy Right©uit.edu.mm
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.18/dist/js/uikit-icons.min.js"></script>
    </body>
</html>