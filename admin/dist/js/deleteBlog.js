$(document).ready(function() {
	$('.delete').on('click', function(e) {
		e.preventDefault();
		var row = $(this).parent().parent();
        var blogId = $(this).attr('id').replace("blog", "");

        swal({
                title: "Are you sure?",
                text: "Blog wont be recovered after being deleted.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
        				url 		: 			'Handlers/BlogHandler.php',
        				type 		: 			'POST',
        				data 		: 			{'action': 'deleteBlog', blogId: blogId},
        				// dataType 	: 			'json',

        				error: function(jqXHR, textStatus, errorThrown) {
        	  				 console.log("Status:="+textStatus + " Error:="+errorThrown);
        				},

        				success		: 			function(data) {
        					console.log(data);
        					if (data) {
                                swal("Deleted!", "Category is deleted.", "success");


        						row.remove();
        					}
        				}
        			});
                } else {
                    swal("Cancelled", "Blog still remains", "error");
                }
            });

	})
})
