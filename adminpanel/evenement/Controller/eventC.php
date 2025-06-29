<?php
include('../../config/config.php');
include '../model/event.php';
class EventC
{
    public function ListEvent()
    {
        $sql = "SELECT *  FROM event"; //selectionner tous les chmps (noksdo biha *) from liste
        $db = config::getConnexion(); 
        try {
            $Liste = $db->query($sql);
            return $Liste; //$ maaneha bch trajaali la liste f tableau (tableau associatif)
        } catch(Exception $e) {
            die('Erreur' . $e->getMessage());
        }
    }


function deleteEvent($id)
{
    $sql="DELETE FROM event WHERE id= :id";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(":id", $id);

    try{
        $req->execute();
    } catch(Exception $e) {
        die('erreur'.$e->getMessage());
    }
}
function addEvent($Event)
{
    $sql="INSERT INTO event
    VALUES (NULL, :n,:p,:em,:al,:ent,:com,:acc)";
    $db=config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'n' => $Event->getNom(),
            'p' => $Event->getPrenom(),
            'em' => $Event->getEmail(),
            'al' => $Event->getAllergie(),
            'ent' => $Event->getEntendre(),
            'com' => $Event->getComment(),
            'acc' => $Event->getAccept(),

        ]);
    }catch(Exception $e) {
        echo 'Erreur :' . $e->getMessage();
    }
}


function updateEvent($event)
{
    $sql = "UPDATE event SET nom = :n, prenom = :p, email = :em, allergie = :al, entendre = :ent, comment = :com, accept=:acc WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $event->getId(),
            'n' => $event->getNom(),
            'p' => $event->getPrenom(),
            'em' => $event->getEmail(),
            'al' => $event->getAllergie(),
            'ent' => $event->getEntendre(),
            'com' => $event->getComment(),
            'acc' => $event->getAccept()

        ]);
        header('location: Listevent.php?success=1');
        exit(); 
    } catch(Exception $e) {
        // Handle error gracefully, perhaps redirecting back to the list page with an error message
        header('location: Listevent.php?error=' . urlencode($e->getMessage()));
        exit(); // Make sure to exit after redirection
    }
}
public function showEvent($id)
{
    $sql = "SELECT * FROM event WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $event = $query->fetch(PDO::FETCH_ASSOC);
        if ($event) {
            return $event;
        } else {
            return null; // Return null if reservation with given ID is not found
        }
    } catch (Exception $e) {
        // Handle error gracefully
        die('Error: ' . $e->getMessage());
    }
}


public function getEventById($id)
{
    $sql = "SELECT * FROM event WHERE id = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $event = $query->fetch(PDO::FETCH_ASSOC);
        if ($event) {
            return new Event(
                $event['id'],
                $event['nom'],
                $event['prenom'],
                $event['email'],
                $event['allergie'],
                $event['entendre'],
                $event['comment'],
                $event['accept']
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