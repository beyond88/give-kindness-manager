<?php 
    $acampaigns = $object->give_kindness_manager_campaigns();
?>
<div class="give-donor-dashboard-tab-content" id="give_kindness_manager-campaigns" data-tab-content="give_kindness_manager-campaigns">
    <div class="give-donor-dashboard-heading give-donor-dashboard-campaign-heading">
        <span>
            <?php echo sprintf(__('%s Total Campaigns', 'give-kindness-manager'), $acampaigns->post_count); ?>
        </span>
    </div>

    <!-- Loader -->
    <div class="give-kindness-manager-ring"><div></div><div></div><div></div><div></div></div>

    <div class="give-donor-dashboard-table give-kindness-campaigns-container" id="give-kindness-campaign-list" style="opacity: 0.5">
        <div class="give-donor-dashboard-table__header">
            <div class="give-donor-dashboard-table__column"><?php echo __('Campaign','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Goal','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Donations','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Revenue','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Date','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Status','give-kindness-manager');?></div>
        </div>

        <div class="give-donor-dashboard-table__rows give-kindness-items-container">
            <?php if( $acampaigns->have_posts() ) : ?>
            <?php foreach( $acampaigns->posts as $campaign ) : ?>
            <?php 
                $goal_stats = give_goal_progress_stats( $campaign->ID );
                $goal = $goal_stats['goal'];
                $donations = give_get_form_sales_stats( $campaign->ID );
                $revenue = $goal_stats['actual'];
            ?>
            <div class="give-donor-dashboard-table__row give-kindness-campaigns-item item-visible">
                <div class="give-donor-dashboard-table__column">
                    <?php echo $campaign->post_title; ?>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <?php echo $goal; ?>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <a href="javascript:void(0);" class="view-all-donations" data-form-id="<?php echo $campaign->ID; ?>"><?php echo $donations; ?></a>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <?php echo $revenue; ?>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <div class="give-donor-dashboard-table__donation-date">
                        <?php echo date_i18n('F d, Y', strtotime($campaign->post_date)); ?>
                    </div>
                    <div class="give-donor-dashboard-table__donation-time">
                        <?php echo date_i18n('h:i:s a', strtotime($campaign->post_date)); ?>
                    </div>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <div class="give-donor-dashboard-table__donation-status">
                        <div class="give-donor-dashboard-table__donation-status-indicator" style="background-color: <?php //echo $object->give_kindness_campaign_status_color($campaign->post_status); ?>;"></div>
                        <div class="give-donor-dashboard-table__donation-status-label">
                            <?php echo ucfirst($campaign->post_status); ?>
                        </div>
                    </div>
                </div>
                <div class="give-donor-dashboard-table__pill">
                    <div class="give-donor-dashboard-table__donation-id">
                        <?php echo sprintf(__('ID: %d', 'give-kindness-manager'), $campaign->ID); ?> 
                    </div>
                    <div class="give-donor-dashboard-table__donation-receipt">
                        <?php 
                            $data = [];
                            $campaign_id = $campaign->ID;
                            $data['campaign_id'] = $campaign_id;
                            $data['post_status'] = $campaign->post_status;
                            
                            $categories = get_the_terms( $campaign->ID, 'give_forms_category' );
                            $cats = [];
                            if( ! empty( $categories ) ) {
                                foreach( $categories as $cat ) {
                                    array_push($cats, $cat->term_id);
                                }
                            }

                            if ( has_post_thumbnail( $campaign->ID ) ) {
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $campaign->ID ) );
                                $attach_id = get_post_thumbnail_id( $campaign->ID );
                                $attach_url = $image[0];
                                $data['feature_image_id'] = $attach_id;
                                $data['feature_image_url'] = $attach_url;
                            } else {
                                $data['feature_image_id'] = '';
                                $data['feature_image_url'] = '';
                            }

                            $data['cats'] = $cats;
                            $jsonData = json_encode($data);

                        ?>
                        <a href="javascript:void(0)" data-campaign-no="<?php echo $campaign->ID; ?>" data-campaign-info='<?php echo $jsonData; ?>' class="view-campaign-btn" onClick='editCampaign(this)'>
                            <?php echo __('Edit', 'give-kindness-manager'); ?> 
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="give-donor-dashboard-table__footer">
            <div class="give-donor-dashboard-table__footer-text give-kindness-pagination-indicator give-kindness-campaigns-pagination-indicator"></div>
            <div class="give-donor-dashboard-table__footer-nav">
                <ul class="give-kindness-pagination-container give-kindness-campaigns-pagination-container"></ul>
            </div>
        </div>
    </div>

    <div class="give-donor-dashboard-heading give-donor-dashboard-donations-heading give-kindness-donations-area-item">
        <div class="donations-campaign-name give-dashboard-donations-heading-item">
            <?php echo __('Campaign Name:', 'give-kindness-manager'); ?><span class="display-campaign-name"></span>
        </div>
        <div class="donations-list-close give-dashboard-donations-heading-item">
            &#x2715
        </div>
    </div>
    <div class="give-donor-dashboard-table give-kindness-donations-list give-kindness-donations-area-item" id="give-kindness-donations-list">
        <div class="give-donor-dashboard-table__header">
            <div class="give-donor-dashboard-table__column"><?php echo __('ID','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Amount','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Payment Type','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Donor Name','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Fee','give-kindness-manager');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Status','give-kindness-manager');?></div>
        </div>
        <div class="give-donor-dashboard-table__rows give-kindness-donations-list" style="opacity: 0.5">
            <div class="give-donor-dashboard-table__row give-kindness-donations-item item-visible">
                <div class="give-donor-dashboard-table__column">
                </div>
                <div class="give-donor-dashboard-table__column">
                </div>
                <div class="give-donor-dashboard-table__column">
                </div>
                <div class="give-donor-dashboard-table__column">
                </div>
                <div class="give-donor-dashboard-table__column">
                </div>
                <div class="give-donor-dashboard-table__column">
                </div>
            </div>       
        </div>
    </div>    
</div>

<script>
    jQuery(window).load(function() {
        jQuery("#give_kindness_manager-campaigns").find('.give-kindness-manager-ring').hide();
        jQuery('.give-kindness-campaigns-container').css("opacity","1");
    });
</script>