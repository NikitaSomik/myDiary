// (function() {

// var app = {

// 	initialize: function () {
// 		console.log(this);
// 		this.setUpListeners();
// 	},

// 	setUpListeners: function () {
// 		$('form').on('submit', app.submitForm);
// 	},

// 	submitForm: function (e) {
		

// 		var form = $(this),
// 			submitBtn = form.find('button[type="submit"]');

// 		if (app.validateForm(form) === false) {
// 			e.preventDefault();

// 			return false;
// 		}
// 		submitBtn.attr('disabled', 'disabled');
// 	},

// 	validateForm: function (form) {

// 		var inputs = form.find('input'),
// 			valid = true;

// 		//inputs.tooltip('destroy');

// 		$.each(inputs, function(index, val) {
			
// 			var input = $(val),
// 				val = input.val(),
// 				formGroup = input.parents('.form-group'),
// 				label = formGroup.find('label').text().toLowerCase(),
// 				firstWord = $.trim(val),
// 				upCase = firstWord.toUpperCase(),
// 				err = label.replace(/[^A-Za-zА-Яа-яЁё]/g, ""),
// 				pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i,
// 				date = new Date(),
// 				textError = 'Enter '+ err;

// 			if ($.trim(val).length === 0 && !input.hasClass('gender') && !input.hasClass('birthday')) {
// 				input.parent().next().text('');
// 				formGroup.addClass('has-error').removeClass('has-success');

// 				input.parent().find('span:last-child').removeClass('glyphicon-ok').addClass('glyphicon-remove');
// 				input.tooltip({	
// 					trigger: 'manual', // вызывается только по команде,а не при hover
// 					placement: 'right',
// 					title: textError
// 				}).tooltip('show');

// 				valid = false;

// 			} 	else if (input.hasClass('name') || input.hasClass('surname')) {
// 				if ($.trim(val)[0] !== upCase[0]) {

// 					app.errorInfo(formGroup, input);
// 					input.parent().next().text('The first letter must be the capital');  
// 					valid = false;
// 				} else if ($.trim(val).length < 3) {

// 					app.errorInfo(formGroup, input);
// 					input.parent().next().text('The '+err+' must be at least 3 characters');
// 					valid = false;
// 				} else if ($.trim(val).length > 25) {

// 					//$(this).next().addClass('glyphicon-remove').removeClass('glyphicon-ok');
// 					app.errorInfo(formGroup, input);
// 					input.parent().next().text('The '+err+' must be no more than 25 characters');
// 					valid = false;
// 				} else {
// 					app.successInfo(formGroup, input);
// 				}
// 			} 	else if (input.hasClass('email')) {
// 				if ($.trim(val).search(pattern) !== 0) {

// 					app.errorInfo(formGroup, input);
// 					input.parent().next().text('The email must be a valid');
// 					valid = false;
// 				}	else {
// 					app.successInfo(formGroup, input);
// 				}
// 			 } 	
// 			else if (input.hasClass('birthday') && $.trim(val)) {

// 				if ($.trim(val).substring(0,4) == date.getFullYear() || $.trim(val).substring(0,4) < 1940) {
// 					formGroup.removeClass('has-success').addClass('has-error');
// 					input.parent().next().text('The birthday must be a valid');
// 					valid = false;
// 				}	else {
// 					app.successInfo(formGroup, input);
// 				}
// 			}	else {
// 				if (!input.hasClass('gender') && !input.hasClass('birthday')) {
// 					app.successInfo(formGroup, input);
// 				}
// 			}
// 		});

// 		return valid;
// 	},

// 	errorInfo : function (formGroup, input) {
// 		input.tooltip('hide');
// 		formGroup.removeClass('has-success').addClass('has-error');
// 		//if (input.parent().find('span').hasClass('glyphicon')) {
// 		input.parent().find('span:last-child').removeClass('glyphicon-ok').addClass('glyphicon-remove');
// 		//}
		
// 		//valid = false;
// 	},

// 	successInfo : function (formGroup, input) {
// 		if (input.parent().find('span').hasClass('glyphicon')) {
// 			input.parent().find('span:last-child').removeClass('glyphicon-remove').addClass('glyphicon-ok');
// 		}
// 		input.tooltip('hide');
// 		input.parent().next().text('');
// 		formGroup.removeClass('has-error').addClass('has-success');
		
// 	}
// }


// app.initialize();




// })();