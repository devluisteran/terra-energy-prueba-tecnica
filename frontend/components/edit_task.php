<?php 
    $date_now = date('Y-m-d');
    $min_date = date('Y-m-d',strtotime($date_now.' - 1 month'));
?>
<div class="modal" id="modal-edit-task">
    <div class="div-form">
        <form action="" id="form-edit-task">
            <h1 class="Title">Update Task</h1>
            <div class="form-group">
                <label for="nameTask">Name Task <span class="required">*</span></label>
                <input type="text" require name="nameTask" id="nameTask" placeholder="Name Task">
            </div>
            <div class="form-group">
                <label for="deliveryDate">Delivery date </label>
                <input type="date" min="<?= $min_date ?>" name="deliveryDate" id="deliveryDate" >
            </div>
            <div class="form-group">
                <label for="description">Description <span class="required">*</span></label>
                <textarea rows="5" require name="description" id="descriptionTask"></textarea>
            </div>
            <div>
                <?= showBtnPrimary("btn_edit_task","Update Task") ?>
                <button type="button" class="btn-cancel" id="close_modal_edit_task">Cancel</button>
            </div>
        </form>

    </div>
</div>