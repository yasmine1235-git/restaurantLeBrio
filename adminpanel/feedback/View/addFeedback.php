<?php
include '../Controller/feedbackC.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Create Feedback object
    $feedback = new Feedback(NULL, $nom, $email, $comment);

    // Add feedback to the database
    $feedbackC = new FeedbackC();
    $feedbackC->addFeedback($feedback);

    // Display success message to the user
    $success_message = "Thank you for your feedback! You've won a BRIO gift card!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <title>FEEDBACK</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <script src="../../../javascript/lebrio.js"></script>
</head>
<body>
<header>
    <a href="../../../html/lebrio.html" class="logo"><img src="../../../images/logo.png" alt="Le Brio Logo"></a>
    <nav>
        <ul class="nav_menu">
            <li><a href="../../../html/lebrio.html">ACCUEIL</a></li>
            <li><a href="../../../html/lerestaurant.html">EVENTS</a></li>
            <li class="dropdown">
                <a href="#" tabindex="0">LES MENUS & CARTES</a>
                <ul class="dropdown-content">
                    <li><a href="../../addtocart/index.php">Commander</a></li>
                    <li><a href="../../../html/book.html">Carte</a></li>
                </ul>
            </li>
            <li><a href="../../../html/emplacement.html">EMPLACEMENT</a></li>
            <li><a href="../../../html/secretscuisine.html">SECRETS DE LA CUISINE</a></li>
        </ul>
    </nav>
</header>
<div class="container-form">
    <div class="wrapper-form">
        <section class="container-2">
            <h2 class="marsa">FEEDBACK</h2>
        </section>
    </div>
    <?php if(isset($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <form class="form" onsubmit="return validateFeedbackForm()" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-control">
            <label for="nom">Nom</label>
            <input type="text" id="nom" placeholder="Entrer le Nom" name="nom">
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Entrer l'email">
        </div>
        <div class="form-control">
            <label for="comment">Comment</label>
            <input type="text" id="comment" name="comment" placeholder="Entrer votre commentaire">
        </div>
        <input type="submit" value="Envoyer" class="button">
    </form>
</div>
<footer>
    <div class="footer-content">
        <h3 class="explorebrio">LE BRIO</h3>
    </div>
</footer>
</body>
</html>
