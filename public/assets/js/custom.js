$(document).ready(function() {
    $('.blogUpdateStatus').on('change', function() {
        var status = $(this).prop('checked') ? 'active' : 'inactive';
        var id = $(this).data('blog-id');

        $.ajax({
            url: "/backend/update-blog-status?id=" + id + "&status=" + status,
            method: 'GET',
            success: function(response) {
                toastr.success("Status Updated Successfully");
            },
            error: function(xhr) {
                toastr.error("Error! Something Wrong");
            }
        });
    });

    $('.categoryUpdateStatus').on('change', function() {
        var status = $(this).prop('checked') ? 'active' : 'inactive';
        var id = $(this).data('category-id');

        $.ajax({
            url: "/backend/update-category-status?id=" + id + "&status=" + status,
            method: 'GET',
            success: function(response) {
                toastr.success("Status Updated Successfully");
            },
            error: function(xhr) {
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


    $('#breedSelectedCategory').on("change", function() {
        // breedSelectedCategory
        var selectedValue = $(this).val();
        $.ajax({

            url: "get-characteristics/" + selectedValue,
            type: 'GET',
            success: function(response) {
                console.log(response);
                $('.showCharacteristics').html(response);
            },
            error: function(error) {
                console.error('Error fetching dynamic form:', error);
            }
        });
    });

    $('#category').on('change', function() {
        var categoryId = $(this).val();

        if (categoryId) {
            $.ajax({
                type: 'GET',
                url: '/backend/get-subcategories/' + categoryId,
                dataType: 'json',
                success: function(data) {
                    $('#sub_category').empty();
                    $('#sub_category').append('<option value="" selected disabled>Select Sub Category</option>');

                    if (data.subcategories) {
                        $.each(data.subcategories, function(key, value) {
                            $('#sub_category').append('<option value="' + value.id + '">' + value.sub_category_name + '</option>');
                        });
                    }


                    $('#breed').empty();
                    $('#breed').append('<option value="" selected disabled>Select Breed</option>');
                    if (data.breeds) {
                        $.each(data.breeds, function(key, value) {
                            $('#breed').append('<option value="' + value.id + '">' + value.breed_name + '</option>');
                        });
                    }
                }
            });
        } else {
            $('#sub_category').empty();
            $('#breed').empty();
            $('#sub_category').append('<option value="" selected disabled>Select Sub Category</option>');
            $('#breed').append('<option value="" selected disabled>Select Breed</option>');
        }
    });

});



function previewImage() {
    var input = document.getElementById('imageInput');
    var preview = document.getElementById('imagePreview');

    preview.style.display = "block";

    var reader = new FileReader();
    reader.onload = function(e) {
        preview.src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
}

function addDynamicField() {
    var dynamicFieldsContainer = $("#dynamic-fields-container");

    var newField = `
        <div class="row mt-3">
            <div class="col-5">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="characteristic_title[]" placeholder="Characteristic Title" required>
                </div>
            </div>

            <div class="col-5">
                <div class="form-group">
                    <label>Text</label>
                    <input type="number" min="0" max="100" class="form-control" name="characteristic_text[]" placeholder="Characteristic Text" required>
                </div>
            </div>

            <div class="col-2 mt-3">
                <button type="button" class="btn btn-danger" onclick="removeDynamicField(this)"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    `;

    dynamicFieldsContainer.append(newField);
}

function removeDynamicField(button) {
    $(button).closest('.row').remove();
}