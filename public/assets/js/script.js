$(document).ready(function () {
    $('#data-table-student').DataTable({
        "columnDefs": [
            { "width": "10%", "targets": 0 },
            { "width": "20%", "targets": 1 },
            { "width": "40%", "targets": 2 },
            { "width": "30%", "targets": 3 }
        ],
        "autoWidth": false
    });
});

function toggleFunc(id) {
    const inputDiv = document.getElementById(`input-${id}`);
    const displayDiv = document.getElementById(`display-${id}`);

    if (inputDiv.classList.contains('d-none')) {
        inputDiv.classList.remove('d-none');
        displayDiv.classList.add('d-none');
    } else {
        inputDiv.classList.add('d-none');
        displayDiv.classList.remove('d-none');
    }
}