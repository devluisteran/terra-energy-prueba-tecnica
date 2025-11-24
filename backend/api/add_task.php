<?php
    require_once("../config/db.php");

    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn = new DBConnect();

        $data = file_get_contents('php://input');
        $json_data = json_decode($data,true);

        $nameTask = $json_data['nameTask'];
        $deliveryDate = $json_data['deliveryDate'];
        $description = $json_data['description'];

        if($nameTask == "" || $description==""){
            $response = [
                "status"=>402,
                "message"=>"Error, Name Task and Description are required"
            ];

            echo json_encode($response);
            exit();
        }

        $query = "INSERT INTO tasks(name_task, delivery_date, description)values(:nameTask, :deliveryDate, :description)";
        $stmt= $conn->pdo->prepare($query);

        if($stmt->execute([
            "nameTask"=>$nameTask,
            "deliveryDate"=>$deliveryDate,
            "description"=>$description
        ])){

            $response = [
                "status"=>202,
                "message"=>"Task add success",
                "data"=>$json_data
            ];
        }else{
            $response = [
                "status"=>402,
                "message"=>"Error add success"
            ];
        }

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