/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.3.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.3/admin/
*/

var handleBootstrapWizards = function() {
	"use strict";
	$('#wizard').smartWizard({ 
		selected: 0, 
		theme: 'default',
		transitionEffect:'',
		transitionSpeed: 0,
		useURLhash: false,
		showStepURLhash: false,
		toolbarSettings: {
			toolbarPosition: 'bottom'
		}
	});
};

var FormWizard = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleBootstrapWizards();
		}
	};
}();