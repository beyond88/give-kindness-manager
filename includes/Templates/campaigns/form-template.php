<div class="give-donor-dashboard-tab-content" id="give_kindness_manager-form-template" data-tab-content="give_kindness_manager-form-template">

    <div class="give-donor-dashboard-heading"><?php echo __('Available Form Templates', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control give_kindness_manager-inline-block">
        <div class="give-donor-dashboard-radio-control__option">
            <input type="radio" name="template-type" id="0" value="0">
            <label for="0">
                <?php echo __('Multi-Step Form', 'give-kindness-manager'); ?>
            </label>
        </div>
        <div class="give-donor-dashboard-radio-control__option">
            <input type="radio" name="template-type" id="1" value="1">
            <label for="1">
                <?php echo __('Classic Form', 'give-kindness-manager'); ?>
            </label>
        </div>
        <div class="give-donor-dashboard-radio-control__option">
            <input type="radio" name="template-type" id="2" value="2">
            <label for="1">
                <?php echo __('Legacy Form', 'give-kindness-manager'); ?>
            </label>
        </div>
    </fieldset>


    <div class="give-donor-dashboard-heading"><?php echo __('Introduction', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-radio-control">
        <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Include one step', 'give-kindness-manager'); ?></legend>
        <div class="give-donor-dashboard-radio-control__description">If enabled, a headline and description show for the first step of the donation process.</div>
        <div class="give_kindness_manager-inline-block">
            <div class="give-donor-dashboard-radio-control__option">
                <input type="radio" name="sequoia[introduction][enabled]" value="enabled">
                <label for="0">
                    <?php echo __('Enabled', 'give-kindness-manager'); ?>
                </label>
            </div>
            <div class="give-donor-dashboard-radio-control__option">
                <input type="radio" name="sequoia[introduction][enabled]" value="disabled">
                <label for="1">
                    <?php echo __('Disabled', 'give-kindness-manager'); ?>
                </label>
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="headline">Headline</label>
            <div class="give-donor-dashboard-text-control__input">
                <input name="sequoia[introduction][headline]" id="headline" type="text">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="description">Description</label>
            <div class="give-donor-dashboard-text-control__input">
                <textarea name="sequoia[introduction][description]" id="description"></textarea>
            </div>
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



   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give_kindness_manager-update-campaign" data-campaign-id="">
      <?php echo __('Update', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>