$(document).ready(function() {
	$('#btn-signout').on('click', function(e) {
		e.preventDefault();

		$.ajax({
			url: 'Handlers/AccountHandler.php',
			type: 'POST',
			data: {action: 'Logout'},

			success: function(data) {
				// console.log(data);
				window.location.href = './';
			}
		})
	})
})