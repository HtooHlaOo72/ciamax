<div class='uk-grid uk-child-width-1-2'
    style='min-height:95vh;'
uk-grid>
    
    <div>
        <?php if($user->img):?>
            <p>
                <img src="http://localhost/ciamax/public/<?=$user->img ?>" alt="" 
                                class='uk-height-small uk-width-small uk-border-circle'>
            </p>
        <?php endif ?>
        
        <h1><?=$user->name ?></h1>
        <p>
            <?=$user->email??"empty" ?>
        </p>
        <p>
            <?=$user->isMember()?"<span class='uk-text-success'>Member</span>":"<span class='uk-text-danger'>Not Member</span><a href='/ciamax/public/member/request' class='uk-button uk-button-success uk-button-small' >Join Membership</a>" ?>
        </p>
        <?php if($user->isMember()): ?>
            <?php 
                $member = $user->getMember();    
            ?>
            <p>
                Subscribed in <?=$member->getStore()->name ?>
            </p>
            <p>
                <?=$member->roll_no ?>
            </p>
            <p>
                Total times left : <?=$member->left_times ?>
            </p>
        <?php endif ?>
        <?php if($user->id == $logUser->id):?>
            <a class='uk-button uk-button-small uk-button-default' href='/ciamax/public/user/changeinfo'>Change Info</a>
        <?php endif ?>
    </div>
    <div>
        
        <?php if($user->isMember()): ?>
            <?php 
            $member = $user->getMember();
            $histories = $member->getHistory();
            ?>
            <?php foreach($histories as $history):?>
                <div class=''>
                    <p><?=$history->getMenu()->name ?></p>
                    <p><?=$history->date ?></p>
                    <p><?=$history->status ?></p>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>