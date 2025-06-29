<?php
include '../Controller/eventC.php';
$eventC= new EventC();
$eventC->deleteEvent($_GET["id"]);

header('location:Listevent.php');