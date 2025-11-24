$deleteId = 0;
$(document).ready(function(){
    let payload = {
        taskId : $deleteId
    }
    $("#close_modal_delete_task").on("click",()=>{
        $.modal.close();
    });

    $("#form-delete-task").submit((e)=>{
        e.preventDefault();
        fetch("",{
            method:"DELTE",
            body:payload,
            headers:{
                "Content-Type":"aplication/json"
            }
        }).then((response)=>response.json)
        .catch((error)=>alert("Error Delete Task"))
        .then((response)=>{
            if(response.status==202){
                alert("Succcess Delete Task");
                getTasks();
                $.modal.close();
            }else{
                alert("Error Delete Task")
            }
        });
    });

});

function deleteTask(id){
    $deleteId = id;
    console.log("eliminando...");
    $("#modal-delete-task").modal();
}