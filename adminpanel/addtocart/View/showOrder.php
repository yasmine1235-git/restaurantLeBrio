<?php
include '../Controller/orderC.php';

if(isset($_GET['id'])) {
    $orderC = new OrderC();
    $order = $orderC->getOrderById($_GET['id']);
}

include ('../includes/header.php');
?>

<html>
<head>
    <title>Show Order</title>
</head>
<body>
    <h1>Order Details</h1>
    <?php if($order): ?>
        <p>ID: <?= $order->getId(); ?></p>
        <p>Name: <?= $order->getName(); ?></p>
        <p>Email: <?= $order->getEmail(); ?></p>
        <p>Phone: <?= $order->getPhone(); ?></p>
        <p>Address: <?= $order->getAdress(); ?></p>
        <p>Payment Method: <?= $order->getPmode(); ?></p>
        <p>Products Picked: <?= $order->getProducts(); ?></p>
        <p>Amount Paid: <?= $order->getAmountpaid(); ?></p>
    <?php else: ?>
        <p>Order not found.</p>
    <?php endif; ?>
</body>
</html>

<?php include ('../includes/footer.php'); ?>
