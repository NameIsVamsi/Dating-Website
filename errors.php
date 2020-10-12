<?php
/*This file captures the errors that may arise during the execution of this application*/
if (isset($errors)) {
    if (count($errors) > 0) {
        ?>

       <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
    <?php }
}
?>

