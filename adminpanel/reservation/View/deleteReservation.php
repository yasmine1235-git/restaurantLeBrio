<?php
include '../Controller/ReservationC.php';
$reservationC= new ReservationC();
$reservationC->deleteReservation($_GET["id"]);

header('location:Listreservation.php');