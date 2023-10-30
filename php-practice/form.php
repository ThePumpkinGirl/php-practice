<?php
include "includes/header.php";
require("private/validation.php");
// this lets us use the functions we created




// create your variables
// isset checks if null
//? means elseif
//if true then preform the trim function
$name = (isset($_POST['name'])) ? trim($_POST['name']) : "";

// error/success message variable

$message_name = "";
$message_pass = "";


//If the 'submit' key is set in the $_POST array (indicating the form was likely submitted), then set $form_good to TRUE. Otherwise, set $form_good to False.
$form_good = isset($_POST['submit']) ? TRUE : FALSE;

if (isset($_POST['submit'])) {
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    if (is_blank($name)) {
        // if the form is blank message:
        $message_name = "<p>Please enter your name.</p>";
        $form_good = FALSE;
    } elseif (!is_letters($name)) {
        $message_name = "<p>Can only contain letters and spaces.</p>";
        $form_good = FALSE;
    } elseif ($name == false) {
        $message_name = "<p>Enter your name, please.</p>";
        $form_good = FALSE;
    } elseif (strpos($name, " ") == false) {
        $message_name = "<p>Enter your first and last name. </p>";
        $form_good = FALSE;
    }
}
// end of if submitted

if ($form_good == TRUE) {
    $message_pass = "<p>Success. You have passed validation.</p>";
}

?>

<?php if ($form_good == TRUE): ?>
    <div class="alert alert-warning my-4">
        <?php echo $message_pass; ?>
    </div>
<?php endif; ?>




<!-- when creating a form we have to be careful of XSS attacks so use the php function htmlspecialchars(), it ensures that any special characters in the string are displayed as their literal value. -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="mb-3">
        <h3>Your information</h3>
        <label for="name" class="form-label m-3">First name and Last name please.</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        <div id="name-help" class="form-text text-warning">
            <?php echo $message_name; ?>
        </div>
    </div>



    <!-- submit button -->
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

</form>

<?php include "includes/footer.php" ?>