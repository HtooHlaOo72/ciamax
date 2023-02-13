<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">Provide Meal</h3>
                            <?php if(isset($msg) and $msg){ ?>
                            <div class='uk-alert-success' uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?=$msg ?></p>
                            </div>
                            <?php } ?>
                            <form method="POST" action='' enctype='multipart/form-data'>
                                <div class="uk-margin uk-text-small" >
                                    <label for="roll_no">Student ID :</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                                        <input class="uk-input uk-form-large" type="text"  placeholder="uit-xxxx" name="history[roll_no]" value="" />
                                    </div>
                                </div>

                                <!-- <input type='hidden' name="history[storeId]" id='id' value='<?=isset($store)?$store->id:"" ?>' /> -->
                                
                                <div class="uk-margin uk-text-small">
                                    <label for="menuId">Menu</label>
                                    <select class="uk-select" aria-label="Select" name='history[menuId]' id='menuId'>
                                        <?php foreach($menus as $menu): ?>
                                            <option value=<?=$menu->id ?>>
                                                <?=$menu->name ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="uk-margin uk-text-small">
                                    <label for="menuId">Type</label>
                                    <select class="uk-select" aria-label="Select" name='history[type]' id='type'>
                                        <?php foreach($types as $type): ?>
                                            <option value=<?=$type ?>>
                                                <?=$type ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
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
