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
})