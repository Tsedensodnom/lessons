var todoAppServices = angular.module('todoAppServices', [
    'LocalStorageModule',
    'restangular',
]);

todoAppServices.factory('userService', ['$http', 'localStorageService', function($http, localStorageService) {
    function login (email, password, onSuccess, onError) {
        $http.post('/api/login', {
            email: email,
            password: password,
        }).then (function (response) {
            localStorageService.set('isAuthenticated', true);
            onSuccess (response);
        }, function (reponse) {
            onError (reponse);
        });
    }
    
    function signup (name, email, password, onSuccess, onError) {
        $http.post('/api/signup', {
            name: name,
            email: email,
            password: password
        })
        .then(function(response) {
            onSuccess(response);
        }, function(response) {
            onError(response);
        });
    }
    
    function logout () {
        localStorageService.remove('isAuthenticated');
        $http.get('/api/logout');
    }
    
    function isAuthenticated () {
        if (localStorageService.get ('isAuthenticated')) {
            return true;
        }
        return false;
    }
    
    return {
        login: login,
        signup: signup,
        logout: logout,
        isAuthenticated: isAuthenticated,
    };
}]);

todoAppServices.factory('todoService', ['Restangular', 'userService', function(Restangular, userService) {
    function create (data, onSuccess, onError) {
        Restangular.all('api/todos').post(data).then(function (response) {
            onSuccess(response);
        }, function(response){
            onError(response);
        });
    }
    
    function all (onSuccess, onError) {
        Restangular.all('api/todos').getList().then(function (response) {
            onSuccess(response);
		}, function(){
			onError(response);
		});
    }
    
    function remove(todoId, onSuccess, onError){
		Restangular.one('api/todos/', todoId).remove().then(function(){
			onSuccess();
		}, function(response){
			onError(response);
		});
	}
	
	function update (todoId, data, onSuccess, onError) {
		Restangular.one("api/todos").customPUT(data, todoId).then(function (response) {
		    onSuccess(response);
		}, function(response){
		    onError(response);   
		});
	}
    
    return {
        create: create,
        all: all,
        remove: remove,
        update: update,
    }
}]);