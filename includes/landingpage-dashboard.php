
<div class="wrap" ng-app="landingpage">
  <h2 class='opt-title'><span id='icon-options-general' class='analytics-options'><img src="<?php echo plugins_url('landingpage/img/big_logo.png');?>" alt=""></span>
    <?php echo __( 'Landing Page Dashboard', 'landing-page' ); ?>
  </h2>
  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
  <div class="container" ng-controller="LandingPageController">
      <div class="row">

        <componenttemplate dir-paginate="item in todos | itemsPerPage: 10"> </componenttemplate>
         
      </div>
  </div>
  <div class="container" ng-controller="LandingPageController">
    <div class="text-center">
      <dir-pagination-controls boundary-links="true" template-url="<?php echo plugins_url('landingpage/view/dirPagination.tpl.html');?>"></dir-pagination-controls>
    </div>
  </div>
</div>