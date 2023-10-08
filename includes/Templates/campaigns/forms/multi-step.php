<div class="give-donor-multi-step-form">

    <div class="give-kindness-manager-ring"><div></div><div></div><div></div><div></div></div>

    <div class="give-donor-dashboard-heading"><?php echo __('Visual Appearance', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Primary Font', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[visual_appearance][google-fonts]" id="gkm-google_fonts">
                    <option value="enabled"><?php echo __('Montserrat Google Font', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('User’s System Font', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Decimal amounts', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[visual_appearance][decimals_enabled]" id="gkm-decimals_enabled">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Introduction', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Include Step One', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[introduction][enabled]" id="gkm-introduction_enabled">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-introduction-item">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Headline', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[introduction][headline]" id="gkm-introduction_headline" type="text" placeholder="<?php echo __('Flood program', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-introduction-item">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Description', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[introduction][description]" id="gkm-introduction_description" value="" placeholder="<?php echo __('Flood recovery program.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-introduction-item">
        <div class="give-kindness-manager-media-items give-kindness-manager-hide" id="give-kindness-manager-media-items">
        <!--
            Image or file upload here
        --->
        </div> 
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-introduction-item">
        <div class="give-donor-dashboard-field-row">
            <div class="give-donor-dashboard-text-control">
                <form id="gkm-medical-document-upload-form" class="gkm-uploader">
                    <label for="gkm-medical-document-upload" id="gkm-file_drag">
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
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-introduction-item">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Donate Button', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[introduction][donate_label]" id="gkm-donate_label" type="text">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Payment Amount', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Header Label', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_amount][header_label]" id="gkm-payment_header_label" type="text" placeholder="<?php echo __('Choose Amount', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Content', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[payment_amount][content]" id="gkm-payment_content" placeholder="<?php echo __('How much would you like to donate?', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Continue Button', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_amount][next_label]" id="gkm-next_label" type="text" placeholder="<?php echo __('Continue', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Payment Information', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Header Label', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][header_label]" id="gkm-payment_info_header_label" type="text" placeholder="<?php echo __('Add Your Information', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Headline', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][headline]" id="gkm-payment_info_headline" type="text" placeholder="<?php echo __('Who\'s giving today?', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Description', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[payment_information][description]" id="gkm-payment_info_description" placeholder="<?php echo __('We’ll never share this information with anyone.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Donation Summary', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[payment_information][donation_summary_enabled]" id="gkm-donation_summary_enabled">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-donation-summary-item">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Summary Heading','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][donation_summary_heading]" id="gkm-donation_summary_heading" type="text" placeholder="<?php echo __('Here\'s what you\'re about to donate:','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-donation-summary-item">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Summary Location', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[payment_information][donation_summary_location]" id="gkm-donation_summary_location">
                    <option value="give_donation_form_user_info"><?php echo __('Before Payment Fields', 'give-kindness-manager'); ?></option>
                    <option value="give_donation_form_before_submit"><?php echo __('After Payment Fields', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-donation-summary-item">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Submit Button','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][checkout_label]" id="gkm-checkout_label" type="text" placeholder="<?php echo __('Donate Now','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Thank You', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Headline', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[thank-you][headline]" id="gkm-ty_headline" type="text" placeholder="<?php echo __('A great big thank you!', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Description', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <?php
                    $content = '';
                    $settings = array( 'textarea_name' => 'gkm-ty_description', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'gkm-ty_description', $settings );
                ?>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Social Sharing', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[thank-you][sharing]" id="gkm-ty_sharing">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-thank-you-item">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="sharing_instructions"><?php echo __('Sharing Instruction','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[thank-you][sharing_instruction]" id="gkm-ty_sharing_instructions" type="text" placeholder="<?php echo __('Help spread the word by sharing your support with your friends and followers!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control gkm-thank-you-item">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="twitter_message"><?php echo __('Twitter Message','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[thank-you][twitter_message]" id="gkm-ty_twitter_message" type="text" placeholder="<?php echo __('Help spread the word by sharing your support with your friends and followers!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

</div>