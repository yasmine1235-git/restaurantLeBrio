<?php
include '../Controller/eventC.php';

if(isset($_GET['id'])) {
    $eventC = new EventC();
    $event = $eventC->getEventById($_GET['id']);
}

include ('../includes/header.php');
?>

<html>
<head>
    <title>Show Participation</title>
</head>
<body>
    <h1>Participation Details</h1>
    <?php if($event): ?>
        <p>ID: <?= $event->getId(); ?></p>
        <p>Nom: <?= $event->getNom(); ?></p>
        <p>Prenom: <?= $event->getPrenom(); ?></p>
        <p>Email: <?= $event->getEmail(); ?></p>
        <p>Allergies: <?= $event->getAllergie(); ?></p>
        <p>connaissance: <?= $event->getEntendre(); ?></p>
        <p>Commentaires: <?= $event->getComment(); ?></p>
        <p>Acceptation emails: <?= $event->getAccept(); ?></p>
    <?php else: ?>
        <p>Participation not found.</p>
    <?php endif; ?>
</body>
</html>

<?php include ('../includes/footer.php'); ?>
