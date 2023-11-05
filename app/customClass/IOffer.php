<?php

    namespace App\customClass;

    interface IOffer
    {
        //Atributo que identifica el id de la tabla offerts
        public const PRIMARYKEY = "publicationDate";
        //filtramos todas las ofertas de empleo activas
        public function getAllOffertsActives();
        public function getAllOffertsActivesForAdmin();
        //filtramos todas las ofertas de empleo inactivas
        public function getAllOffertsInactives();

        //Devolvemos las ofertas de trabajo que ha creado cierta compañia
        public function getOffertsByIdCompany(string $idCompany);

        //Devolvemos la oferta de trabajo por medio del id que nos proporcionan
        public function getOfferById($idOffer);
    }
