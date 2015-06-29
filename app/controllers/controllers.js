
app.controller('homeController', ['$scope','$routeParams', 'homePagePosts', function($scope, $routeParams, homePagePosts) {

	$scope.currentId = 1;

	$scope.posts = [];
	
	$scope.updateHome = function() {
		$scope.GetMoPosts = homePagePosts.GetHomeData($scope.currentId);

		$scope.GetMoPosts.$promise.then(function() {
			
			for (var i =0 ; i < 3; i++) {

				if(!$scope.GetMoPosts[i]){ return; }

				$scope.posts.push($scope.GetMoPosts[i]);
				
				$scope.posts[$scope.currentId - 1].imgUrl = "http://localhost/preaching/app/imgs/" + $scope.posts[$scope.currentId - 1].imgUrl;
				
				$scope.currentId++;
			}	


			
			console.log($scope.currentId);
		});
	}


}]);


app.controller('postController', ['$scope', '$routeParams', '$sce', 'postData', 'dataHolder', function($scope, $routeParams, $sce, postData, dataHolder){

	$scope.postslug = $routeParams.post;


	$scope.postInfo = postData.GetPostData($scope.postslug);

	$scope.postInfo.$promise.then(function(){
	
		$scope.postInfo.ytUrl = 'http://www.youtube.com/embed/' +  $scope.postInfo.YtId; 

		$scope.postInfo.trustedYoutube = $sce.trustAsResourceUrl($scope.postInfo.ytUrl);

		console.log($scope.postInfo.ytUrl);
	});

	

	console.log($scope.postInfo);

}]);