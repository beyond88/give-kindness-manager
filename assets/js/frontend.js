(function($, window, document ) {
    'use strict';

    $( document ).ready(function() {
  
      /************************
       * 
       * Sidebar handle
       * 
       ************************/
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
            } else {
              if( typeof targetTabContent !== "undefined") {
                $('#'+currentTabContent).hide();
              }
            }
          }
        });
      });
  
    });    

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
    if( cats.length > 0 ) {
      jQuery('.gkm-form-type').each(function(i, obj) {
        cat_id = parseInt(jQuery(this).val());
        if( cats.includes(cat_id) ){
          jQuery(this).attr('checked','checked');
        }
      });
    }

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
  
    // jQuery('#gke-campaign-name').val(campaign_name);
    // jQuery('#gke-fundraising-target').val(fundraising_target);
    // jQuery('#gke-beneficiary-name').val(beneficiary_name);
    // jQuery('#gke-mobile-code').val(mobile_code);
    // jQuery('#gke-mobile-number').val(mobile_number);
    // jQuery('#gke-beneficiary-relationship').val(beneficiary_relationship);
    // jQuery('#gke-beneficiary-country').val(beneficiary_country);
    // jQuery('#gke-beneficiary-age').val(beneficiary_age);
    // jQuery('#gke-medical-condition').val(medical_condition);
    // jQuery('#gke-medical-document').val(medical_document_type);
    // jQuery('#gke-campaign-email').val(campaign_email);
    // jQuery('#gke-campaign-detail').text(campaign_detail);
    // if( campaign_detail ) {
    //   tinymce.get( jQuery("#gke-campaign-detail").attr( 'id' ) ).setContent(campaign_detail);
    // }
    // jQuery('#gke-campaign-country').val(campaign_country);
    // jQuery('#gke-government-assistance').val(government_assistance);
    // jQuery('#gke-government-assistance-details').val(government_assistance_details);
    // jQuery('#gke-campaign-boosting').val(campaign_boosting);
    // jQuery('#gke-campaign-status').text(status);
    // jQuery('#give-kindness-milestone-label').text(campaign_currency+fundraising_target);
  
    // // Add CSS class to change status label color
    // jQuery('#gke-campaign-status').removeClass();
    // if(status == 'pending'){
    //   jQuery('#gke-campaign-status').addClass('give-kindness-campaign-pending-label');
    // } else if(status == 'draft') {
    //   jQuery('#gke-campaign-status').addClass('give-kindness-campaign-draft-label');
    // } else if(status == 'suspend') {
    //   jQuery('#gke-campaign-status').addClass('give-kindness-campaign-suspend-label');
    // } else if(status == 'publish') {
    //   jQuery('#gke-campaign-status').addClass('give-kindness-campaign-publish-label');
    // } else if(status == 'reject') {
    //   jQuery('#gke-campaign-status').addClass('give-kindness-campaign-reject-label');
    // } else {
    //   jQuery('#gke-campaign-status').addClass('give-kindness-campaign-publish-label');
    // }
  
    // jQuery('#give_kindness-update-campaign').attr('data-campaign-id', campaign_id); //for update campaign
    // jQuery('#give_kindness-save-doc').attr('data-campaign-id', campaign_id); //for update campaign docs
    // jQuery('#give-kindness-campaign-action-delete').attr('data-campaign-id', campaign_id); //for delete campaign
    // jQuery('#give-kindness-campaign-action-suspend').attr('data-campaign-id', campaign_id); //for campaign suspend
  
    // if( status == 'publish') {
    //   jQuery('#give-kindness-campaign-action-delete').hide(); //for delete campaign
    //   jQuery('#give-kindness-campaign-action-suspend').show(); //for campaign suspend
    // }
  
    // /******
    //  * 
    //  * Set campaign id for view donations
    //  * 
    //  */
    // jQuery('#give-kindness-campaign-donations').attr('data-camapign-id', campaign_id);
  
    // if( government_assistance == "Yes") {
    //   jQuery("#gke-government-assistance-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
    //   jQuery("#gke-government-assistance-yes").removeClass("give-donor-dashboard-button--default").addClass("give-donor-dashboard-button--primary");
    //   jQuery(".gke-government-assistance-area").show();
    // }
  
    // if( campaign_boosting == "Yes") {
    //   jQuery("#gke-campaign-boosting-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
    //   jQuery("#gke-campaign-boosting-yes").removeClass("give-donor-dashboard-button--default").addClass("give-donor-dashboard-button--primary");
    // }
  
    // let medical_document_wrapper = jQuery('#give-kindness-edit-media-items');
    // medical_document_wrapper.html(""); //Initiallly blank
  
    // if( medical_document.length > 0){
    //   for(let i=0; i < medical_document.length; i++){
    //     if(medical_document_type == 'image') {
    //       medical_document_wrapper.prepend(`<div class="give-kindness-media-item">
    //         <img src="${medical_document_url[i]}" alt="">
    //         <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
    //           <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
    //           </svg>
    //         </a>
    //         <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${medical_document[i]}">
    //       </div>`); // display image
    //     } else {
    //       medical_document_wrapper.prepend(`<div class="give-kindness-media-item">
    //       <object data="${medical_document_url[i]}" type="application/pdf" width="100px" height="100px">
    //         <embed src="${medical_document_url[i]}" type="application/pdf">
    //           <p>This browser does not support PDFs. Please download the PDF to view it: <a href="${medical_document_url[i]}" download>Download PDF</a>.</p>
    //         </embed>
    //       </object>
    //         <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
    //           <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
    //           </svg>
    //         </a>
    //         <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${medical_document[i]}">
    //       </div>`); // display image
    //     }
    //   }
    // }
  
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