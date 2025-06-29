<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <title>RESERVATION</title>
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
                        <li><a href="../../../book.html">Carte</a></li>
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
                <h2 class="marsa">RESERVATION</h2>
            </section>
        </div>
        <?php
        include '../Controller/ReservationC.php';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "Form submitted!<br>"; // Debugging statement

            // Retrieve form data
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];
            $nombre = $_POST['nombre'];

            // Create Reservation object
            $reservation = new Reservation(NULL, $nom, $prenom, $email, $phone, $date, $nombre);
           // var_dump($reservation); // Debugging statement

            // Add reservation
            $reservationC = new ReservationC();
            $reservationC->addReservation($reservation);
            echo "Reservation ajouté!<br>"; // Debugging statement
        }
        ?>
        <form class="form" onsubmit="return validateReservationForm()" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
                <label for="phone">Numéro de Téléphone</label>
                <input type="number" id="phone" name="phone"  placeholder="Entrer le numéro de téléphone +216" >
            </div>
            <div class="form-control">
                <label for="date">Date de Reservation</label>
                <input type="date" id="date" name="date" placeholder="Entrer la date" >
            </div>
            <div class="form-control">
                <label for="nombre">Nombre de Personnes</label>
                <input type="number" id="nombre" name="nombre"  placeholder="Entrer le Nombre des Personnes" >
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
