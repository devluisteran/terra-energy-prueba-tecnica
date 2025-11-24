<?php
    require_once("../config/db.php");

    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"]=="PATCH"){
        $conn = new DBConnect();

        $data = file_get_contents('php://input');
        $json_data = json_decode($data,true);

        $taskId = $json_data['taskId'];
        $nameTask = $json_data['nameTask'];
        $description = $json_data['description'];
        $deliveryDate = $json_data['deliveryDate'];

        if($nameTask == "" || $description==""){
            $response = [
                "status"=>402,
                "message"=>"Error, Name Task and Description are required"
            ];

            echo json_encode($response);
            exit();
        }

        $query = "UPDATE tasks SET name_task = :nameTask, delivery_date = :deliveryDate, description = :description
        WHERE task_id = :taskId";

        $stmt = $conn->pdo->prepare($query);
        $stmt->execute([
            "nameTask"=>$nameTask,
            "deliveryDate"=>$deliveryDate,
            "description"=>$description,
            "taskId"=>$taskId
        ]);

        $response = [
            "status"=>202,
            "message"=>"Update Task success",
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