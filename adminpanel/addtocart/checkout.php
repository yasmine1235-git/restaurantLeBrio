<?php
	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items); // $allItems will contain all the items from the array, separated by ', '.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />


    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="add.css">
    

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <title>Shopping Cart System</title>

</head>

<header>
    <a href="../../html/lebrio.html" class="logo"><img src="../../images/logo.png" alt="Le Brio Logo"></a>
    <nav>
        <ul class="nav_menu">
            <li><a href="../../html/lebrio.html">ACCUEIL</a></li>
            <li><a href="../../html/lerestaurant.html">EVENTS</a></li>
            <li class="dropdown">
                <a href="menu.html" tabindex="0">LES MENUS & CARTES</a>
                <ul class="dropdown-content">
                    <li><a href="index.php">Commander</a></li>
                    <li><a href="../../html/book.html">Carte</a></li>
                </ul>
            </li>
            <li><a href="../../html/emplacement.html">EMPLACEMENT</a></li>
            <li><a href="../../html/secretscuisine.html">SECRETS DE LA CUISINE</a></li>
            <li><a href="checkout.php">CHECKOUT</a></li>
            <li>
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
            </li>
        </ul>
    </nav>
</header>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" placeholder="Enter Delivery Address Here..." required></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control" required>
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order", //eli f forme lkol thoto f query string w tebaath maah isset order
        success: function(response) {
          $("#placeOrder").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get', // HTTP GET method. This method is commonly used for retrieving data from the server.
        data: {
          cartItem: "cart_item" 
        },
        success: function(response) {
          $("#cart-item").html(response); //the content of the HTML element with the ID "cart-item"
        }
      });
    }
  });
  // Function to validate the form
  function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var pmode = document.getElementById('pmode').value;

    // Check if any field is empty
    if (name === '' || email === '' || phone === '' || address === '' || pmode === '') {
      alert('Please fill in all fields');
      return false; // Prevent form submission
    }
    return true; // Proceed with form submission
  }

  </script>
</body>

</html>
