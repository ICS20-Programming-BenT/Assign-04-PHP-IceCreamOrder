<?php

// Setting a constant for taxes, toppings price, brownie price and coffee price
define("HST", 0.13);
define("PRICE_TOPPINGS", 0.50);
define("PRICE_BROWNIES", 3.00);
define("PRICE_COFFEES", 2.00);

// Declaring variables for base cost and number of toppingsthat will be determined later on
$baseCost = 0;
$numToppings = 0;

// Getting user input for cone type, cone size, number of brownies and number of coffees
$coneType = $_POST["cone-type"];
$coneSize = $_POST["cone-size"];
$numBrownies = intval($_POST["amount-brownies"]);
$numCoffees = intval($_POST["amount-coffees"]);

// Determining the number of toppings selected based on number of checkboxes checked and using determined value to declare variable for number of toppings chosen
if (!empty($_POST["checkboxes"])) {
    $numToppings = count($_POST["checkboxes"]);
}

// Determining the cost of the toppings using number of toppings variable and cost of toppings constant
$costToppings = $numToppings * PRICE_TOPPINGS;

// Setting cost of toppings and number of toppings to zero if the user does not choose an ice cream.
if (($coneType == "0") || ($coneSize == "0")) {
    $numToppings = 0;
    $costToppings = 0;
}

// Determining the cost of the base ice cream cone using compound if statements
// If the cone type is sugar and the size is small
if (($coneType == "sugar") && ($coneSize == "small")) {
    $baseCost = 4.00;
}

// If the cone type is waffle and the size is small
elseif (($coneType == "waffle") && ($coneSize == "small")) {
    $baseCost = 4.25;
}

// If the cone type is sugar and the size is medium
elseif (($coneType == "sugar") && ($coneSize == "medium")) {
    $baseCost = 5.00;
}

// If the cone type is waffle and the size is medium
elseif (($coneType == "waffle") && ($coneSize == "medium")) {
    $baseCost = 5.25;
}

// If the cone type is sugar and the size is large
elseif (($coneType == "sugar") && ($coneSize == "large")) {
    $baseCost = 6.00;
}

// If the cone type is waffle and the size is large
elseif (($coneType == "waffle") && ($coneSize == "large")) {
    $baseCost = 6.25;
}

else {
    $baseCost = 0.00;
}

// Determining the cost of the sides using number of sides variables and prices of sides constants
$costBrownies = $numBrownies * PRICE_BROWNIES;
$costCoffees = $numCoffees * PRICE_COFFEES;

// Calculating the subtotal, tax and total
$subtotal = $baseCost + $costToppings + $costBrownies + $costCoffees;
$taxes = $subtotal * HST;
$total = $subtotal + $taxes;

// Displaying the total to the user in the "results" div

if (($coneType == "0") || ($coneSize == "0")) {
     echo "You did not order an ice cream or any toppings. You ordered " . $numBrownies . " brownie(s) and " . $numCoffees . " coffee(s). Your subtotal is $" . number_format($subtotal, 2) . ". The amount of taxes added due to HST is $" . number_format($taxes, 2) . ". Your total is $" . number_format($total, 2) . ".";
}

else {
    echo "You ordered a " . $coneSize . " ice cream with a " . $coneType . " cone. You chose " . $numToppings . " topping(s) for your ice cream, as well as " . $numBrownies . " brownie(s) and " . $numCoffees . " coffee(s). Your subtotal is $" . number_format($subtotal, 2) . ". The amount of taxes added due to HST is $" . number_format($taxes, 2) . ". Your total is $" . number_format($total, 2) . ".";
}

?>
