app.config(['$routeProvider', function($routeProvider){

	$routeProvider

	.when('/', {
		templateUrl: 'app/pages/home.html',
		controller: 'homeController'
	})

	.when('/:post', {
		templateUrl: 'app/pages/post.html',
		controller: 'postController'
	});

}]);