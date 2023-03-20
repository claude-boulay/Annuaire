<?php
require_once("models/model.php");

function GetAll()
{
    $infoEtudiant = GetEtudiant();
    $infoProfesseur = GetProfesseur();
    $infoOrganisation = GetOrganisation();
    $infoTravail = GetTravail();

    return [$infoEtudiant, $infoOrganisation, $infoProfesseur, $infoTravail];
}
