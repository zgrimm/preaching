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