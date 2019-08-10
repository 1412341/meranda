$(document).ready(function() {
	$('.delete').on('click', function(e) {
		e.preventDefault();
		var row = $(this).parent().parent();
        var categoryId = $(this).attr('id').replace("category", "");

        swal({
                title: "Are you sure?",
                text: "Catgory wont be recovered after being deleted.",
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
        				url 		: 			'Handlers/CategoryHandler.php',
        				type 		: 			'POST',
        				data 		: 			{'action': 'deleteCategory', categoryId: categoryId},
        				// dataType 	: 			'json',

        				error: function(jqXHR, textStatus, errorThrown) {
        	  				 console.log("Status:="+textStatus + " Error:="+errorThrown);
        				},

        				success		: 			function(data) {
        					console.log(data);
        					if (data) {
                                swal("Deleted!", "Category is deleted.", "success");
        						// alert('Bạn đã xóa thành công!');


        						row.remove();
        					}
        				}
        			});
                } else {
                    swal("Cancelled", "Category still remains", "error");
                }
            });
	})
})
