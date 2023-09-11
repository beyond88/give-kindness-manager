<div class="give-donor-dashboard-desktop-layout__tab-menu" id="give-kindness-manager-menu">
    <div class="give-donor-dashboard-tab-menu">
        <!-- <a aria-current="page" class="give-donor-dashboard-tab-link give-donor-dashboard-tab-link--is-active" href="javascript:void(0)" data-tab-id="give_kindness_manager-stats">
            <i class="fas fa-home"></i>
            <?php echo __('Dashboard', 'give-kindness-manager'); ?>
        </a> -->
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-campaigns">
            <i class="fas fa-donate"></i>
            <?php echo __('Campaigns', 'give-kindness-manager'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-settings">
            <i class="fas fa-gear"></i>
            <?php echo __('Settings', 'give-kindness-manager'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-profile">
            <i class="fas fa-id-card"></i>
            <?php echo __('Edit Profile', 'give-kindness-manager'); ?>
        </a>
        <div class="give-donor-dashboard-logout">
            <div class="give-donor-dashboard-tab-link">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                </svg>
                <?php echo __('Logout', 'give-kindness-manager'); ?>
            </div>
        </div>
    </div>
</div>

<!-- 
! 
! Edit campaign menu
!
-->

<div class="give-donor-dashboard-desktop-layout__tab-menu" id="give-kindness-manager-edit-campaign-menu">
    <div class="give-donor-dashboard-tab-menu">
        <a aria-current="page" class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-campaigns" onClick="showMenu('#give-kindness-manager-menu', '#give-kindness-manager-edit-campaign-menu', '', '', '#give_kindness_manager-campaigns')">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <?php echo __(' Back to campaign', 'give-kindness-manager'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-campaign-settings">
            <i class="fas fa-chart-bar"></i>
            <?php echo __(' Campaign Settings', 'give-kindness-manager'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-form-template">
            <i class="fas fa-chart-bar"></i>
            <?php echo __(' Form Template', 'give-kindness-manager'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness_manager-donation-options">
            <i class="fa fa-solid fa-list"></i>
            <?php echo __(' Donation Options', 'give-kindness-manager'); ?>
        </a>
    </div>
</div>