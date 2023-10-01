<div class="give-donor-classic-form">

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Container Style', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[visual_appearance][container_style]" id="container_style">
                    <option value="boxed"><?php echo __('Boxed', 'give-kindness-manager'); ?></option>
                    <option value="unboxed"><?php echo __('Unboxed', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Primary Font', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[visual_appearance][primary_font]" id="primary_font">
                    <option value="system">User's System Font</option>
                    <option value="Montserrat" selected="selected">Montserrat</option>
                    <option value="Roboto">Roboto</option>
                    <option value="Open Sans">Open Sans</option>
                    <option value="Lato">Lato</option>
                    <option value="Oswald">Oswald</option>
                    <option value="Source Sans Pro">Source Sans Pro</option>
                    <option value="Slabo 27px">Slabo 27px</option>
                    <option value="Raleway">Raleway</option>
                    <option value="PT Sans">PT Sans</option>
                    <option value="Noto Sans">Noto Sans</option>
                    <option value="Nunito Sans">Nunito Sans</option>
                    <option value="Prompt">Prompt</option>
                    <option value="Work Sans">Work Sans</option>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Display Header', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[visual_appearance][display_header]" id="display_header">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Secure Donation Badge', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[visual_appearance][secure_badge]" id="secure_badge">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Secure Donation Badge Text','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[visual_appearance][secure_badge_text]" id="secure_badge_text" type="text" placeholder="<?php echo __('100% Secure Donation','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <!-- <div class="give-donor-dashboard-heading"><?php echo __('Payment Amount', 'give-kindness-manager'); ?></div>
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
    </fieldset> -->

</div>