var todoAppControllers = angular.module('todoAppControllers', []);

todoAppControllers.controller('HomeController', function ($scope, $http, $location, userService, todoService) {
    
    $scope.create = function () {
        if ($scope.data.text.create != '') {
            todoService.create({
                content: $scope.data.text.create,
            }, function () {
                $scope.refresh();
                $scope.data.text.create = '';
            }, function () {
				alert('Алдаа гарлаа.');
            })
        }
    }
    
    $scope.load = function (todoId) {
        $scope.data.editMode = 'update';
        $scope.data.updateId = todoId;
        for (var i = $scope.data.todos.length; i--; ) {
	        if ($scope.data.todos[i].id == todoId) {
                $scope.data.text.update = $scope.data.todos[i].content;
                break;
	        }
	    }
    }
    
    $scope.update = function() {
        var todoId = $scope.data.updateId;
        todoService.update(todoId, {
            content: $scope.data.text.update,
            status: 'published',
        }, function () {
            $scope.refresh();
            $scope.data.editMode = 'create';
        }, function () {
            $scope.data.editMode = 'create';
        });
    }
    
    $scope.changeStatus = function(todoId, remove = true) {
        var text = '';
        for (var i = $scope.data.todos.length; i--; ) {
	        if ($scope.data.todos[i].id == todoId) {
                text = $scope.data.todos[i].content;
                break;
	        }
	    }
        
        todoService.update(todoId, {
            content: text,
            status:  remove ? 'deleted' : 'published',
        }, function () {
            $scope.refresh();
            $scope.data.editMode = 'create';
        }, function () {
            $scope.data.editMode = 'create';
        });
    }
    
    $scope.logout = function (){
		userService.logout();
		$location.path('/login');
	}
    
    $scope.remove = function (todoId) {
        if (confirm('Устгах уу?')) {
            todoService.remove(todoId, function () {
                $scope.refresh();
            }, function () {
                alert('Алдаа гарлаа.');
            });
        }
    }
    
    $scope.refresh = function () {
        todoService.all(function (response) {
            $scope.data.todos = response;
        }, function (response) {
        });
    }
    
    $scope.data = {
        todos: [],
        text: {
            create: '',
            update: '',
        },
	    editMode: 'create',
	    updateId: null,
    }
    
    if (!userService.isAuthenticated ()) {
        $location.path('/login');
    }
    
    $scope.refresh();
});

todoAppControllers.controller('LoginController', function ($scope, $http, $location, userService) {
    $scope.login = function () {
        userService.login($scope.email, $scope.password,
        function(response) {
            $location.path('/');
        },
        function(response) {
			alert('Алдаа гарлаа.');
        });
    }
});

todoAppControllers.controller('SignUpController', function ($scope, $http, $location, userService) {
    $scope.signup = function() {
		userService.signup(
			$scope.name, $scope.email, $scope.password,
			function(response){
				alert('Амжилттай бүргэгдлээ, ' + $scope.name + '!');
				$location.path('/login');
			},
			function(response){
				alert('Алдаа гарлаа.');
			}
		);
	}

	$scope.name = '';
	$scope.email = '';
	$scope.password = '';
});