<?php
$regexAge = '/^[0-9]$/';
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
$regexText = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \.\,\?\:\!]+$/';

// Déclaration du tableau civilité contenant Madame et Monsieur
$civilityList = array(0 => 'Veuillez sélectionner votre civilité', 1 => 'Madame', 2 => 'Monsieur');

// Déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['civility'])) {
    $civility = $civilityList[$_POST['civility']];
} else if (isset($_POST['submit']) && !array_key_exists('civility', $_POST)) {
    $formError['civility'] = 'Veuillez sélectionner une option';
}
if (isset($_POST['lastname'])) {
    //déclaration de la variable lastname avec le htmlspecialchars qui fait en sorte que si du code est entrer dans le champ il n'est pas interpréter mais modifier
    $lastname = htmlspecialchars($_POST['lastname']);
    //test de la regex si elle est invalide
    if (!preg_match($regexName, $lastname)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['lastname'] = 'Saisie de votre nom invalide.';
    }
    // verifie si le champs de nom et vide
    if (empty($lastname)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['lastname'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['firstname'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexName, $firstname)) {
        $formError['firstname'] = 'Saisie de votre prénom invalide.';
    }
    if (empty($firstname)) {
        $formError['firstname'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['age'])) {
    $age = htmlspecialchars($_POST['age']);
    if (!preg_match($regexAge, $age)) {
        $formError['age'] = 'Saisie de votre âge invalide.';
    }
    if (empty($age)) {
        $formError['age'] = 'Champ obligatoire.';
    }
}
if (isset($_POST['society'])) {
    $society = htmlspecialchars($_POST['society']);
    if (!preg_match($regexText, $society)) {
        $formError['society'] = 'Saisie de la société invalide.';
    }
    if (empty($society)) {
        $formError['society'] = 'Champ obligatoire.';
    }
}
?>