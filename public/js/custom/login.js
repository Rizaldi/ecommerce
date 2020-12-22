$(document).ready(function() {
	login_member();
});
function login_member() {
	$("#login-form").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 5
			}
		},
		messages: {
			email: {
				required: 'Email harus di isi'
			},
			password: {
				required: 'Password harus di isi',
				minlength: 'Password minimal 5 karakter'
			}
		}
	});
}