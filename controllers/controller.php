<?php
require_once("models/model.php");

function getAll()
{
    $infoEtudiant = getEtudiant();
    $infoProfesseur = getProfesseur();
    $infoOrganisation = getOrganisation();
    $infoTravail = getTravail();

    return [$infoEtudiant, $infoOrganisation, $infoProfesseur, $infoTravail];
}
