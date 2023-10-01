<div class="give-donor-classic-form">

    <div class="give-donor-dashboard-heading"><?php echo __('Visual Appearance', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

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

    <div class="give-donor-dashboard-heading"><?php echo __('Donation Amount', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Headline','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_amount][headline]" id="headline" type="text" placeholder="<?php echo __('How much would you like to donate today?','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Description','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="classic[donation_amount][description]" id="description"></textarea>
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Donor Information', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Headline','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donor_information][headline]" id="headline" type="text" placeholder="<?php echo __('Who\'s giving today?','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Description','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="classic[donor_information][description]" id="description" placeholder="<?php echo __('We’ll never share this information with anyone.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Payment Method', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Headline','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[payment_information][headline]" id="headline" type="text" placeholder="<?php echo __('How would you like to pay today?','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Description','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="classic[payment_information][description]" id="description" placeholder="<?php echo __('This donation is a secure and encrypted payment.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Donation Summary', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[payment_information][donation_summary_enabled]" id="donation_summary_enabled">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Summary Heading','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[payment_information][donation_summary_heading]" id="donation_summary_heading" type="text" placeholder="<?php echo __('Here\'s what you\'re about to donate:','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Summary Location', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[payment_information][donation_summary_location]" id="donation_summary_location">
                    <option value="give_donation_form_user_info"><?php echo __('Before Payment Fields', 'give-kindness-manager'); ?></option>
                    <option value="give_donation_form_before_submit"><?php echo __('After Payment Fields', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Payment Method', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Headline','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_receipt][headline]" id="headline" type="text" placeholder="<?php echo __('Hey {name}, thanks for your donation!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Description','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="classic[donation_receipt][description]" id="description" placeholder="<?php echo __('{name}, your contribution means a lot and will be put to good use in making a difference. We’ve sent your donation receipt to {donor_email}.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Social Sharing', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="classic[donation_receipt][social_sharing]" id="social_sharing">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Sharing Instruction','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_receipt][sharing_instructions]" id="sharing_instructions" type="text" placeholder="<?php echo __('Help spread the word by sharing your support with your friends and followers!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Twitter Message','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="classic[donation_receipt][twitter_message]" id="twitter_message" type="text" placeholder="<?php echo __('Help spread the word by sharing your support with your friends and followers!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

</div>