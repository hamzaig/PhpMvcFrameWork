<?php

use app\core\form\Form;  ?>
<h1 class="mb-4 bt-4">Register</h1>
<?php $form = Form::begin('', "post");  ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname');  ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname');  ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email');  ?>
    <?php echo $form->field($model, 'password')->passwordField();  ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField();  ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>


<!-- <form action="" method="POST">
    <div class="row">
        <div class="col">
            <div class="mb-3"> -->
                <!-- <label">First name</label> -->
                    <!-- value="<?php //echo $model->firstname; 
                                ?>" -->
                    <!-- <input name="firstname" type="text" class="form-control<?php// echo $model->hasError('firstname') ? ' is-invalid' : '' ?>"> -->
                    <!-- <div class="invalid-feedback">
                        <?php// echo $model->getFirstError('firstname') ?>
                    </div> -->
            <!-- </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label">Last name</label>
                    <input name="lastname" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label">Email</label>
            <input name="email" type="email" class="form-control">
    </div>
    <div class="mb-3">
        <label">Password</label>
            <input name="password" type="password" class="form-control">
    </div>
    <div class="mb-3">
        <label">Confirm Password</label>
            <input name="confirmPassword" type="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->