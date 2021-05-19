<?php
class panier
{
    private $idUser;
    private $id_produit;
    private $quantite;
    private $prix_total;

    function __construct($idUser,$id_produit,$quantite,$prix_total)
    {
        $this->idUser=$idUser;
        $this->id_produit=$id_produit;
        $this->quantite=$quantite;
        $this->prix_total=$prix_total;
    }

    function set_idUser($idUser)
    { $this->idUser=$idUser; }

    function set_id_produit($id_produit)
    { $this->id_produit=$id_produit; }

    function set_quantite($quantite)
    { $this->quantite=$quantite; }

    function set_prix_total($prix_total)
    { $this->prix_total=$prix_total; }

    function get_idUser()
    { return $this->idUser; }

    function get_id_produit()
    { return $this->id_produit; }

    function get_quantite()
    { return $this->quantite; }

    function get_prix_total()
    { return $this->prix_total; }



}

?>