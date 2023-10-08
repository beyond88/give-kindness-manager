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

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Headline', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[introduction][headline]" id="gkm-introduction_headline" type="text" placeholder="<?php echo __('Flood program', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Description', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[introduction][description]" id="gkm-introduction_description" value="" placeholder="<?php echo __('Flood recovery program.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-kindness-manager-media-items give-kindness-manager-hide" id="give-kindness-manager-media-items">
        <!--
            Image or file upload here
        --->
        </div> 
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
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

    <fieldset class="give-donor-dashboard-radio-control">
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
                <input name="sequoia[payment_amount][header_label]" id="header_label" type="text" placeholder="<?php echo __('Choose Amount', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Content', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[payment_amount][content]" id="content" placeholder="<?php echo __('How much would you like to donate?', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Continue Button', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_amount][next_label]" id="next_label" type="text" placeholder="<?php echo __('Continue', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Payment Information', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Header Label', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][header_label]" id="header_label" type="text" placeholder="<?php echo __('Add Your Information', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Headline', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][headline]" id="headline" type="text" placeholder="<?php echo __('Who\'s giving today?', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Description', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[payment_information][description]" id="description" placeholder="<?php echo __('We’ll never share this information with anyone.', 'give-kindness-manager'); ?>"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Donation Summary', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[payment_information][donation_summary_enabled]" id="donation_summary_enabled">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Submit Button','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[payment_information][checkout_label]" id="checkout_label" type="text" placeholder="<?php echo __('Donate Now','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Thank You', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Headline', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[thank-you][headline]" id="headline" type="text" placeholder="<?php echo __('A great big thank you!', 'give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Description', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
                <?php
                    $content = '';
                    $settings = array( 'textarea_name' => 'sequoia_thank-you_description', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'sequoia_thank-you_description', $settings );
                ?>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Social Sharing', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="sequoia[thank-you][sharing]" id="sharing">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="sharing_instructions"><?php echo __('Sharing Instruction','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[thank-you][sharing_instruction]" id="sharing_instructions" type="text" placeholder="<?php echo __('Help spread the word by sharing your support with your friends and followers!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="twitter_message"><?php echo __('Twitter Message','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[thank-you][twitter_message]" id="twitter_message" type="text" placeholder="<?php echo __('Help spread the word by sharing your support with your friends and followers!','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>


</div>