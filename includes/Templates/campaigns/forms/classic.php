<div class="give-donor-classic-form">

    <div class="give-donor-dashboard-heading"><?php echo __('Introduction', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Include one step', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-radio-control__description">If enabled, a headline and description show for the first step of the donation process.</div>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[introduction][enabled]" id="introduction">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline">Headline</label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[introduction][headline]" id="introduction-headline" type="text">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="description">Description</label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[introduction][description]" id="introduction-description"></textarea>
            </div>
        </div>

        <div class="give-kindness-manager-media-items give-kindness-manager-hide" id="give-kindness-manager-media-items">
        <!--
            Image or file upload here
        --->
        </div> 

        <div class="give-donor-dashboard-field-row">
            <div class="give-donor-dashboard-text-control">
                <form id="gkm-medical-document-upload-form" class="gkm-uploader">
                    <label for="gkm-medical-document-upload" id="gkm-file-drag">
                        <div id="gkm-start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>
                                <?php echo __( 'Select a file or drag here', 'give-kindness' ); ?>
                            </div>
                            <span id="sequoia[introduction][image]" class="gkm-btn btn-primary"><?php echo __( 'Select a file', 'give-kindness' ); ?></span>
                        </div>
                    </label>
                </form>
            </div>
        </div>

        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="donate_label">Donate Button</label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[introduction][donate_label]" id="donate_label" type="text">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Payment Amount', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Header Label', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_amount][header_label]" id="header-label" type="text">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="description"><?php echo __('Content', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[payment_amount][content]" id="description"></textarea>
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Continue Button', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_amount][next_label]" id="header-label" type="text" placeholder="Continue Button">
            </div>
        </div>
    </fieldset>   
    
    <div class="give-donor-dashboard-heading"><?php echo __('Payment Information', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Header Label', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][header_label]" id="header-label" type="text">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Headline', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][header_label]" id="header-label" type="text" placeholder="Who's giving today?">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="description"><?php echo __('Description', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[payment_information][description]" id="description"></textarea>
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Submit Button', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][checkout_label]" id="submit-button" type="text" placeholder="Submit Button">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Thank You', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Headline', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_receipt][headline]" id="header-label" type="text" placeholder="A great big thank you!">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="description"><?php echo __('Description', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="classic[donation_receipt][description]" id="description"></textarea>
            </div>
        </div>

        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Sharing Sharing', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <select name="classic[donation_receipt][social_sharing]" id="classic[donation_receipt][social_sharing]">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>

        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Sharing Instruction', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_receipt][sharing_instructions]" id="header-label" type="text" placeholder="Who's giving today?">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline"><?php echo __('Sharing Instruction', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_receipt][twitter_message]" id="header-label" type="text" placeholder="Who's giving today?">
            </div>
        </div>
    </fieldset>

</div>