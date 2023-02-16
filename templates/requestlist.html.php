<div class='uk-container' style='min-width:90vh;'>
<h3 class='uk-h3'><span style='text-decoration:underline;'>Requests</span></h3>
<table class="uk-table uk-table-justify uk-table-divider">
    <thead>
        <tr>
            <th class="uk-width-small">Member</th>
            <!-- <th>No of Days</th> -->
            <th>Requested In</th>
            <!-- <th>Transferred Amount</th> -->
            <!-- <th>Transaction ID</th> -->
            <th>Status</th>
            <th>Action</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requests as $request): ?>
        <tr>
            <td>
                <?php 
                    $user=$request->getUser();
                    echo "$user->name($user->id)";
                ?>
            </td>
            <!-- <td><?=$request->days??0 ?></td> -->
            <td><?=$request->date??date_format(new DateTime,"M-d-Y H:i") ?></td>
            <!-- <td><?=$request->amount??0 ?></td> -->
            <!-- <td><?=$request->transaction_id??"<span class='uk-text-danger'>empty</span>" ?></td> -->
            <td>
                <?php 
                    $status="pending";
                    if($request->is_accepted){
                        $status="accepted";
                    }else if($request->is_rejected){
                        $status='rejected';
                    }
                    echo $status;
                ?>
            </td>
            
            <td>
                <form
                    action=""
                    method="POST"
                    id='acceptReq'
                    class='uk-display-inline'
                >
                    <input type='hidden' name='id' value="<?=$request->id??'d' ?>" />
                    <input type='hidden' name="action" value="is_accepted" />
                    <input type='submit' <?=($request->is_accepted or $request->is_rejected)?'disabled':'' ?> value="Accept" class='uk-button uk-button-small uk-button-primary' style='width:100px;'  />
                </form>
                <form
                    action=""
                    method="POST"
                    id='rejectReq'
                    class='uk-display-inline'
                >
                    <input type='hidden' name='id' value="<?=$request->id??'d' ?>"/>
                    <input type='hidden' name="action" value="is_rejected" />
                    <input type='submit' <?=($request->is_accepted or $request->is_rejected)?'disabled':"" ?> value="Reject" class='uk-button uk-button-small uk-button-danger' style='width:100px;'/>
                </form>
            </td>
            <td><a href="/ciamax/public/store/requestdetail/<?=$request->id?>" class='uk-button uk-button-small uk-button-secondary'>Detail</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>