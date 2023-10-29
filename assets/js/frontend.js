(function($, window, document ) {
    'use strict';

  $( document ).ready(function() {

    /************************
     * 
     * Sidebar handle
     * 
     *********************** */
    $(".give-donor-dashboard-tab-link").click(function() {
      $(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
      $(this).addClass("give-donor-dashboard-tab-link--is-active");
      const targetTabContent = $(this).data('tab-id');
      $(".give-donor-dashboard-tab-link").each(function(index, item) {
        let currentTabContent = $(this).data('tab-id');
        if( typeof currentTabContent != "undefined" ){   
          if( currentTabContent === targetTabContent ) {
            $('#'+currentTabContent).show();
            $(this).addClass("give-donor-dashboard-tab-link--is-active");

            if( currentTabContent === 'give_kindness_manager-donation-options' || currentTabContent === 'give_kindness_manager-form-template' ) {
              let form_id = jQuery('.give_kindness_manager-update-campaign').attr('data-campaign-id');
              tab_ajax_call(form_id, currentTabContent);
            }

          } else {
            if( typeof targetTabContent !== "undefined") {
              $('#'+currentTabContent).hide();
            }
          }
        }
      });
    });

  });
  
  function tab_ajax_call(form_id, tab) {
    if( tab !='' ) {

      let hideLoader = false;
      showHideLoader('.give-donor-multi-step-form', hideLoader);
      showHideLoader('.give-donor-classic-form', hideLoader);
      showHideLoader('.give-donor-legacy-form', hideLoader);
      showHideLoader('#give_kindness_manager-donation-options', hideLoader);

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: give_kindness_manager.ajax_url,
        data: {
          form_id: form_id,
          tab:tab,
          action: 'get_form_info',
          security: give_kindness_manager.nonce,
        },
        success: function(res) {
          if(res.hasOwnProperty('success') && res.success == true) {
            console.log('tab==>',res);

            // Show hide form based on form type
            if(res.hasOwnProperty('data') && res.data.hasOwnProperty('form_type')){
              let formType = res.data.form_type;
              $('#gkm-form-type').val(formType);
              if(formType == 'sequoia'){ // multi-step form
                $('.give-donor-multi-step-form').show();
                $('.give-donor-classic-form').hide();
                $('.give-donor-legacy-form').hide();
                let hideLoader = true;
                showHideLoader('.give-donor-multi-step-form', hideLoader);
              } else if(formType == 'classic'){ // classic form
                $('.give-donor-classic-form').show();
                $('.give-donor-multi-step-form').hide();
                $('.give-donor-legacy-form').hide();
                let hideLoader = true;
                showHideLoader('.give-donor-classic-form', hideLoader);
              } else { // legacy form
                $('.give-donor-legacy-form').show();
                $('.give-donor-classic-form').hide();
                $('.give-donor-multi-step-form').hide();
                let hideLoader = true;
                showHideLoader('.give-donor-legacy-form', hideLoader);
              }
              formLoad(res.data.form_info, formType);
            }

            if(res.hasOwnProperty('data') && res.data.hasOwnProperty('tab')){
              let currentTab = res.data.tab;
              if(currentTab === "give_kindness_manager-donation-options"){
                let hideLoader = true;
                showHideLoader('#give_kindness_manager-donation-options', hideLoader);
              }
            }

          }
        },
        fail: function (res) {
          console.log('fail==>', res);
        }
      });
    }
  }

  /**************************
  *
  * Update settings menu content
  * 
  ***************************/
  $(document).on('click', "#give-kindness-manager-update-settings", function() {

    let give_kindness_verify_link_content = $("#give_kindness_verify_link_content").val();
    let give_kindness_trust_safety = $("#give_kindness_trust_safety").val();
    let give_kindness_guarantee = $("#give_kindness_guarantee").val();
    let give_kindness_verify_details = $("#give_kindness_verify_details").val();
    let give_kindness_boosting_popup = $("#give_kindness_boosting_popup").val();

    let that = $(this);
    that.text(give_kindness_manager.processing);
    that.attr('disabled', true);

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: give_kindness_manager.ajax_url,
      data: {
        give_kindness_verify_link_content:give_kindness_verify_link_content,
        give_kindness_trust_safety:give_kindness_trust_safety,
        give_kindness_guarantee:give_kindness_guarantee,
        give_kindness_verify_details:give_kindness_verify_details,
        give_kindness_boosting_popup:give_kindness_boosting_popup,
        action: 'update_settings',
        security: give_kindness_manager.nonce,
      },
      success: function(data) {
        that.attr('disabled', false);
        that.text(give_kindness_manager.update);
      },
      fail: function (data) {
        console.log('fail==>', data);
        that.text(give_kindness_manager.update);
        that.attr('disabled', false);
      }
    });

  });

  /**************************
    *  
    * Enable media uploader
    * 
    ***************************/
  $(document).ready(function() {

    let file_frame;
    let attachment;
    let wrapper = $('#give-kindness-manager-media-items'); //Input image wrapper
    $(document).on('click', '#gkm-file_drag', function(event) { 
      
      event.preventDefault();
      let file_type = 'image';
      if ( file_frame ) {
        file_frame = '';
      }

      file_frame = wp.media.frames.file_frame = wp.media({
        title: 'File upload',
        button: {
          text: 'Upload now',
        },
        library: {
          type: [ file_type ]
        },
        multiple: true // set this to true for multiple file selection
      });

      file_frame.on( 'select', function() {
        attachment = file_frame.state().get('selection').toJSON();
        wrapper.removeClass('give-kindness-manager-hide');
        $.each(attachment, function(index, value) {
        removeDiv('#give-kindness-manager-media-items', '.give-kindness-manager-media-item'); // remove previous image
        $(wrapper).prepend(`<div class="give-kindness-manager-media-item">
          <img src="${value.url}" alt="">
          <a href="javascript:void(0);" class="give-kindness-manager-media-item-remove" title="Remove Image">
            <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
            </svg>
          </a>
          <input type="hidden" class="gkm-campaign-files" name="gkm-campaign-files" id="gkm-campaign-files" value="${value.id}">
        </div>`); // display image
        });
      });

      file_frame.open();
    });

    // Feature Image
    $(document).on('click', '#gkm-feature-image-drag', function(event) { 
      
      event.preventDefault();
      let file_type = 'image';
      if ( file_frame ) {
        file_frame = '';
      }

      file_frame = wp.media.frames.file_frame = wp.media({
        title: 'File upload',
        button: {
          text: 'Upload now',
        },
        library: {
          type: [ file_type ]
        },
        multiple: false // set this to true for multiple file selection
      });

      file_frame.on( 'select', function() {
        attachment = file_frame.state().get('selection').toJSON();
        $("#give-kindness-manager-feature-image").removeClass('give-kindness-manager-hide');
        $.each(attachment, function(index, value) {
          removeDiv('#give-kindness-manager-feature-image', '.give-kindness-manager-media-item'); // remove previous image
          $("#give-kindness-manager-feature-image").prepend(`<div class="give-kindness-manager-media-item">
            <img src="${value.url}" alt="">
            <a href="javascript:void(0);" class="give-kindness-manager-media-item-remove" title="Remove Image">
              <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
              </svg>
            </a>
            <input type="hidden" class="gkm-feature-image-id" name="gkm-feature-image-id" id="gkm-feature-image-id" value="${value.id}">
          </div>`); // display image
        });
      });

      file_frame.open();
    });

    $(document).on('click', '.give-kindness-manager-media-item-remove', function(e){ //Once remove button is clicked
      e.preventDefault();
      $(this).parent().remove(); //Remove image
    });

  });

  // Change form base on form type
  $(document).on('change', '#gkm-form-type', function(){
    let formType = $(this).val();
    if(formType == 'sequoia'){ // multi-step form
      $('.give-donor-multi-step-form').show();
      $('.give-donor-classic-form').hide();
      $('.give-donor-legacy-form').hide();
      let hideLoader = true;
      showHideLoader('.give-donor-multi-step-form', hideLoader);
    } else if(formType == 'classic'){ // classic form
      $('.give-donor-classic-form').show();
      $('.give-donor-multi-step-form').hide();
      $('.give-donor-legacy-form').hide();
      let hideLoader = true;
      showHideLoader('.give-donor-classic-form', hideLoader);
    } else { // legacy form
      $('.give-donor-legacy-form').show();
      $('.give-donor-classic-form').hide();
      $('.give-donor-multi-step-form').hide();
      let hideLoader = true;
      showHideLoader('.give-donor-legacy-form', hideLoader);
    }
  });

  // Show/hide Include Step One form
  $(document).on('change', '#gkm-introduction_enabled', function(){
    let introductionEnabled = $(this).val();
    if( introductionEnabled === 'enabled'){
      showHideContent('', '.gkm-introduction-item');
    } else {
      showHideContent('.gkm-introduction-item', '');
    }
  });

  // Show/hide donation summary form
  $(document).on('change', '#gkm-donation_summary_enabled', function(){
    let donationSummary = $(this).val();
    if( donationSummary === 'enabled'){
      showHideContent('', '.gkm-donation-summary-item');
    } else {
      showHideContent('.gkm-donation-summary-item', '');
    }
  });

  // Show/hide thank you form
  $(document).on('change', '#gkm-ty_sharing', function(){
    let thankYou = $(this).val();
    if(thankYou === 'enabled'){
      showHideContent('', '.gkm-thank-you-item');
    } else {
      showHideContent('.gkm-thank-you-item', '');
    }
  });

  // Show/hide classic thank you form
  $(document).on('change', '#gkm-classic-ty-social_sharing', function(){
    let thankYou = $(this).val();
    if(thankYou === 'enabled'){
      showHideContent('', '.gkm-class-ty-sharing-item');
    } else {
      showHideContent('.gkm-class-ty-sharing-item', '');
    }
  });

  // Show/hide legacy form display content
  $(document).on('change', '#gkm-legacy-display_content', function(){
    let displayContent = $(this).val();
    if(displayContent === 'enabled'){
      showHideContent('', '.gkm-legacy-form-item');
    } else {
      showHideContent('.gkm-legacy-form-item', '');
    }
  });

  // Show/hide legacy form continue button by display option field
  $(document).on('change', '#gkm-legacy-payment_display', function(){
    let displayContent = $(this).val();
    if(displayContent === 'button' || displayContent === 'modal' || displayContent === 'reveal'){
      showHideContent('', '.gkm-legacy-continue-item');
    } else {
      showHideContent('.gkm-legacy-continue-item', '');
    }
  });

  // Show/hide legacy form continue button by display option field
  $(document).on('change', '#gkm-legacy-payment_display', function(){
    let displayContent = $(this).val();
    if(displayContent === 'button' || displayContent === 'modal' || displayContent === 'reveal'){
      showHideContent('', '.gkm-legacy-continue-item');
    } else {
      showHideContent('.gkm-legacy-continue-item', '');
    }
  });

  // Show/hide classic form display_header item
  $(document).on('change', '#gkm-classic-display_header', function(){
    let displayContent = $(this).val();
    if(displayContent === 'enabled'){
      showHideContent('', '.gkm-classic-display-header-item');
    } else {
      showHideContent('.gkm-classic-display-header-item', '');
    }
  });

  // Show/hide classic form display badge item
  $(document).on('change', '#gkm-classic-secure_badge', function(){
    let displayContent = $(this).val();
    if(displayContent === 'enabled'){
      showHideContent('', '.gkm-classic-secure-badge-item');
    } else {
      showHideContent('.gkm-classic-secure-badge-item', '');
    }
  });

  // Update campaign settings
  $(document).on('click', '#give_kindness_manager-update-campaign', function(){
    
    let that = $(this);
    let formId = $(this).data('campaign-id');
    let campaignStatus = $("#gkm-form-status").val();
    let catsArray = [];
    $('.gkm-form-category:checkbox:checked').each(function () {
      catsArray.push($(this).val());
    });
    let featureImageId = $("#gkm-feature-image-id").val();
    that.attr('disabled', true);
    that.text(give_kindness_manager.processing);

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: give_kindness_manager.ajax_url,
      data: {
        form_id: formId,
        campaign_status: campaignStatus,
        cats: catsArray,
        feature_image_id: featureImageId,
        action: 'campaign_settings_update',
        security: give_kindness_manager.nonce,
      },
      success: function(data) {
        that.attr('disabled', false);
        that.text(give_kindness_manager.update);
      },
      fail: function (data) {
        console.log('fail==>', data);
        that.text(give_kindness_manager.update);
        that.attr('disabled', false);
      }
    });
  }); 
  
  // Update form template
  $(document).on('click', '#give_kindness_manager-update-form-template', function(){
    let that = $(this);
    let formId = $(this).data('campaign-id');
    let formType = $('#gkm-form-type').val();

    let formData = {};
    if( formType == 'sequoia' ) {
      let introImage = $("#give-kindness-manager-media-items").find('img').attr('src');
      if( typeof introImage === "undefined" ){
        introImage = '';
      }

      formData = {
        google_fonts: $("#gkm-google_fonts").val(),
        decimals_enabled: $("#gkm-decimals_enabled").val(),
        introduction_enabled: $("#gkm-introduction_enabled").val(),
        introduction_headline: $("#gkm-introduction_headline").val(),
        introduction_description: $("#gkm-introduction_description").val(),
        image: introImage,
        donate_label: $("#gkm-donate_label").val(),

        payment_header_label: $("#gkm-payment_header_label").val(),
        payment_content: $("#gkm-payment_content").val(),
        next_label: $("#gkm-next_label").val(),

        payment_info_header_label: $("#gkm-payment_info_header_label").val(),
        payment_info_headline: $("#gkm-payment_info_headline").val(),
        payment_info_descritpion: $("#gkm-payment_info_description").val(),
        donation_summary_enabled: $("#gkm-donation_summary_enabled").val(),
        donation_summary_heading: $("#gkm-donation_summary_heading").val(),
        donation_summary_location: $("#gkm-donation_summary_location").val(),
        checkout_label: $("#gkm-checkout_label").val(),

        ty_headline: $("#gkm-ty_headline").val(),
        ty_description: tinymce.get( $("#gkm-ty_description").attr( 'id' ) ).getContent( { format: 'text' } ),
        ty_sharing: $("#gkm-ty_sharing").val(),
        ty_sharing_instructions: $("#gkm-ty_sharing_instructions").val(),
        ty_twitter_message: $("#gkm-ty_twitter_message").val(),
      };
    } else if( formType == 'classic' ) {
      formData = {
        container_style: $("#gkm-classic-container_style").val(),
        primary_font: $("#gkm-classic-primary_font").val(),
        display_header: $("#gkm-classic-display_header").val(),
        main_heading: $("#gkm-classic-main_heading").val(),
        main_description: $("#gkm-classic-main_description").val(),
        secure_badge: $("#gkm-classic-secure_badge").val(),
        secure_badge_text: $("#gkm-classic-secure_badge_text").val(),
        da_headline: $("#gkm-classic-da-headline").val(),
        da_description: $("#gkm-classic-da-description").val(),
        di_headline: $("#gkm-classic-di-headline").val(),
        di_Description: $("#gkm-classic-di-description").val(),
        pm_headline: $("#gkm-classic-pm-headline").val(),
        pm_description: $("#gkm-classic-pm-description").val(),
        donation_summary_enabled: $("#gkm-classic-donation_summary_enabled").val(),
        donation_summary_heading: $("#gkm-classic-donation_summary_heading").val(),
        donation_summary_location: $("#gkm-classic-donation_summary_location").val(),
        ty_headline: $("#gkm-classic-ty-headline").val(),
        ty_description: $("#gkm-classic-ty-description").val(),
        ty_social_sharing: $("#gkm-classic-ty-social_sharing").val(),
        ty_sharing_instructions: $("#gkm-classic-ty-sharing_instructions").val(),
        ty_twitter_message: $("#gkm-classic-ty-twitter_message").val(),
      }
    } else {
      formData = {
        display_style: $("#gkm-legacy-display_style").val(),
        payment_display: $("#gkm-legacy-payment_display").val(),
        reveal_label: $("#gkm-legacy-reveal_label").val(),
        checkout_label: $("#gkm-legacy-checkout_label").val(),
        form_floating_labels: $("#gkm-legacy-form_floating_labels").val(),
        display_content: $("#gkm-legacy-display_content").val(),
        content_placement: $("#gkm-legacy-content_placement").val(),
        legacy_display_settings_form_content: tinymce.get( $("#gkm-legacy-legacy_display_settings_form_content").attr( 'id' ) ).getContent( { format: 'text' } ),
      }
    }
    // console.log('Before form submit==>',formData);

    that.attr('disabled', true);
    that.text(give_kindness_manager.processing);
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: give_kindness_manager.ajax_url,
      data: {
        form_id: formId,
        form_type: formType,
        form_data: formData,
        action: 'campaign_form_template_update',
        security: give_kindness_manager.nonce,
      },
      success: function(data) {
        console.log('res==>',data);
        that.attr('disabled', false);
        that.text(give_kindness_manager.update);
      },
      fail: function (data) {
        console.log('fail==>', data);
        that.text(give_kindness_manager.update);
        that.attr('disabled', false);
      }
    });

  });

  /**************************
  *  
  * Login
  * 
  ***************************/
  $(document).on('click', '#give-kindness-manager-login-submit', function(){

    let that = $(this);
    let login = $('#give-kindness-manager-username').val();
    let password = $('#give-kindness-manager-password').val();

    if( login == '' || password == '' ){
      return false; 
    }

    that.attr('disabled', true);

    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness_manager.apiNonce },
      url: give_kindness_manager.giveApiURL+'donor-dashboard/login',
      data: {
        login: login,
        password: password
      },
      success: function(data) {
        that.attr('disabled', false);
        if( data.status === 200 ) {
          window.location.reload();
        }

        if( data.status === 400 ) {
          $('#give-kindness-manager-username').val('');
          $('#give-kindness-manager-password').val('');

          const msg = data.body_response.message; 
          if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
            that.siblings('.give-donor-dashboard__auth-modal-error').text(msg);
          } else {
            that.after(`<div class="give-donor-dashboard__auth-modal-error">${msg}</div>`);
          }
        }
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });
  });

  /**************************
  *  
  * Logout
  * 
  ***************************/
  $(document).on('click', '#give-kindness-manager-logout, .give-kindness-manager-logout', function(){
    if (confirm(give_kindness_manager.logOutMsg) == true) {
      $.ajax({
        type: 'POST',
        dataType: 'json',
        headers: {'X-WP-Nonce': give_kindness_manager.apiNonce },
        url: give_kindness_manager.giveApiURL+'donor-dashboard/logout',
        success: function(data) {
          if(data.status === 200) {
            window.location.reload();
          }
        },
        error: function (error) {
          console.log('fail==>', error);
        }
      });
    }
  });

  
})(jQuery, window, document);
  
/************************
* 
* Open and close content
* 
************************/
function showHideContent(that, targetId) {
  jQuery(that).hide();
  jQuery(targetId).show();
};
  
/**************************
*  
* Edit campaign
* 
***************************/
function editCampaign(dat){

  //Active current menu
  jQuery("#give-kindness-manager-edit-campaign-menu .give-donor-dashboard-tab-link").each(function(index, item) {
    let currentTabContent = jQuery(this).data('tab-id');

    if( typeof currentTabContent != "undefined" ) {   
      jQuery('#'+currentTabContent).hide();
      if( currentTabContent == 'give_kindness_manager-campaign-settings') {
        jQuery(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
        jQuery(this).addClass("give-donor-dashboard-tab-link--is-active");
      }
    }
  });

  jQuery('#give-kindness-manager-menu').hide(); //hide main menu
  jQuery('#give-kindness-manager-edit-campaign-menu').show(); //show campaign edit menu
  jQuery('#give_kindness_manager-campaign-settings').show(); // show campaign-settings template
  jQuery('#give_kindness_manager-campaigns').hide();

  let data = jQuery(dat).attr('data-campaign-info');
      data = JSON.parse(data);
    // console.log('test data==>',data);

  let campaign_id = data['campaign_id'];
  let post_status = data['post_status'];
  let feature_image_id = data['feature_image_id'];
  let feature_image_url = data['feature_image_url'];
  let cats = data['cats'];
  
  jQuery("#gkm-form-status").val(post_status);
  jQuery('.gkm-form-category').each(function(i, obj) {
    cat_id = parseInt(jQuery(this).val());
    if( cats.includes(cat_id) ) {
      jQuery(this).attr('checked','checked');
    } else {
      jQuery(this).removeAttr('checked');
    }
  });

  jQuery('#give-kindness-manager-feature-image').html('');
  if( feature_image_id != '' ) {
    jQuery('#give-kindness-manager-feature-image').prepend(`<div class="give-kindness-manager-media-item">
      <img src="${feature_image_url}" alt="">
      <a href="javascript:void(0);" class="give-kindness-manager-media-item-remove" title="Remove Image">
        <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
        </svg>
      </a>
      <input type="hidden" class="gkm-feature-image-id" name="gkm-feature-image-id" id="gkm-feature-image-id" value="${feature_image_id}">
    </div>`); // display image
  }

  jQuery('.give_kindness_manager-update-campaign').attr('data-campaign-id', campaign_id);

}
  
/**************************
*  
* Forcefully show/hide menu
* 
***************************/
function showMenu(show_menu, hide_menu, show_menu_item = null, show_content = null, active_menu = null ) {

  jQuery(show_menu).show();
  jQuery(hide_menu).hide();

  if( show_menu_item != null ){
    jQuery(show_menu_item).show();
  }

  if( show_content != null ){
    jQuery(show_content).show();
  }

}

/**************************
*  
* Show/hide spinner
* 
***************************/
function showHideLoader(area, showHideLoader = true){
  if( showHideLoader === true ){
    jQuery(area).find('.give-kindness-manager-ring').hide();
  } else {
    jQuery(area).find('.give-kindness-manager-ring').show();
  }
}

/**************************
*  
* Multi-form load
* 
***************************/
function formLoad(form, formType){
  if(formType === 'sequoia'){

    /**********************
     * Visual Appearance
     **********************/
    let visualAppearance = form.visual_appearance;
    jQuery("#gkm-google_fonts").val(visualAppearance['google-fonts']);
    jQuery("#gkm-decimals_enabled").val(visualAppearance['decimals_enabled']);

    /**********************
     * Introduction
     **********************/
    let introduction = form.introduction;
    jQuery("#gkm-introduction_enabled").val(introduction['enabled']);
    if(introduction['enabled'] === 'enabled'){
      showHideContent('', '.gkm-introduction-item');
    }

    if(introduction['image'] !=''){
      jQuery("#give-kindness-manager-media-items").prepend(`<div class="give-kindness-manager-media-item">
        <img src="${introduction['image']}" alt="">
        <a href="javascript:void(0);" class="give-kindness-manager-media-item-remove" title="Remove Image">
          <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
          </svg>
        </a>
      </div>`); // display image
    }
    jQuery("#gkm-introduction_headline").val(introduction['headline']);
    jQuery("#gkm-introduction_description").val(introduction['description']);
    jQuery("#gkm-donate_label").val(introduction['donate_label']);

    /**********************
     * Payment Amount
     **********************/
    let paymentAmount= form.payment_amount;
    jQuery("#gkm-payment_header_label").val(paymentAmount['header_label']);
    jQuery("#gkm-payment_content").val(paymentAmount['content']);
    jQuery("#gkm-next_label").val(paymentAmount['next_label']);

    /**********************
     * Payment Information
    **********************/
    let paymentInformation = form.payment_information;
    jQuery("#gkm-payment_info_header_label").val(paymentInformation['header_label']);
    jQuery("#gkm-payment_info_headline").val(paymentInformation['headline']);
    jQuery("#gkm-payment_info_description").val(paymentInformation['description']);
    jQuery("#gkm-donation_summary_enabled").val(paymentInformation['donation_summary_enabled']);
    if(paymentInformation['donation_summary_enabled'] === 'enabled'){
      showHideContent('', '.gkm-donation-summary-item');
    }
    jQuery("#gkm-donation_summary_heading").val(paymentInformation['donation_summary_heading']);
    jQuery("#gkm-donation_summary_location").val(paymentInformation['donation_summary_location']);
    jQuery("#gkm-checkout_label").val(paymentInformation['checkout_label']);

    /**********************
     * Thank You
    **********************/
    let thankYou = form['thank-you'];
    jQuery("#gkm-ty_headline").val(thankYou['headline']);
    jQuery("#gkm-ty_description").val(thankYou['description']);
    if( thankYou['description'] != ''){
      tinymce.get( jQuery("#gkm-ty_description").attr( 'id' ) ).setContent(thankYou['description']);
    }
    jQuery("#gkm-ty_sharing").val(thankYou['sharing']);
    if(thankYou['sharing'] == "enabled"){
      showHideContent('', '.gkm-thank-you-item');
    }
    jQuery("#gkm-ty_sharing_instructions").val(thankYou['sharing_instruction']);
    jQuery("#gkm-ty_twitter_message").val(thankYou['twitter_message']);

  } else if(formType === 'classic'){

    /**********************
     * Visual Appearance
    **********************/
    let visualAppearance = form.visual_appearance;
    jQuery("#gkm-classic-container_style").val(visualAppearance.container_style);
    jQuery("#gkm-classic-primary_font").val(visualAppearance.primary_font);
    jQuery("#gkm-classic-display_header").val(visualAppearance.display_header);
    if(visualAppearance.display_header == 'enabled'){
      showHideContent('', '.gkm-classic-display-header-item');
    }
    jQuery("#gkm-classic-main_heading").val(visualAppearance.main_heading);
    jQuery("#gkm-classic-main_description").val(visualAppearance.description);
    
    jQuery("#gkm-classic-secure_badge").val(visualAppearance.secure_badge);
    if(visualAppearance.secure_badge == 'enabled'){
      showHideContent('', '.gkm-classic-secure-badge-item');
    }
    jQuery("#gkm-classic-secure_badge_text").val(visualAppearance.secure_badge_text);

    /**********************
     * Donation Amount
    **********************/
    let donationAmount = form.donation_amount;
    jQuery("#gkm-classic-da-headline").val(donationAmount.headline);
    jQuery("#gkm-classic-da-description").val(donationAmount.description);

    /**********************
     * Donation Information
    **********************/
    let donorInformation = form.donor_information;
    jQuery("#gkm-classic-di-headline").val(donorInformation.headline);
    jQuery("#gkm-classic-di-description").val(donorInformation.description);

    /**********************
     * Payment Information
    **********************/
    let paymentInformation = form.payment_information;
    jQuery("#gkm-classic-pm-headline").val(paymentInformation.headline);
    jQuery("#gkm-classic-pm-description").val(paymentInformation.description);
    jQuery("#gkm-classic-donation_summary_enabled").val(paymentInformation.donation_summary_enabled);
    jQuery("#gkm-classic-donation_summary_heading").val(paymentInformation.donation_summary_heading);
    jQuery("#gkm-classic-donation_summary_location").val(paymentInformation.donation_summary_location);

    /**********************
     * Thank You
    **********************/
    let donationReceipt = form.donation_receipt;
    jQuery("#gkm-classic-ty-headline").val(donationReceipt.headline);
    jQuery("#gkm-classic-ty-description").val(donationReceipt.description);
    jQuery("#gkm-classic-ty-social_sharing").val(donationReceipt.social_sharing);
    if(donationReceipt.social_sharing == 'enabled'){
      showHideContent('', '.gkm-class-ty-sharing-item');
    }
    jQuery("#gkm-classic-ty-sharing_instructions").val(donationReceipt.sharing_instructions);
    jQuery("#gkm-classic-ty-twitter_message").val(donationReceipt.twitter_message);

  } else {

    let displaySettings = form;
    if(displaySettings.hasOwnProperty("display_settings")){
      displaySettings = form.display_settings;
    }
    jQuery("#gkm-legacy-display_style").val(displaySettings.display_style);
    jQuery("#gkm-legacy-payment_display").val(displaySettings.payment_display);
    if(displaySettings.payment_display === 'button' || displaySettings.display_style === 'modal' || displaySettings.display_style === 'reveal'){
      showHideContent('', '.gkm-legacy-continue-item');
    }
    jQuery("#gkm-legacy-reveal_label").val(displaySettings.reveal_label);
    jQuery("#gkm-legacy-checkout_label").val(displaySettings.checkout_label);
    jQuery("#gkm-legacy-form_floating_labels").val(displaySettings.form_floating_labels);
    jQuery("#gkm-legacy-display_content").val(displaySettings.display_content);
    if(displaySettings.display_content === 'enabled'){
      showHideContent('', '.gkm-legacy-form-item');
    }
    jQuery("#gkm-legacy-content_placement").val(displaySettings.content_placement);
    tinymce.get( jQuery("#gkm-legacy-legacy_display_settings_form_content").attr( 'id' ) ).setContent(displaySettings.form_content);
  }
}

function removeDiv(parentDiv, targetDiv){
  jQuery(parentDiv).find(targetDiv).remove();
}