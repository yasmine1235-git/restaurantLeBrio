<?php
include '../Controller/eventC.php';

include ('../includes/header.php');


if(isset($_GET['id'])) {
    $eventC = new EventC();
    $event = $eventC->getEventById($_GET['id']);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $allergie = $_POST['allergie'];
    $entendre = $_POST['entendre'];
    $comment = $_POST['comment'];
    $accept = $_POST['accept'];


    // Create Organisation object with updated data
    $updatedEvent = new Event($id, $nom, $prenom, $email, $allergie, $entendre, $comment, $accept);

    // Update organisation in the database
    $eventC->updateEvent($updatedEvent);

    // Redirect to list page after update
    header("Location: listevent.php");
    exit();
}
?>


<html>
<head>
    <title>Update Participation</title>
</head>
<body>
    <h1>Update Participation</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $event->getId(); ?>">
        <label for="nom">Name:</label>
        <input type="text" id="nom" name="nom" value="<?= $event->getNom(); ?>"><br><br>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $event->getPrenom(); ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $event->getEmail(); ?>"><br><br>
        <label for="allergie">Allergies:</label>
        <input type="text" id="allergie" name="allergie" value="<?= $event->getAllergie(); ?>"><br><br>
        <label for="entendre">connaissance:</label>
        <input type="text" id="entendre" name="entendre" value="<?= $event->getEntendre(); ?>"><br><br>
        <label for="comment">Commentaires:</label>
        <input type="text" id="comment" name="comment" value="<?= $event->getComment(); ?>"><br><br>
        <label for="accept">Acceptation:</label>
        <input type="text" id="accept" name="accept" value="<?= $event->getAccept(); ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
<?php include ('../includes/footer.php'); ?>

</body>
</html>
