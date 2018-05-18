<script>

var app = {

	initialize: function () {
		console.log(this);
		this.setUpListeners();
	},

	setUpListeners: function () {
		$('form').on('submit', app.submitForm);
	},

	submitForm: function (e) {
		

		var form = $(this),
			submitBtn = form.find('button[type="submit"]');

		if (app.validateForm(form) === false) {
			e.preventDefault();

			return false;
		}
		//submitBtn.attr('disabled', 'disabled');
	},

	validateForm: function (form) {

		var inputs = form.find('input'),
			select = form.find('select'),
			valid = true;

		//inputs.tooltip('destroy');

		$.each(inputs, function(index, val) {
			
			var input = $(val),
				val = input.val(),

				formGroup = input.parents('.form-group'),
				label = formGroup.find('label').text().toLowerCase(),
				firstWord = $.trim(val),
				upCase = firstWord.toUpperCase(),
				err = label.replace(/[^A-Za-zА-Яа-яЁё]/g, ""),
				textError = 'Enter '+ err;

			if ($.trim(val).length === 0) {
				input.addClass('is-invalid');
				input.parent().next().text('').css('display', 'none');
				input.tooltip({	
					trigger: 'manual', // вызывается только по команде,а не при hover
					placement: 'right',
					title: textError
				}).tooltip('show');

				valid = false;

			} 	else if (input.hasClass('name')) {
				if ($.trim(val)[0] !== upCase[0]) {

					app.errorInfo(input);
					input.parent().next().text('The first letter must be the capital').css('display', 'block');  
					valid = false;
				} else if ($.trim(val).length < 3) {

					app.errorInfo(input);
					input.parent().next().text('The '+err+' must be at least 3 characters').css('display', 'block');  
					valid = false;
				} else if ($.trim(val).length > 25) {

					//$(this).next().addClass('glyphicon-remove').removeClass('glyphicon-ok');
					app.errorInfo(input);
					input.parent().next().text('The '+err+' must be no more than 25 characters').css('display', 'block');  
					valid = false;
				} else {
					app.successInfo(input);
				}
			}	else if(input.hasClass('password')) {
				if ($.trim(val).length < 5) {
					app.errorInfo(input);
					input.parent().next().text('The '+err+' must be at least 5 characters').css('display', 'block');  
					valid = false;
				} else if ($.trim(val).length > 25) {

					//$(this).next().addClass('glyphicon-remove').removeClass('glyphicon-ok');
					app.errorInfo(input);
					input.parent().next().text('The '+err+' must be no more than 25 characters').css('display', 'block');  
					valid = false;
				} else {
					app.successInfo(input);
				}
			}
		});
		
		if (select.val() == null && select.val() !== undefined) {
			valid = false;
			select.next().text('Select role').removeClass('valid-feedback').addClass('invalid-feedback').css('display', 'block');
			//select.next().removeClass('valid-feedback').addClass('invalid-feedback');
			select.removeClass('is-valid').addClass('is-invalid');
		}
		else if (select.val() !== undefined) {
			select.next().text('Select role').removeClass('invalid-feedback').addClass('valid-feedback').css('display', 'none');
			select.removeClass('is-invalid').addClass('is-valid');
		}

		//console.log(valid);
		return valid;
	},

	errorInfo : function (input) {
		input.tooltip('hide');
		input.removeClass('is-valid').addClass('is-invalid');
		input.parent().next().removeClass('valid-feedback').addClass('invalid-feedback');
	},

	successInfo : function (input) {

		input.tooltip('hide');
		input.removeClass('is-invalid').addClass('is-valid');
		input.parent().next().removeClass('invalid-feedback').addClass('valid-feedback');
		input.parent().next().text('').css('display', 'none');
	}
}

app.initialize();



</script>
</body>
</html>