app.controller('homeController', ['$scope','$routeParams', 'homePagePosts', function($scope, $routeParams, homePagePosts) {

	$scope.currentId = '1';

	$scope.updateHome = function() {
		$scope.GetMoPosts = homePagePosts.GetHomeData($scope.currentId);

		$scope.GetMoPosts.$promise.then(function() {
			$scope.currentId = (parseInt($scope.currentId) + 2).toString();
			console.log($scope.currentId);
			console.log($scope.GetMoPosts);
		});
	}


}]);


app.controller('postController', ['$scope', '$routeParams', '$sce', 'postData', 'dataHolder', function($scope, $routeParams, $sce, postData, dataHolder){

	$scope.postid = $routeParams.post;


	$scope.postInfo = postData.GetPostData($scope.postid);

	$scope.postInfo.$promise.then(function(){
	
		$scope.postInfo.ytUrl = 'http://www.youtube.com/embed/' +  $scope.postInfo.YtId; 

		$scope.postInfo.trustedYoutube = $sce.trustAsResourceUrl($scope.postInfo.ytUrl);

		console.log($scope.postInfo.ytUrl);
	});

	

	console.log($scope.postInfo);

}]);