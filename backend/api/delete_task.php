<?php
    require_once("../config/db.php");

    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $conn = new DBConnect();

        $data = file_get_contents('php://input');
        $json_data = json_decode($data,true);

        $taskId = $json_data['taskId'];

        if($taskId == "" ){
            $response = [
                "status"=>402,
                "message"=>"Error, Task not found"
            ];

            echo json_encode($response);
            exit();
        }

        $query = "UPDATE tasks SET deleted_at = now()
        WHERE task_id = :taskId";

        $stmt = $conn->pdo->prepare($query);
        $stmt->execute([
            "taskId"=>$taskId
        ]);

        $response = [
            "status"=>202,
            "message"=>"Delete Task success",
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