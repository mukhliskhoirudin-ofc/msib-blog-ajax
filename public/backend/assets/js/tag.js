// datatable serverside
$(function () {
    $('#tag-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/panel/tags/serverside",
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

// open modal create
const modalCreate = () => {
    $('#modal-create').modal('show');
    $('.modal-title').html('<i class="ti ti-plus"></i> Create Tags');
    $('#form-tag')[0].reset();
    $('#form-tag').removeData('id'); // hapus id → mode create
    resetValidation();
}

// open modal edit
$(document).on('click', '.btn-edit', function (e) {
    e.preventDefault();
    let id = $(this).data('id'); // ambil dari data-id yang di tambahkan di button

    showLoading("Loading...");
    $.ajax({
        url: '/panel/tags/' + id + '/edit',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            closeLoading();
            $('#modal-create').modal('show');
            $('.modal-title').html('<i class="ti ti-pencil"></i> Edit Tags');

            $('#form-tag input[name="name"]').val(response.data.name);
            $('#form-tag input[name="slug"]').val(response.data.slug);

            $('#form-tag').data('id', response.data.uuid); // simpan id → mode edit
        },
        error: function () {
            closeLoading();
            toastError("Failed to load data!");
        }
    });
});

// create / update submit
$('#form-tag').on('submit', function (e) {
    e.preventDefault();

    let id = $(this).data('id');
    let url = id ? '/panel/tags/' + id : '/panel/tags';

    const inputForm = new FormData(this);
    if (id) {
        inputForm.append('_method', 'PUT'); // spoof → update
    }

    showLoading(id ? "Updating..." : "Creating...");
    $.ajax({
        type: 'POST', // selalu POST, Laravel baca _method untuk update
        url: url,
        data: inputForm,
        contentType: false,
        processData: false,
        dataType: 'json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (response) {
            closeLoading();
            toastSuccess(response.message);
            reloadDataTable('#tag-table');
            $('#modal-create').modal('hide');
            $('#form-tag')[0].reset();
            $('#form-tag').removeData('id'); // reset ke create mode
            $('#form-tag').validate().resetForm();
        },
        error: function (xhr) {
            closeLoading();
            toastError(xhr.responseJSON?.message ?? "Something went wrong!");
        }
    });
});

// delete
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
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            showLoading("Deleting...");
            $.ajax({
                url: '/panel/tags/' + id,
                type: 'DELETE',
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (response) {
                    closeLoading();
                    toastSuccess(response.message);
                    reloadDataTable('#tag-table');
                },
                error: function (xhr) {
                    closeLoading();
                    toastError(xhr.responseJSON?.message ?? "Delete failed!");
                }
            });
        }
    });
});