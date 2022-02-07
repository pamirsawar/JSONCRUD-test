$(document).ready(function() {
    $('#myTable').DataTable();


    $('.action').on('change', function() {

        var action = $(this).val();
        var id = $(this).attr("data-id")
        console.log(action);

        if (action == 'delete') {
            let message = "are you sure you want to delete the record?";
            if (confirm(message) == true) {
                window.location = 'delete.php?action=' + action + '&id=' + id;

            }
        }
        else{
            window.location = 'index.php?action=' + action + '&id=' + id;
        }


    });

    $('#edit-roles').on('change hide.bs.select', function(){

        var roles=$('#edit-roles').val();

        var rolestring = roles.join(',');

        $('#roles').val(rolestring);

    })


});