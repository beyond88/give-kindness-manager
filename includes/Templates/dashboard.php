<div id="give-donor-dashboard">
   <div class="give-donor-dashboard-desktop-layout">
      <?php give_kindness_manager_templates_part( 'header', $object ); ?>
      <?php give_kindness_manager_templates_part( 'sidebar' ); ?>

      <div class="give-donor-dashboard-desktop-layout__tab-content">
         <?php //give_kindness_manager_templates_part( 'stats/stats', $object ); ?>
         <?php give_kindness_manager_templates_part( 'campaigns/campaigns', $object ); ?>
         <?php //give_kindness_manager_templates_part( 'campaigns/edit-campaign', $object ); ?>
         <?php give_kindness_manager_templates_part( 'settings/settings', $object ); ?>
         <?php //give_kindness_manager_templates_part( 'profile/profile', $object ); ?>

         <?php give_kindness_manager_templates_part( 'campaigns/edit-campaign', $object ); ?>
      </div>
   </div>
</div>