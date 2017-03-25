// Wrap everything in a self-invoking anonymous function to prevent global
// variable leakage
(function() {

// An object form field IDs to their validation messages
var validationMessages = {
	'email-field': 'Please enter a valid email address',
	'phone-field': 'Please enter a valid phone number in the form: xxx-xxx-xxxx',
	'isbn-field': 'Please enter the 10- or 13-digit ISBN of your textbook',
	'book-price-field': 'Please enter a dollar amount like $50 or $19.99'
};

// Enable validation for a form field DOM element using the given message
function addFieldValidation(field, message) {
	field.addEventListener('change', function (event) {
		if (event.target.setCustomValidity) {
			// Consider field valid until proven invalid
			event.target.setCustomValidity('');
		}
	}, false);
	field.addEventListener('invalid', function (event) {
		console.log('invalid!');
		// Display custom validation message if
		if (event.target.setCustomValidity && !event.target.validity.valid) {
			event.target.setCustomValidity(message);
		}
	}, false);
}

// Enable validation for all necessary form fields
function addAllFormValidation() {
	for (var fieldId in validationMessages) {
		if (validationMessages.hasOwnProperty(fieldId)) {
			var field = document.getElementById(fieldId);
			var message = validationMessages[fieldId];
			if (field) {
				addFieldValidation(field, message);
			}
		}
	}
}

// Add a convenient shortcut to the email field where the user can simply enter
// their campus username and the field will add on @cougars.csusm.edu
function addCampusUsernameShortcut() {
	var emailField = document.getElementById('email-field');
	if (emailField) {
		emailField.addEventListener('change', function () {
			// If current value is campus username
			if (/^\s*([a-z]{1,5}\d{3})\s*$/.test(emailField.value)) {
				emailField.value = emailField.value.replace(/\s+/g, '') + '@cougars.csusm.edu';
			}
		});
	}
}

addAllFormValidation();
addCampusUsernameShortcut();

}());
