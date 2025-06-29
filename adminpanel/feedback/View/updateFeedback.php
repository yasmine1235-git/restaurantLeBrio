<?php
include '../Controller/feedbackC.php';

include ('../includes/header.php');


if(isset($_GET['id'])) {
    $feedbackC = new FeedbackC();
    $feedback = $feedbackC->getFeedbackById($_GET['id']);
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];


    // Create Feedback object with updated data
    $updatedFeedback = new Feedback($id, $nom, $email, $comment);

    // Update feedback in the database
    $feedbackC->updateFeedback($updatedFeedback);

    // Redirect to list page after update
    header("Location: Listfeedback.php");
    exit();
}
?>

<html>
<head>
    <title>Update Feedback</title>
</head>
<body>
<html>
<head>
    <title>Update Feedback</title>
</head>
<body>
    <h1>Update Feedback</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $feedback->getId(); ?>">
        <label for="nom">Name:</label>
        <input type="text" id="nom" name="nom" value="<?= $feedback->getNom(); ?>"><br><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $feedback->getEmail(); ?>"><br><br>
        <label for="comment">Comment :</label>
        <input type="text" id="comment" name="comment" value="<?= $feedback->getComment(); ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
<?php include ('../includes/footer.php'); ?>

</body>
</html>
