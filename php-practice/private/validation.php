<?php
// echo "<h1>Testing Validation script.</h1>"; 

// validates if there is nothing in the input
function is_blank($value)
{
    // isset checks for null
    // trim removes whitespace (spaces, tabs, newlines, ect) from the beginning and end of string
    return !isset($value) || trim($value) === '';
}

// create a function that validates the characters. Making sure its only spaces and letters.
function is_letters($value)
{
    // preg_match(): This is a PHP function that performs a regular expression match.
    //^ and $: These are start and end anchors, respectively, ensuring that the pattern matches from the start to the end of the string.
    //[a-zA-Z]: Matches any single alphabetical character, either lowercase (a-z) or uppercase (A-Z).
    // \s: Matches any whitespace character (like spaces, tabs, and line breaks)
    // *: This qualifier means the preceding character set or group (in this case, [a-zA-Z\s]) can appear zero or more times in the string.
    return preg_match("/^[a-zA-Z\s]*$/", $value);
}

?>