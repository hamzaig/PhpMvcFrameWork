<?php

use app\core\form\Form;
use app\core\form\TextAreaField;

$this->title = "Contact Page";

?>
<h1>Contact Page</h1>
<?php $form = Form::begin('', 'post'); ?>

    <?php echo $form->field($model, 'subject'); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo new TextAreaField($model,'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>