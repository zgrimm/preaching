app.directive('ytVid',function() {

	return {
		restrict: 'E',
		templateUrl: 'app/directives/yt.html',
		replace: true, 
		scope: {
			postInfoObject: "=",
			youtube: '@'
			
		}
	};

});

app.directive('homeBox', function() {
	return {
		restrict:'E',
		templateUrl: 'app/directives/homebox.html',
		replace:true,
		scope: {
			postInfoObject: '='
		}
	}
});


// // cant pass form data properly through directive
// app.directive('postRating', function() {
// 	return {
// 		restrict: 'E',
// 		templateUrl: 'app/directives/rate.html',
// 		replace: true,
// 		scope: {
// 			postInfoObject: '='
// 		}
// 	}
// })