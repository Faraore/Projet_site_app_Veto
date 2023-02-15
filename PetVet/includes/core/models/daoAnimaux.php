<?php

	require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/Personne.php";

    function getAllAnimaux(): array{
        $conn = getConnection();

        $SQLQuery = "SELECT id, nom, date_de_naissance, date_de_deces, race
                     FROM animaux
                     INNER JOIN famiile on id.famille = famille.id
                     INNER JOIN sexe_des_animaux on id.sexe = sexe.id
                     INNER JOIN poid on id.poid = poid.id ";
    }