<?php
include '../Controller/FeedbackC.php';

include ('../includes/header.php');
$feedbackC = new FeedbackC();
$list = $feedbackC->ListFeedback();
?>
<html>
<head></head>
<body>
<center>
    <h1>Liste feedback</h1>
</center>
<body>
    <a href="../../admin/index.php">back to dashboard</a>
    <a href="addFeedback.php">add Feedback</a>
    <table border="1" align="center" width="70%">

        <tr>
            <th>Id feedback</th>
            <th>Nom</th>
            <th>email</th>
            <th>comment</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Show</th> 
        </tr>
        <?php foreach ($list as $feedback) { ?>
            <tr>
                <td><?= $feedback['id']; ?></td>
                <td><?= $feedback['nom']; ?></td>
                <td><?= $feedback['email']; ?></td>
                <td><?= $feedback['comment']; ?></td>
                <td>
        <a href="updateFeedback.php?id=<?= $feedback['id']; ?>">Update</a>
    </td>
    <td>
        <a href="deleteFeedback.php?id=<?= $feedback['id']; ?>">Delete</a>
    </td>
    <td>
        <a href="showFeedback.php?id=<?= $feedback['id']; ?>">Show</a> <!-- Add link for the Show action -->
    </td>
            </tr>
        <?php } ?>
    </table>
    <?php include ('../includes/footer.php'); ?>
</body>
</html>

