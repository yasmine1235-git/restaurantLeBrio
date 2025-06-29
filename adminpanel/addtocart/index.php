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
                <a href="#" tabindex="0">LES MENUS & CARTES</a>
                <ul class="dropdown-content">
                    <li><a href="index.html">Commander</a></li>
                    <li><a href="../../html/book.html">Carte</a></li>
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

<style>
    /* Custom styling for product names */
    .product-name {
        color: white; /* Change to your desired color */
    }

    /* Custom styling for Add to Cart button */
    .addItemBtn {
        background-color: #003325; /* Change to your desired color */
        color: black; /* Text color */
    }

    .addItemBtn:hover {
        background-color: #003325; /* Change to your desired hover color */
    }
    .pname {
      color : black;
    }
    .text-info {
      color : black !important;
    }

</style>



<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3"> 

        <?php
        include 'config.php';
        $stmt = $conn->prepare('SELECT * FROM product');
        $stmt->execute();
        $result = $stmt->get_result();
        $count = 0;
        while ($row = $result->fetch_assoc()):
        ?>

        <div class="col-md-4 mb-4">
            <div class="card product-item">
                <img src="<?= $row['product_image'] ?>" class="card-img-top product-image" height="250">
                <div class="card-body product-details">
                    <h5 class="card-title text-center text-info product-name"><?= $row['product_name'] ?></h5>
                    <p class="card-text text-center text-danger product-price">
    <?= number_format($row['product_price'], 2) ?> TND
</p>
                    <form action="" class="form-submit">
                        <div class="row">
                            <div class="col-6">
                                <b class="quantity-label">Quantity :</b>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control pqty" value="">
                            </div>
                        </div>
                        <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                        <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                        <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                        <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                        <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                        <button class="btn btn-info btn-block mt-2 addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $count++;
        endwhile;
        ?>
    </div>
</div>





  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) { 
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();
//ajax request is sent to the server 
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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
          cartItem: "cart_item" //ncludes a cartItem parameter with the value "cart_item".
        },
        success: function(response) {
          $("#cart-item").html(response); //the content of the HTML element with the ID "cart-item"
        }
      });
    }
  });
  </script>
</body>

