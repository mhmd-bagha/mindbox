$(document).ready(function () {
    $('#table').DataTable({
        "aLengthMenu": [
            [5, 10, 50, 100, -1],
            [5, 10, 50, 100, "همه"]
        ],
        "lengthChange": true,
        "paging": true,
        "filter": true,
        "info": true,
        "responsive": true,
        "ordering": true,
        "language": {
            searchPlaceholder: "",
            "lengthMenu": "نمایش _MENU_ سطر",
            "zeroRecords": "اطلاعاتی یافت نشد",
            "info": "نمایش صفحه _PAGE_ از _PAGES_",
            "infoEmpty": "اطلاعاتی یافت نشد",
            "infoFiltered": "(جستجو از _MAX_ داده موجود)",
        },
        "oLanguage": {
            "sSearch": "جستجو: ",
            "oPaginate": {
                "sNext": "بعدی",
                "sPrevious": "قبلی"
            }
        },
        "columnDefs": [{
            "className": "dt-head-center",
            "targets": "_all"
        }]
    });
});