angular.module('landingpage', ['angularUtils.directives.dirPagination'])
  .controller('LandingPageController', function($scope) {
    var todoList = this;

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.meals = [];

    $scope.todos = [];

    for (var i = 1; i <= 100; i++) {
      $scope.todos.push('meal ' + i);
    }
 
    
    $scope.selectedTemplate = function(){
      jQuery('.nav-tabs > .active').next('li').find('a').trigger('click');
    };

    $scope.pageChangeHandler = function(num) {
        console.log('meals page changed to ' + num);
    };
 
  })

  .directive('componenttemplate', function() {
   
    return {
        restrict: 'E',
        scope: {},
        templateUrl: '../wp-content/plugins/landingpage/view/templates.html'
    };
  })

jQuery( document ).ready( function( $ ) {
  jQuery('#main').imagesLoaded( function(){
      jQuery('#main').masonry({
        itemSelector : '.col-md-3'
      });
    });
});


