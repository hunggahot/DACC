function showPopup() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("popup-content").innerHTML = this.responseText;
            document.getElementById("popup").style.display = "block";
        }
    };
    xmlhttp.open("GET", "popup.php", true);
    xmlhttp.send();
}

function hidePopup() {
    document.getElementById("popup").style.display = "none";
}

$(document).ready(function () {
    $('#cartTable').DataTable();
});

$(document).ready(function () {
    $('#categoryTable').DataTable();
});


// Create Category Modal
function addCategory() {
    var formData = $("#addCategoryForm").serialize();
    $.ajax({
        type: "POST",
        url: "?route=create-category",
        data: formData,
        success: function (response) {
            console.log(response);
            $("#addCategoryModal").modal("hide");
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

// Delete Category Modal
$(document).on('click', '.delete-category-btn', function () {
    var categoryId = $(this).data('id');
    debugger
    $.ajax({
        url: '?route=delete-category',
        method: 'POST',
        data: { CategoryId: categoryId },
        success: function (response) {
            console.log(response);
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
});
$(document).ready(function () {
    $('#productTable').DataTable();
});


