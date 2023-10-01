<div class="give-donor-legacy-form">

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Display Style', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="legacy[display_settings][display_style]" id="display_style">
                    <option value="buttons"><?php echo __('Buttons', 'give-kindness-manager'); ?></option>
                    <option value="radios"><?php echo __('Radios', 'give-kindness-manager'); ?></option>
                    <option value="dropdown"><?php echo __('Dropdown', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Display Options', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="legacy[display_settings][payment_display]" id="payment_display">
                    <option value="onpage"><?php echo __('All Fields', 'give-kindness-manager'); ?></option>
                    <option value="button"><?php echo __('Button', 'give-kindness-manager'); ?></option>
                    <option value="modal"><?php echo __('Modal', 'give-kindness-manager'); ?></option>
                    <option value="reveal"><?php echo __('Reveal', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Continue Button','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="legacy[display_settings][reveal_label]" id="reveal_label" type="text" placeholder="<?php echo __('Donate Now','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="continue"><?php echo __('Submit Button','give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="legacy[display_settings][checkout_label]" id="checkout_label" type="text" placeholder="<?php echo __('Donate Now','give-kindness-manager'); ?>">
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Floating Labels', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="legacy[display_settings][form_floating_labels]" id="form_floating_labels">
                    <option value="buttons"><?php echo __('Global Option', 'give-kindness-manager'); ?></option>
                    <option value="radios"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="dropdown"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Display Content', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="legacy[display_settings][display_content]" id="display_content">
                    <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
                    <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Content Placement', 'give-kindness-manager'); ?></legend>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-select-control__option">
                <select name="legacy[display_settings][content_placement]" id="display_content">
                    <option value="give_pre_form"><?php echo __('Above fields', 'give-kindness-manager'); ?></option>
                    <option value="give_post_form"><?php echo __('Below fields', 'give-kindness-manager'); ?></option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="give-donor-dashboard-radio-control">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="content"><?php echo __('Content', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = '';
                    $settings = array( 'textarea_name' => 'legacy_display_settings_form_content', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'legacy_display_settings_form_content', $settings );
                ?>
            </div>
        </div>
    </fieldset>

</div>