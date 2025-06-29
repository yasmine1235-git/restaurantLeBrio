<?php
include '../Controller/feedbackC.php';

if(isset($_GET['id'])) {
    $feedbackC = new FeedbackC();
    $feedback = $feedbackC->getFeedbackById($_GET['id']);
}

include ('../includes/header.php');
?>

<html>
<head>
    <title>Show Feedback</title>
</head>
<body>
    <h1>Feedback Details</h1>
    <?php if($feedback): ?>
        <p>ID: <?= $feedback->getId(); ?></p>
        <p>Nom: <?= $feedback->getNom(); ?></p>
        <p>Email: <?= $feedback->getEmail(); ?></p>
        <p>Comment: <?= $feedback->getComment(); ?></p>
    <?php else: ?>
        <p>Feedback not found.</p>
    <?php endif; ?>
</body>
</html>

<?php include ('../includes/footer.php'); ?>
