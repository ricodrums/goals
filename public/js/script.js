const axios = require('axios')

function showModal(goal) {

    goal = document.getElementById('goal-id').setAttribute('value', goal)

}

/**
 * Confirm the erase of the Goal using Sweet Alert 2 and Ajax
 * 
 * @param {id of the goal} goal 
 */
function deleteGoal(goal) {
    Swal.fire({
        title: 'Estás seguro?',
        html: "Si borras <b>" + goal.title + '</b> no podrás deshacerlo.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrarlo.'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'goals/' + goal.id,
                data: {
                    "_token": $("meta[name='csrf-token']").attr("content"),
                    "_method": "DELETE",
                    "goal_id": goal.id
                },
                dataType: "json",
                method: 'POST',
                success: function(result) {
                    Swal.fire(
                        'Eliminado!',
                        'El registro ha sido borrado exitosamente.',
                        'success'
                    )
                },
                error: function(result) {
                    window.location.href = "home" //Works but the error is not solved and I cannot find it for now
                }
            });
        } else {
            Swal.fire({
                title: 'Cancelado',
                html: '<b>' + goal.title + '</b>' + ' está a salvo!',
                icon: 'warning'
            })
        }
    })
}