<?php
include '../Controller/OrderC.php';
$orderC= new OrderC();
$orderC->deleteOrder($_GET["id"]);

header('location:Listorder.php');