
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
		});
	}


}]);


app.controller('postController', ['$scope', '$routeParams', '$sce', 'postData', 'ratingService', function($scope, $routeParams, $sce, postData, ratingService){

	$scope.postslug = $routeParams.post;

	$scope.postInfo = postData.GetPostData($scope.postslug);

	$scope.postInfo.$promise.then(function(){
	
		$scope.postInfo.ytUrl = 'http://www.youtube.com/embed/' +  $scope.postInfo.YtId; 

		$scope.postInfo.trustedYoutube = $sce.trustAsResourceUrl($scope.postInfo.ytUrl);	

		$scope.postInfo.rating = +($scope.postInfo.votePoints) / +($scope.postInfo.numVotes);	
		
	});
	

	$scope.rating = {
		currentRating: '0',
		hasRated: false,
		castVote: function(vote) {
			$scope.rating.currentRating = vote;
		},
		overallRating: 4.2
		
	};

	$scope.$watch('rating.currentRating', function() {
		
		if($scope.rating.currentRating !== '0'){
			//post the new data to the db via a service funcion
			//ratingService.addVote($scope.rating.currentRating);
			//get the latest data from db and calculate overallRating to update
			$scope.rating.newData = ratingService.newData($routeParams.post);
			console.log($scope.rating.newData);

			 $scope.rating.newData.$promise.then(function(){

			 	var numvotes = $scope.rating.newData.numVotes;
			 	var votepoints = $scope.rating.newData.votePoints;

			 	$scope.rating.overallRating = +(votepoints) / +(numvotes);


			
				$scope.rating.hasRated = true;
			});
		}
	});

	


	

}]);