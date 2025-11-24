<?php
    require_once("../backend/config/db.php");
    require("./components/btn_primary.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Tasks</title>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

<body>
    <div class="container">
        <h1 class="title">Tasks</h1>
        <div>
            <?php showBtnPrimary("btn-add-task","Add Task")?>
        </div>
        <div class="card">
            <div class="div-table">
                <table id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Task</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Delivery date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-tasks">
                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php include("./components/add_task.php"); ?>
    <script src="./functions/add_task.js"></script>
    <script src="./functions/get_task.js"></script>
</body>

</html>