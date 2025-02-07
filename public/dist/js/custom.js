jQuery(function ($) {
    $(".datatable").DataTable({
        ordering: true,
        searching: true,
        paging: true,
        info: true,
        columnDefs: [
            {
                targets: "no-sort",
                orderable: false,
                searchable: false,
            },
        ],
    });
});
