// datatable serverside
$(function () {
    $('#category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/panel/categories/serverside",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
            className: 'text-center'
        },
        {
            data: 'name',
            name: 'name',
            className: 'text-center'
        },
        {
            data: 'slug',
            name: 'slug',
            className: 'text-center'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            className: 'text-center'
        }
        ]
    });
});
//end datatable serverside


// CRUD Delete (SweetAlert + AJAX)
$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        reverseButtons: true,
        allowOutsideClick: false,
        showClass: {
            popup: 'animate__animated animate__fadeInUp animate__faster'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDown animate__faster'
        }
    }).then((result) => {
        showLoading("Deleting..."); // tampilkan loading, dari helper.js
        if (result.isConfirmed) {
            $.ajax({
                url: '/panel/categories/' + id,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // toast success dan error
                success: function (response) {
                    closeLoading(); // tutup loading
                    toastSuccess(response.message); // panggil fungsi toastSuccess di helper.js
                    reloadDataTable('#category-table');
                },
                error: function (xhr) {
                    closeLoading();
                    toastError(xhr.responseJSON.message);
                    reloadDataTable('#category-table');
                }
            });
        }
    });
});
// end sweetalert + ajax crud