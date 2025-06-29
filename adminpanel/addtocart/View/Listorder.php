<?php
include '../Controller/orderC.php';

include ('../includes/header.php');
$orderC = new OrderC();
$list = $orderC->ListOrder();
?>
<html>
    <head></head>
    <body>
        <center>
            <h1>List Of Orders</h1>
        </center>
        <body>
            <a href="../../admin/index.php">back to dashboard</a>
            <a href="../checkout.php">add Order</a>
            <table border="1" align="center" width="80%">
                <tr>
                    <th>Id Order</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adresse</th>
                    <th>Payement method</th>
                    <th>Products picked</th>
                    <th>Amount paid</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Show</th>
                </tr>
                <?php 
                foreach ($list as $order) {
                ?>
                <tr>
                <td><?= isset($order['id']) ? $order['id'] : ''; ?></td>
                <td><?= isset($order['name']) ? $order['name'] : ''; ?></td>
                <td><?= isset($order['email']) ? $order['email'] : ''; ?></td>
                <td><?= isset($order['phone']) ? $order['phone'] : ''; ?></td>
                <td><?= isset($order['adress']) ? $order['adress'] : ''; ?></td>
                <td><?= isset($order['pmode']) ? $order['pmode'] : ''; ?></td>
                <td><?= isset($order['products']) ? $order['products'] : ''; ?></td>
                <td><?= isset($order['amount_paid']) ? $order['amount_paid'] : ''; ?></td>
                <td>
                    <a href="updateOrder.php?id=<?= isset($order['id']) ? $order['id'] : ''; ?>">Update</a>
                </td>
                <td>
                    <a href="deleteOrder.php?id=<?= isset($order['id']) ? $order['id'] : ''; ?>">Delete</a>
                </td>
                <td>
                    <a href="showOrder.php?id=<?= isset($order['id']) ? $order['id'] : ''; ?>">Show</a>
                </td>

                </tr>
                <?php
                }
                ?>
            </table>
            <?php
            include ('../includes/footer.php');
            ?>
        </body>
    </html>
