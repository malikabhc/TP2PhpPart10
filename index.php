<?php include 'controllerFormTP2.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet" />
        <link rel="stylesheet" href="style.css" />
        <title>TP2 Partie 10</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Formulaire</h1>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="civility">Civilité</label>
                    <select class="form-control form-control-lg" name="civility" value="<?= isset($civility) ? $civility : '' ?>">
                        <option selected disabled>Veuillez sélectionner votre civilité</option>
                        <option value="1" <?= //vérifie si une option est choisie et si la clé = 1 ou 2  si oui sauvegarde l'option selectionnée aprés la validation du formulaire
                            (!empty($_POST['civility']) && $_POST['civility'] == 1) ? 'selected' : '' ?>>Madame</option>
                        <option value="2" <?= (!empty($_POST['civility']) && $_POST['civility'] == 2) ? 'selected' : '' ?>>Monsieur</option>
                    </select>
                    <p class="text-danger"> <?= isset($formError['civility']) ? $formError['civility'] : ''; ?></p>
                    <label for="lastname">Nom</label>
                    <input class="form-control form-control-lg" name="lastname" placeholder="Nom" value="<?= // Garde en mémoire la saisie des champs cela évite de devoir retaper tout le formulaire s'il y a une erreur sur un seul champ
                        isset($lastname) ? $lastname : '' ?>" />
                    <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>
                    <label for="firstname">Prénom</label>
                    <input class="form-control form-control-lg" name="firstname" placeholder="Prénom" value="<?= isset($firstname) ? $firstname : '' ?>" />
                    <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>
                    <label for="age">Âge</label>
                    <input class="form-control form-control-lg" name="age" placeholder="Âge" value="<?= isset($age) ? $age : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['age']) ? $formError['age'] : ''; ?></p>
                    <label for="society">Société</label>
                    <input class="form-control form-control-lg" name="society" placeholder="Société" value="<?= isset($society) ? $society : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['society']) ? $formError['society'] : ''; ?></p>
                    <input type="submit" class="form-control form-control-lg mt-3" name="submit" id="submit" value="Envoyer"/>
                </div>
            </form>
            <?php // Affiche les résultats en dessous du formulaire si aucune erreur n'est comptabilisée dans le tableau $formError
            if (isset($_POST['submit']) && (count($formError) == 0)) {
                ?>
                <p>Civilité : <?= $civility ?></p>
                <p>Nom : <?= $lastname ?></p>
                <p>Prénom : <?= $firstname ?></p>
                <p>Âge : <?= $age ?></p>
                <p>Société : <?= $society ?></p>
<?php } ?>
        </div>
    </body>
</html>
