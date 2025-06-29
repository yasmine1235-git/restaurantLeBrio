<?php
include '../../config/config.php';
include '../model/orderM.php';
class OrderC
{
    public function ListOrder()
    {
        $sql = "SELECT *  FROM orders"; //selectionner tous les chmps (noksdo biha *) from orders 
        $db = config::getConnexion(); 
        try {
            $Liste = $db->query($sql);
            return $Liste; //$ maaneha bch trajaali la liste f tableau (tableau associatif)
        } catch(Exception $e) {
            die('Erreur' . $e->getMessage());
        }
    }


function deleteOrder($id)
{
    $sql="DELETE FROM orders WHERE id= :id";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(":id", $id);

    try{
        $req->execute();
    } catch(Exception $e) {
        die('erreur'.$e->getMessage());
    }
}


function updateOrder($order)
{
    $sql = "UPDATE orders SET name = :n, email = :em, phone = :num, adress = :ad, pmode = :pm, products = :pr, amount_paid = :paid WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $order->getId(),
            'n' => $order->getName(),
            'em' => $order->getEmail(),
            'num' => $order->getPhone(),
            'ad' => $order->getAdress(),
            'pm' => $order->getPmode(),
            'pr' => $order->getProducts(),
            'paid' => $order->getAmountPaid()

        ]);
        // Optionally, you can redirect back to the list page with a success message
        header('location: Listorder.php?success=1');
        exit(); // Make sure to exit after redirection
    } catch(Exception $e) {
        // Handle error gracefully, perhaps redirecting back to the list page with an error message
        header('location: Listorder.php?error=' . urlencode($e->getMessage()));
        exit(); // Make sure to exit after redirection
    }
}





public function getOrderById($id)
{
    $sql = "SELECT * FROM orders WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $order = $query->fetch(PDO::FETCH_ASSOC);
        if ($order) {
            return new Order(
                $order['id'],
                $order['name'],
                $order['email'],
                $order['phone'],
                $order['adress'],
                $order['pmode'],
                $order['products'],
                $order['amount_paid']

            );
        } else {
            return null; // Return null if orders with given ID is not found
        }
    } catch (Exception $e) {
        // Handle error gracefully
        die('Erreur' . $e->getMessage());
    }
}



}
    