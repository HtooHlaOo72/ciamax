<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">Membership Request</h3>
                            <form method="POST" action='' enctype='multipart/form-data'>
                                <div class="uk-margin uk-text-small" >
                                    <label for="roll_no">Student ID :</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                                        <input class="uk-input uk-form-large" type="text"  placeholder="UIT-xxxx" name="req[roll_no]" value="<?=isset($req->roll_no)?$user->name : '' ?>" />
                                    </div>
                                </div>
                                <input type='hidden' name="req[userId]" id='id' value='<?=isset($user)?$user->id:"" ?>' />
                                
                                <div class="uk-margin uk-text-small">
                                    <label for="days">Number of days</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: star"></span>
                                        <input class="uk-input uk-form-large" type="number" placeholder="example@gmail.com" name="req[days]" id='days' value='<?=isset($req->days)?$req->days :30 ?>' />
                                    </div>
                                </div>
                                
                                <div class="uk-margin uk-text-small">
                                    <label for="storeId">Store</label>
                                    <select class="uk-select" aria-label="Select" name='req[storeId]' id='storeId'>
                                        <?php foreach($stores as $store): ?>
                                            <option value=<?=$store->id ?>>
                                                <?=$store->name ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="uk-margin uk-text-small">
                                    <label for="amount">Transaction ID</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: star"></span>
                                        <input class="uk-input uk-form-large" type="number" placeholder="Transaction ID" name="req[transaction_id]" id='amount' value='<?=isset($req->amount)?$req->amount :"" ?>' />
                                    </div>
                                </div>
                                <div class="uk-margin uk-text-small">
                                    <div class="uk-inline uk-width-1-1">
                                        <label class='uk-form-label' for='kpay_ss'>KPAY Transaction Screenshot</label>
                                        <div class="js-upload" uk-form-custom>
                                            <input type="file" name='kpay_ss' id='kpay_ss'>
                                            <button class="uk-button uk-button-default" type="button" tabindex="-1"><?=isset($req->kpay_ss)?"Select New":"Select" ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin uk-text-small">
                                    <label for="amount">Transferred Amount</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: star"></span>
                                        <input class="uk-input uk-form-large" type="number" placeholder="Transferred amount" name="req[amount]" id='amount' value=<?=isset($req->amount)?$req->amount :"" ?> >
                                    </div>
                                </div>
                                <div class="uk-margin uk-text-small">
                                    <p><strong id='total'>Total Cost : 0</strong></p>
                                </div>
                                <div class="uk-margin uk-text-small">
                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type='submit'>Submit</button>
                                </div>   
                            </form>
                            <div>
                                <?php if(!empty($errors)): ?>
                                    <?php foreach ($errors as $error): ?>
                                    <div class='uk-alert uk-alert-danger'>
                                        <?=$error ?>
                                    </div>
                                    <?php endforeach ?>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type='text/javascript'>
        if(document.readyState='loading'){
            console.log("Loading",days.value);
            days=document.getElementById('days');
            totalTag=document.getElementById('total');
            totalTag.innerText="Total : "+(2800*days.value);
            days.oninput=(e)=>{
                totalTag.innerText="Total : "+(2800*days.value);
            };
        }
</script>