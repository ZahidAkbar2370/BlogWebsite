$(document).ready(function () {
    $('.blogUpdateStatus').on('change', function () {
        var status = $(this).prop('checked') ? 'active' : 'inactive';
        var id = $(this).data('blog-id');

        $.ajax({
            url: "/backend/update-blog-status?id="+id+"&status="+status,
            method: 'GET',
            success: function (response) {
              toastr.success("Status Updated Successfully");
            },
            error: function (xhr) {
                toastr.error("Error! Something Wrong");
            }
        });
    });

    $('.categoryUpdateStatus').on('change', function () {
        var status = $(this).prop('checked') ? 'active' : 'inactive';
        var id = $(this).data('category-id');

        $.ajax({
            url: "/backend/update-category-status?id="+id+"&status="+status,
            method: 'GET',
            success: function (response) {
              toastr.success("Status Updated Successfully");
            },
            error: function (xhr) {
              toastr.error("Error! Something Wrong");
            }
        });
    });

    $('.editCategoryBtn').click(function() {
      $('#editCategoryModal').modal('show');
    
      var categoryName = $(this).closest('tr').find('.editable').text();
      var categoryId = $(this).closest('tr').find('.editable').data('category-id');
    
      $('#editCategoryName').val(categoryName);
      $('#editCategoryId').val(categoryId);
    });
    
    $('.editCategoryModalCloseBtn').click(function() {
      $('#editCategoryModal').modal('hide');
      $('#editCategoryName').val('');
    });



});



function previewImage() {
  var input = document.getElementById('imageInput');
  var preview = document.getElementById('imagePreview');
  
  preview.style.display = "block";

  var reader = new FileReader();
  reader.onload = function (e) {
      preview.src = e.target.result;
  };

  reader.readAsDataURL(input.files[0]);
}