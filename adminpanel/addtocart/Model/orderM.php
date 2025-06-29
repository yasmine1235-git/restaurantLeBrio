<?php

class Order
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phone = null;
    private ?string $adress = null;
    private ?string $pmode = null;
    private ?string $products = null;
    private ?string $amount_paid=null;

    public function __construct($id = null, $n, $em, $ph, $ad, $p, $prod, $amnt)
    {
        $this->id = $id;
        $this->name = $n;
        $this->email = $em;
        $this->phone = $ph;
        $this->adress = $ad;
        $this->pmode = $p;
        $this->products = $prod;
        $this->amount_paid = $amnt;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProducts(): ?string
    {
        return $this->products;
    }

    public function setProducts(string $products): void
    {
        $this->products = $products;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): void
    {
        $this->adress = $adress;
    }

    public function getPmode(): ?string
    {
        return $this->pmode;
    }

    public function setPmode(string $pmode): void
    {
        $this->pmode = $pmode;
    }
    public function getAmountpaid(): ?string
    {
        return $this->amount_paid;
    }
    public function setAmountpaid(string $amount_paid): void
    {
        $this->amount_paid = $amount_paid;
    }



}

?>
