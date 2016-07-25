var todoApp = angular.module('todoApp', [
    'ngRoute',
    'todoAppControllers',
    'todoAppServices',
]);

todoApp.config([
    '$routeProvider',
    '$locationProvider',
    function ($routeProvider, $locationProvider) {
        $routeProvider.when ('/', {
            templateUrl: 'partials/home.html',
            controller: 'HomeController',
        }).when ('/login', {
            templateUrl: 'partials/login.html',
            controller: 'LoginController',
        }).when ('/signup', {
            templateUrl: 'partials/signup.html',
            controller: 'SignUpController',
        }).otherwise({
            redirectTo: '/',
        });
        
        // if (window.history && window.history.pushState) {
        //     $locationProvider.html5Mode({
        //       enabled: true,
        //       requireBase: true,
        //     });
        // }
    }
]);