<?php
include '../Controller/ReservationC.php';

include ('../includes/header.php');


if(isset($_GET['id'])) {
    $reservationC = new ReservationC();
    $reservation = $reservationC->getReservationById($_GET['id']);
    //it retrieves the reservation with that ID from the database using the getReservationById method of the ReservationC class
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // You may need to format date if it's not in the correct format for your database
    $date = $_POST['date'];
    $nombre = $_POST['nombre'];


    // Create Organisation object with updated data
    $updatedReservation = new Reservation($id, $nom, $prenom, $email, $phone, $date, $nombre);

    // Update organisation in the database
    $reservationC->updateReservation($updatedReservation);

    // Redirect to list page after update
    header("Location: listReservation.php");
    exit();
}
?>

<html>
<head>
    <title>Update Reservation</title>
</head>
<body>
    <h1>Update Reservation</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $reservation->getId(); ?>">
        <label for="nom">Name:</label>
        <input type="text" id="nom" name="nom" value="<?= $reservation->getNom(); ?>"><br><br>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $reservation->getPrenom(); ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $reservation->getEmail(); ?>"><br><br>
        <label for="phone">Numero Tel:</label>
        <input type="text" id="phone" name="phone" value="<?= $reservation->getPhone(); ?>"><br><br>
        <label for="date">Date Reservation:</label>
        <input type="date" id="date" name="date" value="<?= $reservation->getDate()->format('Y-m-d'); ?>"><br><br>
        <label for="nombre">nombre des personnes:</label>
        <input type="int" id="nombre" name="nombre" value="<?= $reservation->getNombre(); ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
<?php include ('../includes/footer.php'); ?>

</body>
</html>
