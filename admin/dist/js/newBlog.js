$(document).ready(function() {

	$('#picture').on('change', function(event) {
		/* Act on the event */
		var file, img;
		var img_width, img_height;

		if  (file = $(this).get(0).files[0]) {
			img = new Image();
			img.onload = function() {
				img_width = this.width;
				img_height = this.height;
				$('#preview_img').attr({
					width: img_width / 5,
					height: img_height / 5
				});
				// console.log(this.width + ' ' + this.height);
			};
			img.onerror = function() {
				alert('not valid file: ' + file.type);
			};
			img.src = URL.createObjectURL(file);
			var img_obj_url = URL.createObjectURL(file);

    		$("#preview_img").attr('src', img_obj_url).show();
		}

    	// console.log($("#picture").get(0).files[0]);
	});

	$('#postBlog').submit(function(e) {
		return false;
	});

	$('.btnPublish').on('click', function(e) {
		e.preventDefault();

		var today = moment().format("hh:mm, MMMM Do YY");
		var formData = new FormData();

		formData.append('blog_title', $('#blog_title').val());
		formData.append('picture', $('input[type=file]')[0].files[0]);
		formData.append('content', $('#summernote').summernote('code'));
		formData.append('category_id', $('select[name=category_id]').find(':selected').val());
        formData.append('blog_slug', $('#blog_slug_hidden').val());
		formData.append('date', today);
		formData.append('action', 'publishBlog');

		$.ajax({
		    url: 'Handlers/BlogHandler.php',
		    type: 'POST',
		    data: formData,
		    async: false,
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function (data) {
		      console.log(data);
		      if (data)
		      	alert('Published successfully!');
                location.reload();
		    }
	  	});

	 //  	return false;
	});
})
