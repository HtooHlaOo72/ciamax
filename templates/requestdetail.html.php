<?php 
    $store = $request->getStore();
    $user  = $request->getUser();
    $status = "pending";
    if($request->is_accepted){
        $status = "accepted";
    }else if($request->is_rejected){
        $status = "rejected";
    }
    $isReqOwner = $store->id == $logStore->id;
?>
<div class='uk-margin-small-top'>
    <h2 class='uk-text-center uk-text-bolder'>Request Detail</h2>
    <div id='info' class='uk-text-center'>
        <p>
            Requested from : <strong><?=$user->name ?>(<?=$user->id ?>)</strong>
        </p>
        <p>
            Requested in : <strong><?=$request->date ?></strong>
        </p>
        <p>
            Requested to : <strong><?=$store->name ?></strong>
        </p>
        <p>
            Requested days : <strong><?=$request->days ?> days(<?=$request->days*2 ?> meals)</strong>
        </p>
        <p>
            Status : <strong><?=$status ?></strong>
        </p>
       
        <p>
            Transferred Amount : <strong><?=$request->amount ?></strong>
        </p>
        <p>
            Transaction ID : <strong><?=$request->transaction_id ?></strong>
        </p>
        <p>
            <span>KPAY Transaction Screenshot : </span>
            <a class="" href="#modal-media-image" uk-toggle>
                <img src="/ciamax/public/<?=$request->kpay_ss ?>" alt="" class='uk-height-small uk-width-small uk-border-rounded'>
            </a>
            <div id="modal-media-image" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                    <img src="/ciamax/public/<?=$request->kpay_ss?>" width="400" height="750" alt="">
                </div>
            </div>
            
        </p>
        <?php if($isReqOwner): ?>
        <p>
            <form
                action="/ciamax/public/store/validaterequest"
                method="POST"
                id='acceptReq'
                class='uk-display-inline'   
            >
                <input type='hidden' name='id' value="<?=$request->id??'d' ?>" />
                <input type='hidden' name="action" value="is_accepted" />
                <input type='submit' <?=($request->is_accepted or $request->is_rejected)?'disabled':'' ?> value="Accept" class='uk-button uk-button-small uk-button-primary' style='width:100px;'  />
            </form>
            <form
                action="/ciamax/public/store/validaterequest"
                method="POST"
                id='rejectReq'
                class='uk-display-inline'
            >
                <input type='hidden' name='id' value="<?=$request->id??'d' ?>"/>
                <input type='hidden' name="action" value="is_rejected" />
                <input type='submit' <?=($request->is_accepted or $request->is_rejected)?'disabled':"" ?> value="Reject" class='uk-button uk-button-small uk-button-danger' style='width:100px;'/>
            </form>
        </p>
        <?php endif ?>
    </div>
</div>