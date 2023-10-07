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
                form_ajax_call(form_id, currentTabContent);
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
    
    function form_ajax_call(form_id, tab) {
      if( tab !='' ) {
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
                $('#form-type').val(formType);
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
              }



            }
          },
          fail: function (res) {
            console.log('fail==>', res);
            // that.text(give_kindness_manager.update);
            // that.attr('disabled', false);
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
      $(document).on('click', '#gkm-file-drag', function(event) { 
        
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

          $(wrapper).prepend(`<div class="give-kindness-manager-media-item">
            <img src="${value.url}" alt="">
            <a href="javascript:void(0);" class="give-kindness-manager-media-item-remove" title="Remove Image">
              <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
              </svg>
            </a>
            <input type="hidden" class="gkm-campaign-files" name="gkm-campaign-files[]" value="${value.id}">
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

          $("#give-kindness-manager-feature-image").prepend(`<div class="give-kindness-manager-media-item">
            <img src="${value.url}" alt="">
            <a href="javascript:void(0);" class="give-kindness-manager-media-item-remove" title="Remove Image">
              <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
              </svg>
            </a>
            <input type="hidden" class="gkm-feature-image-id" name="gkm-feature-image-id" value="${value.id}">
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
    $(document).on('change', '#form-type', function(){
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
   
    jQuery("#form-status").val(post_status);
    jQuery('.gkm-form-type').each(function(i, obj) {
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
        <input type="hidden" class="gkm-feature-image-id" name="gkm-feature-image-id" value="${feature_image_id}">
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