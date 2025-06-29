<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <title>EVENTS</title>
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
                <h2 class="marsa">Participez a Notre Cours</h2>
            </section>
        </div>
        <div class=plain-white></div>
        <?php
        include '../Controller/eventC.php';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "Form submitted!<br>"; // Debugging statement

            // Retrieve form data
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $allergie = $_POST['allergie'];
            $entendre = $_POST['entendre'];
            $comment = $_POST['comment'];
            $accept = $_POST['accept'];

            $event = new Event(NULL, $nom, $prenom, $email, $allergie, $entendre, $comment, $accept);

            // Add event
            $eventC = new EventC();
            $eventC->addEvent($event);
            echo "Votre Participation est ajouté!<br>"; // Debugging statement
        }
        ?>
        <form class="form" onsubmit="return validateEventForm()" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-control">
                <label for="nom">Nom</label>
                <input type="text" id="nom" placeholder="Entrer le Nom" name="nom">
            </div>
            <div class="form-control">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrer le Prenom" >
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Entrer l'email" >
            </div>
            <div class="form-control">
            <label for="allergie">Avez-vous des allergies alimentaires ou des restrictions alimentaires?</label>
            <input type="text" id="allergie" name="allergie" placeholder="(Oui/Non, Si oui, veuillez préciser)">
        </div>
        <div class="form-control">
            <label for="entendre">Comment avez-vous entendu parler de nos cours de cuisine zéro déchet?</label>
            <input type="text" id="entendre" name="entendre" placeholder="">
        </div>
        <div class="form-control">
            <label for="comment">Avez-vous des commentaires ou des suggestions pour améliorer nos cours de cuisine zéro déchet?</label>
            <input type="text" id="comment" name="comment" placeholder="">
        </div>
        <div class="form-control">
            <label>Acceptez-vous de recevoir des informations sur nos futurs événements et offres par e-mail?</label>
            <div class="toggle">
                <input type="radio" id="accept_oui" name="accept" value="oui">
                <label for="accept_oui">Oui</label>
                <input type="radio" id="accept_non" name="accept" value="non">
                <label for="accept_non">Non</label>
    </div>
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
