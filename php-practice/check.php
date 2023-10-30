<?php
include "includes/header.php";
require("private/validation.php"); ?>


<!-- variable -->
<?php
// make your variable and target your 'key' 
// this approach ensures that $check will have a value, and prevent potential "undefined index" errors when manipulating the $check variable
$check = (isset($_POST['stab'])) ? $_POST['stab'] : array();


$message_radio = "";
$form_good = isset($_POST['submit']) ? TRUE : FALSE;

if (isset($_POST['submit'])) {
    echo "submitted";
}
if ($form_good == TRUE) {
    $message_pass = "<p>Success. You have passed validation.</p>";
}
?>
<?php if ($form_good == TRUE): ?>
    <div class="alert alert-warning my-4">
        <?php echo $message_pass; ?>
    </div>
<?php endif; ?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!-- to stab or not to stab -->
    <div>
        <!-- to stab -->
        <!-- name=stab[], the [] in the name indicates that the name is for an array of value.  -->
        <!-- in_array = checks if the -->
        <input class="form-check-input" type="checkbox" value="stab" id="stab" name="stab[]" <?php if (in_array("stab", $check)) {
            echo "checked";
        } ?>>
        <label for="stab">Stab (out of love)?</label>

    </div>
    <div>
        <!-- or not to stab -->
        <input class="form-check-input" type="checkbox" value="noStab" id="nostab" name="stab[]" <?php if (in_array("nostab", $check)) {
            echo "checked";
        } ?>>
        <label for="stab">Or not to stab (out of love)?</label>
    </div>
    <div id="name-help" class="form-text text-warning">
        <?php echo $message_radio; ?>
    </div>

    <!-- this will echo your value echo implode(" ", $check)-->
    <!-- implode() is a function used to join array elements into a single string
            so in this case it is taking -->
    <?php echo implode(" ", $check) ?>


    <!-- submit button -->
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

</form>

<?php include "includes/footer.php" ?>