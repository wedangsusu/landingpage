angular.module('landingpage', [])
  .controller('LandingPageController', function() {
    var todoList = this;
    todoList.todos = [
      {text:'learn angular', done:true},
      {text:'build an angular app', done:false}];
 
    todoList.addTodo = function() {
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todoText = '';
    };
 
    todoList.remaining = function() {
      var count = 0;
      angular.forEach(todoList.todos, function(todo) {
        count += todo.done ? 0 : 1;
      });
      return count;
    };

    todoList.selectedTemplate = function(){
      jQuery('.nav-tabs > .active').next('li').find('a').trigger('click');
    };
 
    todoList.archive = function() {
      var oldTodos = todoList.todos;
      todoList.todos = [];
      angular.forEach(oldTodos, function(todo) {
        if (!todo.done) todoList.todos.push(todo);
      });
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


