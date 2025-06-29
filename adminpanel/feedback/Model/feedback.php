<?php

class Feedback
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $comment = null;

    public function __construct($id = null, $n, $em, $com)
    {
        $this->id = $id;
        $this->nom = $n;
        $this->email = $em;
        $this->comment = $com;
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}