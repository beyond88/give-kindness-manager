<style>
    #wp-give_kindness_verify_link_content-wrap,
    #wp-give_kindness_trust_safety-wrap,
    #wp-give_kindness_guarantee-wrap,
    #wp-give_kindness_verify_details-wrap,
    #wp-give_kindness_boosting-wrap,
    #wp-give_kindness_boosting_popup-wrap{
        width: 100%;
    }
</style>
<?php 
    $defualt = give_get_default_settings();
    $give_settings = get_option('give_settings');
?>

<div id="give_kindness_manager-settings" id="give_kindness_manager-settings" data-tab-content="give_kindness_manager-settings" style="display:none;">

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gkm-campaign-name" style="font-weight: 700;">
                <?php echo __('Verified short', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = $give_settings['give_kindness_verify_link_content'];
                    $settings = array( 'textarea_name' => 'give_kindness_verify_link_content', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'give_kindness_verify_link_content', $settings );
                ?>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gk-fundraising-target" style="font-weight: 700;">
                <?php echo __('Trust and safety', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = $give_settings['give_kindness_trust_safety'];
                    $settings = array( 'textarea_name' => 'give_kindness_trust_safety', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'give_kindness_trust_safety', $settings );
                ?>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gk-fundraising-target" style="font-weight: 700;">
                <?php echo __('Giving guarantee', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = $give_settings['give_kindness_guarantee'];
                    $settings = array( 'textarea_name' => 'give_kindness_guarantee', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'give_kindness_guarantee', $settings );
                ?>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gk-fundraising-target" style="font-weight: 700;">
                <?php echo __('Verified details', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = $give_settings['give_kindness_verify_details'];
                    $settings = array( 'textarea_name' => 'give_kindness_verify_details', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'give_kindness_verify_details', $settings );
                ?>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gk-fundraising-target" style="font-weight: 700;">
                <?php echo __('Boosting', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = $give_settings['give_kindness_boosting'];
                    $settings = array( 'textarea_name' => 'give_kindness_boosting', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'give_kindness_boosting', $settings );
                ?>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gk-fundraising-target" style="font-weight: 700;">
                <?php echo __('Boosting popup content', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = $give_settings['give_kindness_boosting_popup'];
                    $settings = array( 'textarea_name' => 'give_kindness_boosting_popup', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'give_kindness_boosting_popup', $settings );
                ?>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row" style="margin-bottom: 40px;">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gk-fundraising-target" style="font-weight: 700;">
                
            </label>
            <div class="give-donor-dashboard-text-control__input" style="border: 1px solid transparent !important;">
                <button type="button" name="give-kindness-manager-update-settings" id="give-kindness-manager-update-settings" class="give-donor-dashboard-button give-donor-dashboard-button--primary give-kindness-manager-update-settings">
                    <?php echo __('Update','give-kindness-manager'); ?>
                </button>
            </div>
        </div>
    </div>

</div>