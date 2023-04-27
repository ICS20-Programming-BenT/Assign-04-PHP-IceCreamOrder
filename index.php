<!DOCTYPE html>
<html lang="en-ca">
  <head>
    
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="description" content="Assign-04: Ice cream order in PHP">
    <meta name="keywords" content="Immaculata, ICS2O">
    <meta name="author" content="Ben Thomson">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Code for the favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./fav_index1/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index1/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index1/favicon-16x16.png">
    <link rel="manifest" href="./fav_index1/site.webmanifest">

    <!-- Google's MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.pink-purple.min.css" />
    
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="./css/style.css">
    
    <!-- Web page title -->
    <title>Ice Cream Order</title>
  </head>
  <body>
    
    <!-- Google's MDL -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  
    <!-- Container for web page content -->
    <main style = "padding-left:20px; padding-right:20px;">

      <!-- Web page heading -->
      <?php echo "<h1>Ice Cream Order</h1>" ?>

      <!-- Image -->
      <center>
        <img src="./images/ice-cream.png" alt="Various Ice Cream Cones">
      </center>
      <br><br>

      <!-- Body text -->
      <?php echo "<p>Welcome to Ben's Ice Cream Parlor! Please use this web page to view our menu and place your order online! You can completely customize your order with various toppings and sides, and we will even calculate tax for you! Then, review your order and total and submit.</p>" ?>
      <br>

      <!-- Table with menu items and their prices -->
      <?php echo "<h3>Menu and Prices:</h3>" ?>
      <table>
        <tr>
          <th class="border">Item</th>
          <th class="border">Price</th>
        </tr>
        <tr>
          <td class="border">Ice Cream with Sugar Cone</td>
          <td class="border">Small (one scoop): $4.00<br>Medium (two scoops): $5.00<br>Large (three scoops): $6.00</td>
        </tr>
        <tr>
          <td class="border">Ice Cream with Waffle Cone</td>
          <td class="border">Small (one scoop): $4.25<br>Medium (two scoops): $5.25<br>Large (three scoops): $6.25</td>
        </tr>
        <tr>
          <td class="border">Toppings</td>
          <td class="border">$0.50 each</td>
        </tr>
        <tr>
          <td class="border">Coffee</td>
          <td class="border">$2.00</td>
        </tr>
        <tr>
          <td class="border">Brownie</td>
          <td class="border">$3.00</td>
        </tr>
      </table>
      <br>
      <br>
      
      <?php echo "<h3>Your Order:</h3>" ?>
      
      <!-- Form for user input -->
      <form action="./order.php" method="post" target="order">

        <!-- First section -->
        <?php echo "<h5>Basic Order Information:</h5>" ?>
      
        <!-- Multiple choice for choosing cone type -->
        <label for="cone-type">Choose a type of cone for your ice cream:</label>
        <select id="cone-type" name="cone-type" onchange="toggleToppings()">
          <option value="0">-- Cone Type --</option>
          <option value="sugar">Sugar Cone</option>
          <option value="waffle">Waffle Cone</option>
        </select><br><br>
        
        <!-- Multiple choice for choosing cone size -->
        <label for="cone-size">Choose a size for your ice cream:</label>
        <select id="cone-size" name="cone-size">
          <option value="0">-- Cone Size --</option>
          <option value="small">Small (one scoop)</option>
          <option value="medium">Medium (two scoops)</option>
          <option value="large">Large (three scoops)</option>
        </select><br><br>

        <!-- Second section -->
        <?php echo "<h5>Choose Your Toppings:</h5>" ?>

        <?php
          $disabled = true;
          $disabledAttr = $disabled ? 'disabled' : '';
        ?>

        <!-- First MDL checkbox for chocolate syrup  -->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
          <span class="mdl-checkbox__label">Chocolate syrup</span>
          <input type="checkbox" id="chocolate-syrup" name="checkboxes[]" value="1" class="mdl-checkbox__input" <?php echo $disabledAttr; ?>>
          <br><br>
        </label>
        
        <!--Second MDL checkbox for whipped cream -->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
          <span class="mdl-checkbox__label">Whipped cream</span>
          <input type="checkbox" id="whipped-cream" name="checkboxes" value="2" class="mdl-checkbox__input" <?php echo $disabledAttr; ?>><br><br>
        </label>
        
        <!-- Third MDL checkbox for chopped walnuts -->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
          <span class="mdl-checkbox__label">Chopped walnuts</span>
          <input type="checkbox" id="chopped-walnuts" name="checkboxes" value="3" class="mdl-checkbox__input" <?php echo $disabledAttr; ?>><br><br>
        </label>
        
        <!-- Fourth MDL checkbox for rainbow sprinkles -->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
          <span class="mdl-checkbox__label">Rainbow sprinkles</span>
          <input type="checkbox" id="rainbow-sprinkles" name="checkboxes" value="4" class="mdl-checkbox__input" <?php echo $disabledAttr; ?>><br><br>
        </label>
        
        <!-- Fifth MDL checkbox for Maraschino Cherries -->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
          <span class="mdl-checkbox__label">Maraschino Cherries</span>
          <input type="checkbox" id="maraschino-cherries" name="checkboxes" value="5" class="mdl-checkbox__input" <?php echo $disabledAttr; ?>><br><br>
        </label>
        
        <!-- Sixth MDL checkbox for caramel bits -->
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
          <span class="mdl-checkbox__label">Caramel bits</span>
          <input type="checkbox" id="caramel-bits" name="checkboxes" value="6" class="mdl-checkbox__input" <?php echo $disabledAttr; ?>><br><br>
        </label>
        <br>
        <br>

        <!-- Third section -->
        <?php echo "<h5>Choose Your Optional Sides:</h5>" ?>
        
        <!-- Input for optional brownie -->
        <label for="brownies">How many brownies would you like?</label>
        <input type="number" step="1" min="0" id="amount-brownies" name="amount-brownies" placeholder="Number of brownies..."><br><br>
        
        <!-- Input for optional brownie -->
        <label for="coffees">How many coffees would you like?</label>
        <input type="number" step="1" min="0" id="amount-coffees" name="amount-coffees" placeholder="Number of coffees..."><br><br>
        
        <!-- Submit button -->
        <input type="submit" id="button" value="Submit Order!" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
      </form>
      <br>
      <br>

      <!-- iFrame for results -->
      <iframe name="order" id="order"></iframe>
      <br>
      <br>
    </main>
  </body>
</html>