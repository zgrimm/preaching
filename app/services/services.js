app.service('postData', ['$resource', function($resource) {

	this.GetPostData = function(postId) {

		var postApi = $resource("api.php?q=:postId",{
			callback: "JSON_CALLBACK",
			postId: '@id'
		});

		var result = postApi.get({postId: postId});

		console.log(result);
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

app.service('dataHolder',[function(){

	this.data = {};

}]);
