<div class="give-donor-dashboard-tab-content" id="give_kindness_manager-campaign-settings" data-tab-content="give_kindness_manager-campaign-settings">

    <div class="give-donor-dashboard-heading"><?php echo __('Status', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
        <div class="give-donor-dashboard-select-control__option">
            <select name="form-status" id="form-status">
                <option value="publish"><?php echo __('Published', 'give-kindness-manager'); ?></option>
                <option value="pending"><?php echo __('Pending Review', 'give-kindness-manager'); ?></option>
                <option value="draft"><?php echo __('Draft', 'give-kindness-manager'); ?></option>
                <option value="approved"><?php echo __('Approved', 'give-kindness-manager'); ?></option>
                <option value="suspend"><?php echo __('Suspend', 'give-kindness-manager'); ?></option>
                <option value="reject"><?php echo __('Cancel', 'give-kindness-manager'); ?></option>
            </select>
        </div>
    </fieldset>

    <div class="give-donor-dashboard-heading"><?php echo __('Form Category', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-divider"></div>
    <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
        <div class="give-donor-dashboard-select-control__option">
            <?php 
                $args = array(
                'taxonomy' => 'give_forms_category',
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty' => 0,
                'pad_counts' => true
                );

                $give_forms_category = get_categories($args);
            ?>
            <select name="form-type" id="form-type">
                <?php foreach( $give_forms_category as $cat ): ?>
                <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>

    <div class="give-kindness-manager-media-items give-kindness-manager-hide" id="give-kindness-manager-feature-image">
    <!--
        Image or file upload here
    --->
    </div> 

    <div class="give-donor-dashboard-heading"><?php echo __('Feature Image', 'give-kindness-manager'); ?></div>
    <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control">
            <form id="gkm-medical-document-upload-form" class="gkm-uploader">
                <label for="gkm-medical-document-upload" id="gkm-file-drag">
                    <div id="gkm-start">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <div>
                            <?php echo __( 'Select a file or drag here', 'give-kindness-manager' ); ?>
                        </div>
                        <span id="sequoia[introduction][image]" class="gkm-btn btn-primary"><?php echo __( 'Select a file', 'give-kindness' ); ?></span>
                    </div>
                </label>
            </form>
        </div>
    </div>

   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give_kindness_manager-update-campaign" data-campaign-id="">
      <?php echo __('Update', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>