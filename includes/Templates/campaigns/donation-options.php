<div class="give-donor-dashboard-tab-content" id="give_kindness_manager-donation-options" data-tab-content="give_kindness_manager-donation-options">

   <div class="give-kindness-manager-ring"><div></div><div></div><div></div><div></div></div>
   
   <div class="give-donor-dashboard-heading"><?php echo __('Donation Option', 'give-kindness-manager'); ?></div>
   <div class="give-donor-dashboard-divider"></div>
   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_price_option" id="_give_price_option">
               <option value="multi"><?php echo __('Multi-level Donation', 'give-kindness-manager'); ?></option>
               <option value="set"><?php echo __('Set Donation', 'give-kindness-manager'); ?></option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Recurring Donations', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_recurring" id="_give_recurring">
            <option value="no"><?php echo __('Disabled - Not Recurring', 'give-kindness-manager'); ?></option>
            <option value="yes_donor"><?php echo __('Yes - Donor\'s Choice', 'give-kindness-manager'); ?></option>
            <option value="yes_admin"><?php echo __('Yes - Admin Defined', 'give-kindness-manager'); ?></option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Recurring Period', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_period_functionality" id="_give_period_functionality">
            <option value="donors_choice"><?php echo __('Donor\'s Choice', 'give-kindness-manager'); ?></option>
            <option value="admin_choice"><?php echo __(' Preset Period', 'give-kindness-manager'); ?></option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Recurring Options', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_period_interval" id="_give_period_interval">
            <option value="1" selected="selected">every</option>
            <option value="2">every 2nd</option>
            <option value="3">every 3rd</option>
            <option value="4">every 4th</option>
            <option value="5">every 5th</option>
            <option value="6">every 6th</option>
         </select>
         <select id="_give_period" name="_give_period" class="give-field give-period-field give-select">
	         <option value="day">day</option>
            <option value="week">week</option>
            <option value="month" selected="selected">month</option>
            <option value="quarter">quarter</option>
            <option value="year">year</option>
         </select>
         <select id="_give_times" name="_give_times" class="give-field give-billing-time-field give-select">
            <option value="0">Ongoing</option>
            <option value="2">2 months</option>
            <option value="3">3 months</option>
            <option value="4">4 months</option>
            <option value="5">5 months</option>
            <option value="6">6 months</option>
            <option value="7">7 months</option>
            <option value="8">8 months</option>
            <option value="9">9 months</option>
            <option value="10">10 months</option>
            <option value="11">11 months</option>
            <option value="12">12 months</option>
            <option value="13">13 months</option>
            <option value="14">14 months</option>
            <option value="15">15 months</option>
            <option value="16">16 months</option>
            <option value="17">17 months</option>
            <option value="18">18 months</option>
            <option value="19">19 months</option>
            <option value="20">20 months</option>
            <option value="21">21 months</option>
            <option value="22">22 months</option>
            <option value="23">23 months</option>
            <option value="24">24 months</option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Recurring Opt-in Checkbox Default', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_checkbox_default" id="_give_checkbox_default">
            <option value="yes"><?php echo __('Checked', 'give-kindness-manager'); ?></option>
            <option value="no"><?php echo __('Unchecked', 'give-kindness-manager'); ?></option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Set Donation', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <input type="number" name="_give_set_price" id="_give_set_price" value="">
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Custom Amount', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_checkbox_default" id="_give_checkbox_default">
            <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
            <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Donation Limit', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         Min Amount: <input type="number" name="_give_custom_amount_range[minimum]" id="_give_custom_amount_range_give_donation_limit_minimum" value="" placeholder="">
         <br>
         Max Amount: <input type="number" name="_give_custom_amount_range[maximum]" id="_give_custom_amount_range_give_donation_limit_maximum" value="" placeholder="">
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Custom Amount Text', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <input type="text" name="_give_custom_amount_text" id="_give_custom_amount_text" value="">
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control give_kindness_manager-inline-block">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Custom Prices', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <select name="_give_currency_price" id="_give_currency_price">
            <option value="enabled"><?php echo __('Enabled', 'give-kindness-manager'); ?></option>
            <option value="disabled"><?php echo __('Disabled', 'give-kindness-manager'); ?></option>
         </select>
      </div>
   </fieldset>

   <fieldset class="give-donor-dashboard-select-control">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Set Amount', 'give-kindness-manager'); ?></legend>
      <div class="give-donor-dashboard-select-control__option">
         <input type="number" name="_give_cs_custom_prices[PHP]" id="" value="" placeholder="">
         <br>
         <input type="number" name="_give_cs_custom_prices[IDR]" id="" value="" placeholder="">
      </div>
   </fieldset>

   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary give_kindness_manager-update-campaign" id="give_kindness_manager-update-campaign" data-campaign-id="">
      <?php echo __('Update', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>