$(document).ready(()=>{
    getTasks();

});

function getTasks(){
    fetch("/terra-energy-prueba-tecnica/backend/api/get_task.php",{
        method: "GET",
        headers:{
            'Content-Type':'aplication/json'
        },
    }).then((response)=>response.json()).
    catch((error) => {
        alert("Error load info")
    })
    .then((response) => {
        if(response.status == 202){
           let tasks = response.data;

           let tbody = $("#tbody-tasks");
            tbody.empty();
           let html = "";
           if(tasks.length > 0){
                tasks.forEach((element,index) => {
                index = parseInt(index)+1;
                html = "";
                html+="<tr>";
                    html+="<td>"+index;
                    html+="</td>";

                    html+="<td>"+element.name_task;
                    html+="</td>";

                    html+="<td>"+element.description;
                    html+="</td>";

                    html+="<td>"+element.created_at;
                    html+="</td>";

                    html+="<td>"+element.delivery_date;
                    html+="</td>";

                    html+="<td>"
                    html+='<div class="button-group">';
                        html+= '<button class="btn-edit" data-id="'+element.task_id+'">Edit</button>'
                        html+= '<button class="btn-delete" data-id="'+element.task_id+'">Delete</button>'
                    html+='</div>';
                    html+="</td>";

                html+="</tr>";
                tbody.append(html);
                });
           }else{
            html+="<tr>"
                html+='<td colspan="6">';
                    html+="No Records";
                html+="<td>";

            html+="</tr>";
            tbody.append(html);
           }
        }else{
           
        }
    });
}