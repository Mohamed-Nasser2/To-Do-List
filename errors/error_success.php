<?php

$errors = $session->get("errors");

if ($errors) {

    if (!is_array($errors)) {
        $errors = [$errors];
    }

    foreach ($errors as $error) { ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
<?php
    }

    $session->remove("errors");

} elseif ($session->get("success")) { ?>
    
    <div class="alert alert-success">
        <?php echo $session->get("success"); ?>
    </div>

<?php
    $session->remove("success");
}
?>