// Konfigurasi default untuk toast
let Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timerProgressBar: true,
    timer: 2000,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal
            .stopTimer)
        toast.addEventListener('mouseleave', Swal
            .resumeTimer)
    },
    showClass: {
        popup: 'animate__animated animate__fadeInDown animate__faster'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp animate__faster'
    }
})

// Helper untuk success toast
const toastSuccess = (message) => {
    Toast.fire({
        icon: 'success',
        title: message
    });
};

// Helper untuk error toast
const toastError = (message) => {
    Toast.fire({
        icon: 'error',
        title: message
    });
};

// Helper untuk reload DataTable
const reloadDataTable = (selector) => {
    $(selector).DataTable().ajax.reload(null, false);
}

// Helper untuk loading
const showLoading = (message) => {
    Swal.fire({
        title: message,
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        },
        showConfirmButton: false,
        backdrop: true
    });
};

// Helper untuk close loading
const closeLoading = () => {
    Swal.close();
};

// helper untuk hapus validasi
const resetValidation = () => {
    $('.is-invalid').removeClass('is-invalid');
    $('.is-valid').removeClass('is-valid');
    $('.invalid-feedback').remove();
    $('.valid-feedback').remove();
}

// Global js validation agar langsung keluar validasinya
$.validator.setDefaults({
    onkeyup: function (element) {
        $(element).valid();
    }
});
