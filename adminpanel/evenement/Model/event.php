<?php

class Event
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $allergie = null;
    private ?string $entendre = null;
    private ?string $comment = null;
    private ?string $accept = null;

    public function __construct($id = null, $n, $p, $em, $al, $ent, $com, $acc)
    {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $em;
        $this->allergie = $al;
        $this->entendre = $ent;
        $this->comment = $com;
        $this->accept = $acc;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    public function getAllergie(): ?string
    {
        return $this->allergie;
    }

    public function setAllergie(string $allergie): void
    {
        $this->allergie = $allergie;
    }
    
    public function getEntendre(): ?string
    {
        return $this->entendre;
    }

    public function setEntendre(string $entendre): void
    {
        $this->entendre = $entendre;
    }
    
    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
    
    public function getAccept(): ?string
    {
        return $this->accept;
    }

    public function setAccept(string $accept): void
    {
        $this->accept = $accept;
    }
}