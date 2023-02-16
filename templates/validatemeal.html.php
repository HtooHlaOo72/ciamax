<div class='uk-container' style='min-width:90vh;'>
<h3 class='uk-h3'><span style='text-decoration:underline;'>Meal Requests</span></h3>


<table class="uk-table uk-table-justify uk-table-divider">
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
            <th>Action</th>
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
            <td>
            <form
                    action="/ciamax/public/member/validatemeal"
                    method="POST"
                    id='acceptMeal'
                    class='uk-display-inline'
                >
                    <input type='hidden' name='id' value="<?=$meal->id??'' ?>" />
                    <input type='hidden' name="status" value="accepted" />
                    <input type='submit' <?=($meal->status=='accepted' or $meal->status=='rejected')?'disabled':'' ?> value="Accept" class='uk-button uk-button-small uk-button-primary' style='width:100px;'  />
                </form>
                <form
                    action="/ciamax/public/member/validatemeal"
                    method="POST"
                    id='rejectMeal'
                    class='uk-display-inline'
                >
                    <input type='hidden' name='id' value="<?=$meal->id??'' ?>"/>
                    <input type='hidden' name="status" value="rejected" />
                    <input type='submit' <?=($meal->status=='rejected' or $meal->status == "accepted")?'disabled':"" ?> value="Reject" class='uk-button uk-button-small uk-button-danger' style='width:100px;'/>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>