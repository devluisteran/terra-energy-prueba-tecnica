<?php
    require_once("../config/db.php");

    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn = new DBConnect();

        $data = file_get_contents('php://input');
        $json_data = json_decode($data,true);
        $taskId = $json_data['taskId'];

        $query = "SELECT task_id,name_task,delivery_date,description,created_at FROM tasks 
        WHERE deleted_at is null and task_id = :taskId";

        $stmt = $conn->pdo->prepare($query);
        $stmt->execute([
            "taskId"=>$taskId
        ]);

        $response = [
            "status"=>202,
            "message"=>"Operation success",
            "data"=>$stmt->fetch()
        ];

        echo json_encode($response);
        exit();

    }else{
         echo json_encode([
            "status"=>405,
            "message"=>"Method not Allowed"
        ]);
        exit();
    }
?>    