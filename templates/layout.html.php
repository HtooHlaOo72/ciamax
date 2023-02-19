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

                    <?php foreach($urlList as $url_name=>$url): ?>
                        <?php if($url_name=="DropDown"){ ?>
                            <li class='uk-flex uk-flex-center'>
                                <button type='button' style='color:#fff; background-color:#2d7484;' class='uk-button uk-button-small'><?=!empty($drop_down_name)?$drop_down_name:"empty" ?></button>
                                <div uk-dropdown="pos: bottom-right; boundary: !.boundary; shift: false; flip: false">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <?php foreach($url['sub_url_list'] as $sub_name=>$sub_url): ?>
                                            
                                                <?php if(!$ownerNoStore or $roleNum==1 or $sub_name!="Profile"): ?>
                                                <li class=""><a href="/ciamax/public/<?=$sub_url??'user/home' ?>"><?=$sub_name??"empty" ?></a></li>
                                                <?php endif ?>
                                            
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </li>
                        <?php }else if($url_name=="Provide Meal" or $url_name == "Member Requests") { ?>
                            <?php if(!$ownerNoStore): ?>
                                <li><a class="uk-text-large" href="/ciamax/public/<?=$url??'user/home' ?>"style='color:#fff;'><?=$url_name??"empty" ?></a></li>
                            <?php endif ?>
                        <?php }else if($url_name=='History'){ ?>
                            <li><a class="uk-text-large" href="/ciamax/public/<?=$profile->isMember()?$url:"member/notmember" ?>"style='color:#fff;'><?=$url_name??"empty" ?></a></li>

                        <?php }else{ ?>
                            <li><a class="uk-text-large" href="/ciamax/public/<?=$url??'user/home' ?>"style='color:#fff;'><?=$url_name??"empty" ?></a></li>
                        <?php } ?>
                    <?php endforeach ?>
                    
                    <!-- <li><a class="uk-text-large" href="/ciamax/public/store/list"style='color:#fff;'>Stores</a></li>
                    <li><a class="uk-text-large" href="/ciamax/public/menu/list"style='color:#fff;'>Menus</span></a></li> -->                    
                    

                </ul>
                <a href="#" class="uk-navbar-toggle uk-hidden@s" uk-navbar-toggle-icon uk-toggle="target: #sidenav"></a>
            </div>
        </nav>
    </header>
    <div id="sidenav" uk-offcanvas="flip: true" class="uk-offcanvas" style="background-color:#2d7484;">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav">
                <?php foreach($urlList as $url_name=>$url): ?>
                    <?php if($url_name=='DropDown'){ ?>
                        <li>
                            <span><?=!empty($drop_down_name)?$drop_down_name:"empty" ?></span>
                            <ul style='list-style-type:none;'>
                                <?php foreach($url['sub_url_list'] as $sub_name=>$sub_url): ?>
                                <li>
                                    <a href="/ciamax/public/<?=$sub_url ?>"><?=$sub_name ?></a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php }else if($url_name=="History"){ ?>
                        <li><a class="uk-text-large" href="/ciamax/public/<?=$profile->isMember()?$url:"member/notmember" ?>"style='color:#fff;'><?=$url_name??"empty" ?></a></li>
                    <?php }else { ?>
                        <li><a class="uk-text-large" href="/ciamax/public/<?=$url ?>"><?=$url_name ?></a></li>
                    <?php }?>
                <?php endforeach ?>
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