<?php
    require_once("../config/db.php");

    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $conn = new DBConnect();

        $query = "SELECT task_id,name_task,delivery_date,description,created_at FROM tasks WHERE deleted_at is null";

        $stmt = $conn->pdo->query($query);

        $response = [
            "status"=>202,
            "message"=>"Operation success",
            "data"=>$stmt->fetchAll()
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