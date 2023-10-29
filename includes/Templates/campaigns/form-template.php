<div class="give-donor-dashboard-tab-content" id="give_kindness_manager-form-template" data-tab-content="give_kindness_manager-form-template">

    <div class="give-donor-dashboard-heading"><?php echo __('Available Form Templates', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
        <div class="give-donor-dashboard-select-control__option">
            <select name="gkm-form-type" id="gkm-form-type">
                <option value="sequoia"><?php echo __('Multi-Step Form', 'give-kindness-manager'); ?></option>
                <option value="classic"><?php echo __('Classic Form', 'give-kindness-manager'); ?></option>
                <option value="legacy"><?php echo __('Legacy Form', 'give-kindness-manager'); ?></option>
            </select>
        </div>
    </fieldset>

    <?php 
        // echo "<pre>";
        // print_r(give_get_meta( 9231, '_give_sequoia_form_template_settings', true));
        // echo "</pre>";
    ?>

    <?php give_kindness_manager_templates_part( 'campaigns/forms/multi-step', NULL ); ?>
    <?php give_kindness_manager_templates_part( 'campaigns/forms/classic', NULL ); ?>
    <?php give_kindness_manager_templates_part( 'campaigns/forms/legacy', NULL ); ?>

   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary give_kindness_manager-update-campaign" id="give_kindness_manager-update-form-template" data-campaign-id="">
      <?php echo __('Update', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>