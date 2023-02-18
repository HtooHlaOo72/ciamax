<div class='uk-container' style="min-height:95vh;">
    <h2>History Detail</h2>
    <?php 
        $member=$history->getMember()[0];
        $user = $history->getMember()[0]->getUser();
        $menu = $history->getMenu();
    ?>
    <div>
        <div id='member'>
            <p>
                <img src="http://localhost/ciamax/public/<?=$user->img ?>" alt="" 
                                class='uk-height-small uk-width-small uk-border-circle'>
            </p>
            <p>
                <?=$history->getMember()[0]->getUser()->name ?>
            </p>
            <p>
                <?=$history->getMember()[0]->roll_no ?>
            </p>
        </div>
        <div id="menu">
            <span><?=$menu->name ?></span>
            <p><?=$history->type ?></p>
            <p>
                <img src="http://localhost/ciamax/public/<?=$menu->img ?>" alt="" 
                                class='uk-height-small uk-width-small uk-border-circle'>
            </p>
        </div>
        <div id="action">
           <p><?=$history->status ?></p>
           <div>
           <form
                    action="/ciamax/public/member/validatemeal"
                    method="POST"
                    id='acceptMeal'
                    class='uk-display-inline'
                >
                    <input type='hidden' name='id' value="<?=$history->id??'' ?>" />
                    <input type='hidden' name="status" value="accepted" />
                    <input type='submit' <?=($history->status=='accepted' or $history->status=='rejected')?'disabled':'' ?> <?=($member->canAccceptMeal())?"":"disabled" ?> value="Accept" class='uk-button uk-button-small uk-button-primary' style='width:100px;'  />
                </form>
                <form
                    action="/ciamax/public/member/validatemeal"
                    method="POST"
                    id='rejectMeal'
                    class='uk-display-inline'
                >
                    <input type='hidden' name='id' value="<?=$history->id??'' ?>"/>
                    <input type='hidden' name="status" value="rejected" />
                    <input type='submit' <?=($history->status=='rejected' or $history->status == "accepted")?'disabled':"" ?> <?=($member->canAccceptMeal())?"":"disabled" ?> value="Reject" class='uk-button uk-button-small uk-button-danger' style='width:100px;'/>
                </form>
           </div>
        </div>
        
    </div>
</div>