<?php 
    $date_now = date('Y-m-d');
    $min_date = date('Y-m-d',strtotime($date_now.' - 1 month'));
?>
<div class="modal" id="modal-add-task">
    <div class="div-form">
        <form action="" id="form-add-task">
            <h1 class="Title">New Task</h1>
            <div class="form-group">
                <label for="nameTask">Name Task <span class="required">*</span></label>
                <input type="text" require name="nameTask" id="nameTask" placeholder="Name Task">
            </div>
            <div class="form-group">
                <label for="deliveryDate">Delivery date </label>
                <input type="date" min="<?= $min_date ?>" value="<?= $date_now ?>" name="deliveryDate" id="deliveryDate" >
            </div>
            <div class="form-group">
                <label for="description">Description <span class="required">*</span></label>
                <textarea rows="5" require name="description" id="descriptionTask"></textarea>
            </div>
            <div>
                <?= showBtnPrimary("btn_save_task","Save Task") ?>
                <button type="button" class="btn-cancel" id="close_modal_task">Cancel</button>
            </div>
        </form>

    </div>
</div>