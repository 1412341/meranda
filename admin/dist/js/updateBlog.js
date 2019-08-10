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
			};
			img.onerror = function() {
				alert('not valid file: ' + file.type);
			};
			img.src = URL.createObjectURL(file);
			var img_obj_url = URL.createObjectURL(file);

    		$("#preview_img").attr('src', img_obj_url).show();
		}

	});

	$('#postBlog').submit(function(e) {
		return false;
	});

	$('.row').on('click', '.btnPublish', function(e) {
		e.preventDefault();

		var today = moment().format("hh:mm, MMMM Do YY");

		//grab all form data
		var formData = new FormData();
		formData.append('blogId', $('input[name="blog_id"]').val());
		formData.append('blog_title', $('#blog_title').val());
		formData.append('picture', $('input[type=file]')[0].files[0]);
		formData.append('prev_picture', $('input[name="prev_picture"]').val());
		formData.append('content', $('#summernote').summernote('code'));
		formData.append('category_id', $('select[name=category_id]').find(':selected').val());
        formData.append('blog_slug', $('#blog_slug_hidden').val());
		formData.append('date', today);
		formData.append('action', 'updateBlog');

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
		      	alert('Updated successfully!');
                location.reload();
		    }
	  	});

	  	return false;
	});
})
