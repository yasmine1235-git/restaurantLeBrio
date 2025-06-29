<?php
include '../Controller/ReservationC.php';

include ('../includes/header.php');
$reservationC = new ReservationC();
$list = $reservationC->ListReservation();
?>
<html>
<head></head>
<body>
<center>
    <h1>Liste Reservation</h1>
</center>
<body>
    <a href="../../admin/index.php">back to dashboard</a>
    <a href="addReservation.php">add Reservation</a>
    <table border="1" align="center" width="70%">

        <tr>
            <th>Id Reservation</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>numero tel</th>
            <th>date Reservation</th>
            <th>Nombre de personnes</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Show</th> 
        </tr>
        <?php foreach ($list as $reservation) { ?>
            <tr>
                <td><?= $reservation['id']; ?></td>
                <td><?= $reservation['nom']; ?></td>
                <td><?= $reservation['prenom']; ?></td>
                <td><?= $reservation['email']; ?></td>
                <td><?= $reservation['phone']; ?></td>
                <td><?= $reservation['date']; ?></td>
                <td><?= $reservation['nombre']; ?></td>
                <td>
        <a href="updateReservation.php?id=<?= $reservation['id']; ?>">Update</a>
    </td>
    <td>
        <a href="deleteReservation.php?id=<?= $reservation['id']; ?>">Delete</a>
    </td>
    <td>
        <a href="showReservation.php?id=<?= $reservation['id']; ?>">Show</a> <!-- Add link for the Show action -->
    </td>
            </tr>
        <?php } ?>
    </table>
    <?php include ('../includes/footer.php'); ?>
</body>
</html>

