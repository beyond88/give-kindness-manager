<div class="give-donor-dashboard-tab-content" id="give_kindness_manager-form-template" data-tab-content="give_kindness_manager-form-template">

    <div class="give-donor-dashboard-heading"><?php echo __('Available Form Templates', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
        <div class="give-donor-dashboard-select-control__option">
            <select name="form-type" id="form-type">
                <option value="multi-step"><?php echo __('Multi-Step Form', 'give-kindness-manager'); ?></option>
                <option value="classic"><?php echo __('Classic Form', 'give-kindness-manager'); ?></option>
                <option value="legacy"><?php echo __('Legacy Form', 'give-kindness-manager'); ?></option>
            </select>
        </div>
    </fieldset>

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
                <input name="sequoia[thank-you][headline]" id="header-label" type="text" placeholder="A great big thank you!">
            </div>
        </div>
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="description"><?php echo __('Description', 'give-kindness-manager'); ?></label>
            <div class="give-donor-dashboard-text-control__input">
                <?php 
                    $content = '';
                    $settings = array( 'textarea_name' => 'sequoia_thank-you_description', 'media_buttons' => false, 'drag_drop_upload' => false );
                    wp_editor( $content, 'sequoia_thank-you_description', $settings );
                ?>
            </div>
        </div>
    </fieldset>


   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary give_kindness_manager-update-campaign" id="give_kindness_manager-update-campaign" data-campaign-id="">
      <?php echo __('Update', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>