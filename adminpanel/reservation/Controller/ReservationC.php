<?php
include('../../config/config.php');
include '../model/Reservation.php';
class ReservationC
{
    public function ListReservation()
    {
        $sql = "SELECT *  FROM reservation"; //selectionner tous les chmps (noksdo biha *) from organisation 
        $db = config::getConnexion(); 
        try {
            $Liste = $db->query($sql); 
            return $Liste; //$ maaneha bch trajaali la liste f tableau (tableau associatif)
        } catch(Exception $e) {
            die('Erreur' . $e->getMessage());
        }
    }


function deleteReservation($id)
{
    $sql="DELETE FROM reservation WHERE id= :id";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(":id", $id);

    try{
        $req->execute();
    } catch(Exception $e) {
        die('erreur'.$e->getMessage());
    }
}
function addReservation($Reservation)
{
    $sql="INSERT INTO reservation
    VALUES (NULL, :n,:p,:em,:num,:d,:nb)";
    $db=config::getConnexion();
    try {
        //print_r($Reservation->getData()->format('Y-m-d'));
        $query = $db->prepare($sql); //ensures that the value of $id is safely inserted into the SQL quer
        $query->execute([
            'n' => $Reservation->getNom(),
            'p' => $Reservation->getPrenom(),
            'em' => $Reservation->getEmail(),
            'num' => $Reservation->getPhone(),
            'd' => $Reservation->getDate()->format('Y/m/d'),
            'nb' => $Reservation->getNombre(),

        ]);
    }catch(Exception $e) {
        echo 'Erreur :' . $e->getMessage();
    }
}


function updateReservation($reservation)
{
    $sql = "UPDATE reservation SET nom = :n, prenom = :p, email = :em, phone = :num, date = :da, nombre = :ma WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $reservation->getId(),
            'n' => $reservation->getNom(),
            'p' => $reservation->getPrenom(),
            'em' => $reservation->getEmail(),
            'num' => $reservation->getPhone(),
            'da' => $reservation->getDate()->format('Y-m-d'),
            'ma' => $reservation->getNombre()
        ]);
        // Optionally, you can redirect back to the list page with a success message
        header('location: Listreservation.php?success=1');
        exit(); // Make sure to exit after redirection
    } catch(Exception $e) {
        // Handle error gracefully, perhaps redirecting back to the list page with an error message
        header('location: Listreservation.php?error=' . urlencode($e->getMessage()));
        exit(); // Make sure to exit after redirection
    }
}
public function showReservation($id)
{
    $sql = "SELECT * FROM reservation WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $reservation = $query->fetch(PDO::FETCH_ASSOC);
        if ($reservation) {
            return $reservation;
        } else {
            return null; // Return null if reservation with given ID is not found
        }
    } catch (Exception $e) {
        // Handle error gracefully
        die('Error: ' . $e->getMessage());
    }
}


public function getReservationById($id)
{
    $sql = "SELECT * FROM reservation WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $reservation = $query->fetch(PDO::FETCH_ASSOC);
        if ($reservation) {
            return new Reservation(
                $reservation['id'],
                $reservation['nom'],
                $reservation['prenom'],
                $reservation['email'],
                $reservation['phone'],
                $reservation['date'],
                $reservation['nombre']
            );
        } else {
            return null; // Return null if organization with given ID is not found
        }
    } catch (Exception $e) {
        // Handle error gracefully
        die('Erreur' . $e->getMessage());
    }
}



}