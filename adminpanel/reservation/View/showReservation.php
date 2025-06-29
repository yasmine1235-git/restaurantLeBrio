<?php
include '../Controller/ReservationC.php';

if(isset($_GET['id'])) {
    $reservationC = new ReservationC();
    $reservation = $reservationC->getReservationById($_GET['id']);
}

include ('../includes/header.php');
?>

<html>
<head>
    <title>Show Reservation</title>
</head>
<body>
    <h1>Reservation Details</h1>
    <?php if($reservation): ?>
        <p>ID: <?= $reservation->getId(); ?></p>
        <p>Nom: <?= $reservation->getNom(); ?></p>
        <p>Prenom: <?= $reservation->getPrenom(); ?></p>
        <p>Email: <?= $reservation->getEmail(); ?></p>
        <p>Numero Tel: <?= $reservation->getPhone(); ?></p>
        <p>Date Reservation: <?= $reservation->getDate()->format('Y-m-d'); ?></p>
        <p>Nombre de personnes: <?= $reservation->getNombre(); ?></p>
    <?php else: ?>
        <p>Reservation not found.</p>
    <?php endif; ?>
</body>
</html>

<?php include ('../includes/footer.php'); ?>
