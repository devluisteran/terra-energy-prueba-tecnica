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

        if(nameTask == "" || description ==""){
            alert("Name Task and Description are required");
            return;
        }

        
    });
});