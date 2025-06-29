<?php
include '../Controller/feedbackC.php';
$feedbackC= new FeedbackC();
$feedbackC->deleteFeedback($_GET["id"]);

header('location:Listfeedback.php');