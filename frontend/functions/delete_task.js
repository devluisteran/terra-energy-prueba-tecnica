$deleteId = 0;
$(document).ready(function(){
    
    $("#close_modal_delete_task").on("click",()=>{
        $.modal.close();
    });

    $("#form-delete-task").submit((e)=>{
        e.preventDefault();

        let payload = {
            taskId : $deleteId
        }

    fetch("/terra-energy-prueba-tecnica/backend/api/delete_task.php",{
        method: "DELETE",
        body:JSON.stringify(payload),
        headers:{
            'Content-Type':'aplication/json'
        },

    }).then((response)=>response.json()).
    catch((error) => {
        alert("Error Delete task")
    })
    .then((response) => {
        if(response.status == 202){
            alert("Delete Task Success");
            getTasks();
            $.modal.close();

        }else{
            alert("Error Delete Task");
        }
    });

    });

});

function deleteTask(id){
    $deleteId = id;
    $("#modal-delete-task").modal();
}