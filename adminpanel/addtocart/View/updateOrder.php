<?php
include '../Controller/orderC.php';

include ('../includes/header.php');


if(isset($_GET['id'])) {
    $orderC = new OrderC();
    $order = $orderC->getOrderById($_GET['id']);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $pmode = $_POST['pmode'];
    $products = $_POST['products'];
    $amount_paid = $_POST['amount_paid'];


    // Create Order object with updated data
    $updatedOrder = new Order($id, $name, $email, $phone, $adress, $pmode, $products, $amount_paid);

    // Update organisation in the database
    $orderC->updateOrder($updatedOrder);

    // Redirect to list page after update
    header("Location: listOrder.php");
    exit();
}
?>

<html>
<head>
    <title>Update Order</title>
</head>
<body>
<html>
<head>
    <title>Update order</title>
</head>
<body>
    <h1>Update Order</h1>
    <form method="post">
    <input type="hidden" name="id" value="<?= $order->getId(); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= $order->getName(); ?>"><br><br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= $order->getEmail(); ?>"><br><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?= $order->getPhone(); ?>"><br><br>
    <label for="adress">Adresse:</label>
    <input type="text" id="adress" name="adress" value="<?= $order->getAdress(); ?>"><br><br>
    <label for="pmode">payament mode:</label>
    <input type="text" id="pmode" name="pmode" value="<?= $order->getPmode(); ?>"><br><br>
    <label for="products">Products picked:</label>
    <input type="text" id="products" name="products" value="<?= $order->getProducts(); ?>"><br><br>
    <label for="amount_paid">Amount paid:</label>
    <input type="text" id="amount_paid" name="amount_paid" value="<?= $order->getAmountPaid(); ?>"><br><br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>
<?php include ('../includes/footer.php'); ?>

</body>
</html>
