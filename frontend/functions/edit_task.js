$taskId = 0;
$(document).ready(function(){
    
    $("#close_modal_edit_task").on("click",(e)=>{
        e.preventDefault();
        $.modal.close();
    });

    $("#form-edit-task").submit((e)=>{
        e.preventDefault();
        let nameTask = $("#modal-edit-task #nameTask").val();
        let description = $("#modal-edit-task #descriptionTask").val();
        let deliveryDate = $("#modal-edit-task #deliveryDate").val();

        if(nameTask == "" || description ==""){
            alert("Name Task and Description are required");
            return;
        }
        let payload = {
            taskId:$taskId,
            nameTask,
            description,
            deliveryDate
        }

        updateTask(payload);
       
    });
});

function showModalEdit(data){
    $taskId = data.task_id;
    $("#form-edit-task #nameTask").val(data.name_task);
    $("#form-edit-task #deliveryDate").val(data.delivery_date);
    $("#form-edit-task #descriptionTask").val(data.description);
    $("#modal-edit-task").modal();   
}

function editTask(id){
    let payload = {
        taskId : id
    }
    fetch("/terra-energy-prueba-tecnica/backend/api/found_task.php",{
        method: "POST",
        body:JSON.stringify(payload),
        headers:{
            'Content-Type':'aplication/json'
        },

    }).then((response)=>response.json()).
    catch((error) => {
        alert("Error not found task")
    })
    .then((response) => {
        if(response.status == 202){
           showModalEdit(response.data);
        }else{
            alert("Error not found Task");
        }
    });
    
}

function updateTask(payload){
    fetch("/terra-energy-prueba-tecnica/backend/api/update_task.php",{
        method: "PATCH",
        body:JSON.stringify(payload),
        headers:{
            'Content-Type':'aplication/json'
        },

    }).then((response)=>response.json()).
    catch((error) => {
        alert("Error edit task")
    })
    .then((response) => {
        if(response.status == 202){
            alert(response.message);
           
            getTasks();
        }else{
            alert("Error edit Task");
        }
    });


}
