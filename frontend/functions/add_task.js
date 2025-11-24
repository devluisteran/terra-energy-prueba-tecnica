$(document).ready(function(){
    $("#btn-add-task").on("click",(e)=>{
        e.preventDefault();
        console.log("abriendo modal...");
        $("#modal-add-task").modal();
    });

    $("#close_modal_task").on("click",(e)=>{
        e.preventDefault();
        console.log("cerrando modal...");
        $.modal.close();
    });

    $("#form-add-task").submit((e)=>{
        e.preventDefault();
        console.log("save...");
        let nameTask = $("#nameTask").val();
        let description = $("#descriptionTask").val();
        let deliveryDate = $("#deliveryDate").val();

        if(nameTask == "" || description ==""){
            alert("Name Task and Description are required");
            return;
        }
        let payload = {
            nameTask,
            description,
            deliveryDate
        }

        saveTask(payload);
       
    });
});

function saveTask(payload){
    fetch("/terra-energy-prueba-tecnica/backend/api/add_task.php",{
        method: "POST",
        body:JSON.stringify(payload),
        headers:{
            'Content-Type':'aplication/json'
        },

    }).then((response)=>response.json()).
    catch((error) => {
        alert("Error add task")
    })
    .then((response) => {
        console.log("Success:", response)
        if(response.status == 202){
            alert(response.message);
            $("#nameTask").val('');
            $("#descriptionTask").val('');
            getTask();
        }else{
            alert("Error Add Task");
        }
    });


}
