app.service('postData', ['$resource', function($resource) {

	this.GetPostData = function(postId) {

		var postApi = $resource("api.php?q=:postId",{
			callback: "JSON_CALLBACK",
			postId: '@id'
		});

		var result = postApi.get({postId: postId});

		return result;
		
		 
	}

}]);

app.service('homePagePosts',['$resource', function($resource) {

	this.GetHomeData = function(postslug) {

		var homeApi = $resource("api.php?p=:postId", {
			callback: "JSON_CALLBACK",
			postId: '@id'
		});

		var result = homeApi.get({postId: postslug});

		return result;
	}
}]);

app.service('ratingService', ['$resource', function($resource) {

	//updates DB with new vote POST
	this.addVote = function(newRatingVal,postslug) {
		var postApi = $resource("rating.php");
		var data = {
			"r": newRatingVal,
			"postslug": postslug
		};
		postApi.save(data);

		
	};

	//Grab the updated data: GET
	this.newData = function(postslug) {

		var postApi = $resource("api.php?q=:postId",{
			callback: "JSON_CALLBACK",
			postId: '@id'
		});

		var result = postApi.get({postId: postslug});
		

		return result;
	};


}]);



//not in use, dummy dataholder to pass data between controllers
app.service('dataHolder',[function(){

	this.data = {};

}]);
