(function($, window, document ) {
    'use strict';
  
    /**************************
    *
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
    
  
  })(jQuery, window, document);
  
  /************************
  * 
  * View receipt details
  * 
  ************************/
  function viewReceipt(that, id) {
    jQuery('#'+id).hide();
    let receiptNo = jQuery(that).data('receipt-no');
    let divId = '#receipt-no-'+receiptNo;
    jQuery(divId).show();
  };
  
  function closeReceipt(that, id) {
    jQuery('#'+id).show();
    let receiptNo = jQuery(that).data('receipt-no');
    let divId = '#receipt-no-'+receiptNo;
    jQuery(divId).hide();
  };
  
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
    jQuery(".give-donor-dashboard-tab-link").each(function(index, item) {
      let currentTabContent = jQuery(this).data('tab-id');
      if( typeof currentTabContent != "undefined" ){   
        jQuery('#'+currentTabContent).hide();
        if( currentTabContent == 'give_kindness-edit-campaign'){
          jQuery(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
          jQuery(this).addClass("give-donor-dashboard-tab-link--is-active");
        }
      }
    });
  
    jQuery('#give-kindness-mainmenu').hide(); //hide main menu
    jQuery('#give-kindness-campaign-edit-menu').show(); //show campaign edit menu
    jQuery('#give_kindness-edit-campaign').show(); // show cmapaign edit template
    // jQuery('#give_kindness-campaigns').hide();
    // jQuery('#give_kindness-create-campaign').hide();
  
  
    let data = jQuery(dat).attr('data-campaign-info');
        data = JSON.parse(data);
  
    let campaign_name = data['campaign_name'];
    let beneficiary_name = data['beneficiary_name'];
    let mobile_code = data['mobile_code'];
    let mobile_number = data['mobile_number'];
    let beneficiary_relationship = data['beneficiary_relationship'];
    let beneficiary_country = data['beneficiary_country'];
    let beneficiary_age = data['beneficiary_age'];
    let medical_condition = data['medical_condition'];
    let medical_document_type = data['medical_document_type'];
    let medical_document = data['medical_document'];
    let medical_document_url = data['medical_document_url'];
    let campaign_detail = data['campaign_detail'];
  
    let campaign_email = data['campaign_email'];
    let campaign_country = data['campaign_country'];
    let government_assistance = data['government_assistance'];
    let government_assistance_details = data['government_assistance_details'];
    let fundraising_target = data['fundraising_target'];
    let campaign_boosting = data['campaign_boosting'];
    let campaign_id = data['campaign_id'];
    let status = data['status'];
    let campaign_currency = data['campaign_currency'];
  
    jQuery('#gke-campaign-name').val(campaign_name);
    jQuery('#gke-fundraising-target').val(fundraising_target);
    jQuery('#gke-beneficiary-name').val(beneficiary_name);
    jQuery('#gke-mobile-code').val(mobile_code);
    jQuery('#gke-mobile-number').val(mobile_number);
    jQuery('#gke-beneficiary-relationship').val(beneficiary_relationship);
    jQuery('#gke-beneficiary-country').val(beneficiary_country);
    jQuery('#gke-beneficiary-age').val(beneficiary_age);
    jQuery('#gke-medical-condition').val(medical_condition);
    jQuery('#gke-medical-document').val(medical_document_type);
    jQuery('#gke-campaign-email').val(campaign_email);
    jQuery('#gke-campaign-detail').text(campaign_detail);
    if( campaign_detail ) {
      tinymce.get( jQuery("#gke-campaign-detail").attr( 'id' ) ).setContent(campaign_detail);
    }
    jQuery('#gke-campaign-country').val(campaign_country);
    jQuery('#gke-government-assistance').val(government_assistance);
    jQuery('#gke-government-assistance-details').val(government_assistance_details);
    jQuery('#gke-campaign-boosting').val(campaign_boosting);
    jQuery('#gke-campaign-status').text(status);
    jQuery('#give-kindness-milestone-label').text(campaign_currency+fundraising_target);
  
    // Add CSS class to change status label color
    jQuery('#gke-campaign-status').removeClass();
    if(status == 'pending'){
      jQuery('#gke-campaign-status').addClass('give-kindness-campaign-pending-label');
    } else if(status == 'draft') {
      jQuery('#gke-campaign-status').addClass('give-kindness-campaign-draft-label');
    } else if(status == 'suspend') {
      jQuery('#gke-campaign-status').addClass('give-kindness-campaign-suspend-label');
    } else if(status == 'publish') {
      jQuery('#gke-campaign-status').addClass('give-kindness-campaign-publish-label');
    } else if(status == 'reject') {
      jQuery('#gke-campaign-status').addClass('give-kindness-campaign-reject-label');
    } else {
      jQuery('#gke-campaign-status').addClass('give-kindness-campaign-publish-label');
    }
  
    jQuery('#give_kindness-update-campaign').attr('data-campaign-id', campaign_id); //for update campaign
    jQuery('#give_kindness-save-doc').attr('data-campaign-id', campaign_id); //for update campaign docs
    jQuery('#give-kindness-campaign-action-delete').attr('data-campaign-id', campaign_id); //for delete campaign
    jQuery('#give-kindness-campaign-action-suspend').attr('data-campaign-id', campaign_id); //for campaign suspend
  
    if( status == 'publish') {
      jQuery('#give-kindness-campaign-action-delete').hide(); //for delete campaign
      jQuery('#give-kindness-campaign-action-suspend').show(); //for campaign suspend
    }
  
    /******
     * 
     * Set campaign id for view donations
     * 
     */
    jQuery('#give-kindness-campaign-donations').attr('data-camapign-id', campaign_id);
  
    if( government_assistance == "Yes") {
      jQuery("#gke-government-assistance-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
      jQuery("#gke-government-assistance-yes").removeClass("give-donor-dashboard-button--default").addClass("give-donor-dashboard-button--primary");
      jQuery(".gke-government-assistance-area").show();
    }
  
    if( campaign_boosting == "Yes") {
      jQuery("#gke-campaign-boosting-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
      jQuery("#gke-campaign-boosting-yes").removeClass("give-donor-dashboard-button--default").addClass("give-donor-dashboard-button--primary");
    }
  
    let medical_document_wrapper = jQuery('#give-kindness-edit-media-items');
    medical_document_wrapper.html(""); //Initiallly blank
  
    if( medical_document.length > 0){
      for(let i=0; i < medical_document.length; i++){
        if(medical_document_type == 'image') {
          medical_document_wrapper.prepend(`<div class="give-kindness-media-item">
            <img src="${medical_document_url[i]}" alt="">
            <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
              <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
              </svg>
            </a>
            <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${medical_document[i]}">
          </div>`); // display image
        } else {
          medical_document_wrapper.prepend(`<div class="give-kindness-media-item">
          <object data="${medical_document_url[i]}" type="application/pdf" width="100px" height="100px">
            <embed src="${medical_document_url[i]}" type="application/pdf">
              <p>This browser does not support PDFs. Please download the PDF to view it: <a href="${medical_document_url[i]}" download>Download PDF</a>.</p>
            </embed>
          </object>
            <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
              <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
              </svg>
            </a>
            <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${medical_document[i]}">
          </div>`); // display image
        }
      }
  
    }
  
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