export function useStatusButton({ buttonId, status }) {
    window
        .swal({
            title: "Apakah anda yakin?",
            text: "Status penerimaan pendaftar akan berubah",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Batal",
                    value: null,
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true,
                },
                confirm: {
                    text: status === "reject" ? "Tolak" : "Terima",
                    value: true,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                },
            },
        })
        .then((value) => {
            if (value) {
                $(`#${buttonId}`).closest("form").trigger("submit");
            }
        });
}
