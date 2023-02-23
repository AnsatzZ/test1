<?php
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "Please enter a number.";
    // }
    // elseif( $num2 = 0 && $operator = 'divide'){
    //     $result = "undefined";

    }
     else {
        switch ($operator) {
            default:
                echo"I do not know how to catch this error,congratulate on thinking outside the box";
            case "add":
                echo $num1 + $num2;
                break;
            case "subtract":
                echo $num1 - $num2;
                break;
            case "multiply":
                echo $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    echo  "The result would be undefined";
                } else {
                    echo $num1 / $num2;
                }
                break;
            
        }
    }
    
    // echo "Result: " . $result;
}
?>
