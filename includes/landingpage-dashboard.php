
<div class="wrap" ng-app="landingpage">
  <h2 class='opt-title'><span id='icon-options-general' class='analytics-options'><img src="<?php echo plugins_url('landingpage/img/big_logo.png');?>" alt=""></span>
    <?php echo __( 'Landing Page Dashboard', 'landing-page' ); ?>
  </h2>
  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
  <div class="container">
      <div class="row">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href data-target="#home" role="tab" data-toggle="tab">Template</a></li>
            <li role="presentation"><a href data-target="#pro" role="tab" data-toggle="tab">Editor</a></li>
            <li role="presentation"><a href data-target="#msg" role="tab" data-toggle="tab">Messages</a></li>
          </ul>

          <div class="tab-content" ng-controller="LandingPageController as todoList">
              <div id="home" class="tab-pane active">
                <div class="container">
                  <div class="row" id="main">

                    <componenttemplate ng-repeat="item in todoList.todos"> </componenttemplate>

                  </div> 
                </div>
              </div>

              <div id="pro" class="tab-pane">
                <div id="page-builder-fixed">
                  <div id="page-builder">
                    <div class="aqpb-wrap aqpbdiv">
                      <form id="update-page-template" >
                        <div id="aqpb-header">
                          &nbsp;
                        </div>

                        <div id="aqpb-body">
                          &nbsp;
                        </div>

                        <div id="aqpb-footer">
                          &nbsp;
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="msg" class="tab-pane">

              </div>
          </div>
      </div>
  </div>
</div>