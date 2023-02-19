<div class='uk-grid uk-child-width-1-1 uk-grid-divider'
    style='min-height:95vh;'
uk-grid>
    
    <div class='uk-text-center'>
        <?php if($user->img):?>
            <p>
                <img src="/ciamax/public/<?=$user->img ?>" alt="" 
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
    <div class='uk-padding-small-left uk-padding-small-right'>
        
        <?php if($user->isMember()): ?>
            <?php 
            $member = $user->getMember();
            $histories = $member->getHistory();
            ?>
            <h3>Meal History</h3>
           <table class="uk-table uk-table-justify uk-table-divider uk-text-small">
                <thead>
                    <tr>
                        <th class="uk-width-small">Type</th>
                        <!-- <th>No of Days</th> -->
                        <th>Date</th>
                        <!-- <th>Transferred Amount</th> -->
                        <!-- <th>Transaction ID</th> -->
                        <th>Status</th>
                        <th>Menu</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($histories as $meal): ?>
                    <tr>
                        <td>
                            <?=
                                $meal->type??"<span class='uk-text-danger'>empty</span>"
                            ?>
                        </td>
                        <td><?=$meal->date??"<span class='uk-text-danger'>emty</span>" ?></td>
                        <td><?=$meal->status??"<span class='uk-text-danger'>emty</span>" ?></td>
                        <td><?=$meal->getMenu()->name??"<span class='uk-text-danger'>emty</span>" ?></td>
                        <td><a href="/ciamax/public/member/historydetail/<?=$meal->id ?>" class='uk-button uk-button-small uk-button-default'>Detail</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>