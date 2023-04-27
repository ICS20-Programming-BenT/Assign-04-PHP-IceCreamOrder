<?php

// Setting a constant for taxes, toppings price, brownie price and coffee price
define("HST", 0.13);
define("PRICE_TOPPINGS", 0.50);
define("PRICE_BROWNIES", 3.00);
define("PRICE_COFFEES", 2.00);

// Declaring variable for base cost that will be determined later on
$baseCost = 0;

// Getting user input for cone type, cone size, number of brownies and number of coffees
$coneType = $_POST["cone-type"];
$coneSize = $_POST["cone-size"];
$numBrownies = intval($_POST["amount-brownies"]);
$numCoffees = intval($_POST["amount-coffees"]);

// Determining the number of toppings selected based on number of checkboxes checked and using determined value to declare variable for number of toppings chosen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numToppings = $_POST['checkboxes'];
}

// Determining the cost of the toppings using number of toppings variable and cost of toppings constant
$costToppings = $numToppings * PRICE_TOPPINGS;

if ($coneType == "0") {
    $numToppings = 0;
    $costToppings = 0;
}

// Determining the cost of the base ice cream cone using compound if statements
// If the cone type is sugar and the size is small
if (($coneType == "sugar") && ($coneSize == "small")) {
    $baseCost = 4.00;
}

// If the cone type is waffle and the size is small
else if (($coneType == "waffle") && ($coneSize == "small")) {
    $baseCost = 4.25;
}

// If the cone type is sugar and the size is medium
else if (($coneType == "sugar") && ($coneSize == "medium")) {
    $baseCost = 5.00;
}
  
// If the cone type is waffle and the size is medium
else if (($coneType == "waffle") && ($coneSize == "medium")) {
    $baseCost = 5.25;
}

// If the cone type is sugar and the size is large
else if (($coneType == "sugar") && ($coneSize == "large")) {
    $baseCost = 6.00;
}

// If the cone type is waffle and the size is large
else if (($coneType == "waffle") && ($coneSize == "large")) {
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
echo "You ordered a " . $coneSize . " ice cream with a " . $coneType . " cone. You chose " . $numToppings . " toppings for your ice cream, as well as " . $numBrownies . " brownies and " . $numCoffees . " coffees. Your subtotal is $" . number_format($subtotal, 2) . ". The amount of taxes added due to HST is $" . number_format($taxes, 2) . ". Your total is $" . number_format($total, 2) . ".";

?>
