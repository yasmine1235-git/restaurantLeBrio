<?php
include '../Controller/eventC.php';

include ('../includes/header.php');
$eventC = new EventC();
$list = $eventC->ListEvent();
?>
<html>
<head></head>
<body>
<center>
    <h1>Liste Participations</h1>
</center>
<body>
    <a href="../../admin/index.php">back to dashboard</a>
    <a href="addEvent.php">add event</a>
    <table border="1" align="center" width="70%">

        <tr>
            <th>Id participation</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Allergies</th>
            <th>connaissance</th>
            <th>commentaire</th>
            <th>Acceptation</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Show</th> 
        </tr>
        <?php foreach ($list as $event) { ?>
            <tr>
                <td><?= $event['id']; ?></td>
                <td><?= $event['nom']; ?></td>
                <td><?= $event['prenom']; ?></td>
                <td><?= $event['email']; ?></td>
                <td><?= $event['allergie']; ?></td>
                <td><?= $event['entendre']; ?></td>
                <td><?= $event['comment']; ?></td>
                <td><?= $event['accept']; ?></td>
                <td>
        <a href="updateEvent.php?id=<?= $event['id']; ?>">Update</a>
    </td>
    <td>
        <a href="deleteEvent.php?id=<?= $event['id']; ?>">Delete</a>
    </td>
    <td>
        <a href="showEvent.php?id=<?= $event['id']; ?>">Show</a> 
    </td>
            </tr>
        <?php } ?>
    </table>
    <?php include ('../includes/footer.php'); ?>
</body>
</html>

