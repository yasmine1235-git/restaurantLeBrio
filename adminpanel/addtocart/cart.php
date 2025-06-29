<?php
  session_start();
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
    <a href="C:\xampp\htdocs\LeBrio\html\lebrio.html" class="logo"><img src="../../images/logo.png" alt="Le Brio Logo"></a>
    <nav>
        <ul class="nav_menu">
            <li><a href="../../html/lebrio.html">ACCUEIL</a></li>
            <li><a href="../../html/lerestaurant.html">EVENTS</a></li>
            <li class="dropdown">
                <a href="menu.html" tabindex="0">LES MENUS & CARTES</a>
                <ul class="dropdown-content">
                    <li><a href="index.html">Commander</a></li>
                    <li><a href="../../book.html">Carte</a></li>
                </ul>
            </li>
            <li><a href="../../html/emplacement.html">EMPLACEMENT</a></li>
            <li><a href="../../html/secretscuisine.html">SECRETS DE LA CUISINE</a></li>
            <li>
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
            </li>
        </ul>
    </nav>
</header>


<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div style="display:<?php if (isset($_SESSION['showAlert'])) { echo $_SESSION['showAlert']; } else { echo 'none'; } unset($_SESSION['showAlert']); ?>" class="alert alert-success mt-3">
        <strong><?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; } ?></strong>
      </div>
      <div class="table-responsive mt-2">
        <table class="table text-center table-bordered">
                      <thead>
              <tr>

              <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>

                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td><?= number_format($row['product_price'],2); ?></td>
                <td>
                  <input type="number" class="itemQty" value="<?= $row['qty'] ?>" min="1">
                </td>
                <td><?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="2">
                  <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="action.php?clear=all" class="btn btn-danger" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </td>
                <td>
                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    
$(".itemQty").on('change', function() {  //vent listener to all elements with the class itemQty.
  var $el = $(this).closest('tr');

var pid = $el.find(".pid").val(); //bch yalka akreb element aando classe pid f row el
var pprice = $el.find(".pprice").val();
var qty = $el.find(".itemQty").val();
$.ajax({
  url: 'action.php',
  method: 'post',
  cache: false,
  data: {
    qty: qty,
    pid: pid,
    pprice: pprice
  },
  success: function(response) {
    console.log(response);
  }
});   
 });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get', // HTTP GET method. This method is commonly used for retrieving data from the server.s
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response); //the content of the HTML element with the ID "cart-item"
        }
      });
    }
  });
  </script>
</body>

</html>