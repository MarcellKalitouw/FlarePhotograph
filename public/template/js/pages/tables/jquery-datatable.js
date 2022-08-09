$(function () {
    $(".js-basic-example").DataTable({
        responsive: true,
    });

    //Exportable table
    // $(".js-exportable").DataTable({
    //     dom: "Bfrtip",
    //     responsive: true,
    //     buttons: ["csv", "pdf", "print"],
    // });
    $(".js-exportable").DataTable({
        dom: 'BC<"clear">lfrtip',
        colVis: {
            exclude: [0],
            sAlign: "right",
            buttonText: "Show / hide columns",
            bRestore: true,
        },
        buttons: [
            {
                extend: "copyHtml5",
                exportOptions: {
                    columns: [1, ":visible"],
                },
            },
            // {
            //     extend: "excelHtml5",
            //     exportOptions: {
            //         columns: ":visible",
            //     },
            // },
            {
                extend: "pdfHtml5",
                exportOptions: {
                    columns: [0, ":visible"],
                },
            },
            {
                extend: "csv",
                exportOptions: {
                    columns: [0, ":visible"],
                },
            },
            {
                extend: "colvis",
                text: "Pilih Kolum",
                exportOptions: {
                    columns: [0, ":visible"],

                    // columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                },
            },
        ],
    });
});
