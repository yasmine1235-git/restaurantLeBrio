<?php
include('../../config/config.php');
include '../model/feedback.php';

class FeedbackC
{
    public function Listfeedback()
    {
        $sql = "SELECT * FROM feedback"; // Select all fields from feedback table
        $db = config::getConnexion(); 
        try {
            $Liste = $db->query($sql);
            return $Liste;
        } catch(Exception $e) {
            die('Erreur' . $e->getMessage());
        }
    }

    function deleteFeedback($id)
    {
        $sql = "DELETE FROM feedback WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(":id", $id);

        try {
            $req->execute();
        } catch(Exception $e) {
            die('erreur'.$e->getMessage());
        }
    }

    function addFeedback($Feedback)
    {
        $sql = "INSERT INTO feedback (nom, email, comment) VALUES (:n, :em, :com)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $Feedback->getNom(),
                'em' => $Feedback->getEmail(),
                'com' => $Feedback->getComment(),
            ]);
        } catch(Exception $e) {
            echo 'Erreur :' . $e->getMessage();
        }
    }
    function updateFeedback($feedback)
    {
        $sql = "UPDATE feedback SET nom = :n, email = :em, comment = :com WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $feedback->getId(),
                'n' => $feedback->getNom(),
                'em' => $feedback->getEmail(),
                'com' => $feedback->getComment()
            ]);

            header('location: Listfeedback.php?success=1');
            exit(); 
        } catch(Exception $e) {
            
            header('location: Listfeedback.php?error=' . urlencode($e->getMessage()));
            exit(); // Make sure to exit after redirection
        }
    }
    
    public function showFeedback($id)
    {
        $sql = "SELECT * FROM feedback WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $feedback = $query->fetch(PDO::FETCH_ASSOC);
            if ($feedback) {
                return $feedback;
            } else {
                return null; 
            }
        } catch (Exception $e) {
            // Handle error gracefully
            die('Error: ' . $e->getMessage());
        }
    }

    public function getFeedbackById($id)
    {
        $sql = "SELECT * FROM feedback WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $feedback = $query->fetch(PDO::FETCH_ASSOC);
            if ($feedback) {
                return new Feedback(
                    $feedback['id'],
                    $feedback['nom'],
                    $feedback['email'],
                    $feedback['comment']
                );
            } else {
                return null; // Return null if feedback with given ID is not found
            }
        } catch (Exception $e) {
            // Handle error gracefully
            die('Erreur' . $e->getMessage());
        }
    }
}
?>
