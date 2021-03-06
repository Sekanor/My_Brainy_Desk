<?php session_start(); ?>
<?php require_once('components/class/database.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MBDesk - Annonces</title>
    <link rel="shortcut icon" href="favicon.png" />
    <link rel='stylesheet' href='css/style.css' />
</head>

<body>
    <?php include("components/header.php"); ?>

    <div class="container">

        <section>
            <h1>Parcourir les annonces</h1>
        </section>
        
        <section>
            <a class="highlight" href="#filtrer" data-toggle="collapse">Filtrer les annonces</a>
            <div class="collapse mt-3 mb-5" id="filtrer">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="ville"><i class="material-icons">location_city</i> Ville</label>
                                <input type="text" class="form-control" id="ville" placeholder="ex: Dijon">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="code_postal"><i class="material-icons">map</i> Code Postal</label>
                                <input type="text" class="form-control" id="code_postal" placeholder="ex: 21000">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre_de_personne"><i class="material-icons">people</i> Capacité</label>
                                <select id="nombre_de_personne" class="form-control">
                                    <option value="1-10">1 à 10 personnes</option>
                                    <option value="11-25">11 à 25 personnes</option>
                                    <option value="25+">Plus de 25 personnes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tarif_max"><i class="material-icons">attach_money</i>  Prix horaire maximum</label>
                                <select id="tarif_max" class="form-control">
                                    <option>25€/h</option>
                                    <option>50€/h</option>
                                    <option>100€/h</option>
                                    <option>250€/h</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Rechercher</button>

                </form>
            </div>
            
            <h2 class="mt-3 mb-3">Résultat de la recherche</h2>
            
            

        <div class="row annonce mt-4 mb-5">
            <div class="col-4" style="background-image:url('media/image/office.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;"></div>
            <div class="col pt-2 ml-1">
                <h1 class="mb-2">Salle de réunion Test</h1>
                <h2 class="mb-0"><i class="material-icons">attach_money</i> 50€ la demi-journée</h2>
                <h2 class="mb-0"><i class="material-icons">place</i> 13 rue du test, 21000 Dijon</h2>
                <h2><i class="material-icons">people</i> 10-20 personnes</h2>
                <p>La salle de réunion Test est située en plein coeur du XIIe arrondissement de Dijon.</p>
            </div>
        </div>

        <?php

        $bdd = Database::bdd();

        
        $_ville = NULL;
        if (isset($_POST['ville'])) {
            $_ville = $_POST['ville'];
        }

        $_codePostal = NULL;
        if (isset($_POST['code_postal'])) {
            $_codePostal = $_POST['code_postal'];
        }

        $_nbPersonnes_min = NULL;
        $_nbPersonnes_max = NULL;

        if (isset($_POST['nombre_de_personne'])) {
            if ($_POST['nombre_de_personne'] == "1-10") {
                $_nbPersonnes_min = 1;
                $_nbPersonnes_max = 10;
            }
            else if ($_POST['nombre_de_personne'] == "11-25") {
                $_nbPersonnes_min = 11;
                $_nbPersonnes_max = 25;
            }
            else {
                $_nbPersonnes_min = 25;
            }
        }


        // AJOUTER LA/LES PHOTOS !!!!!!!!
        // + récupérer ordre : DESC/ASC ?

        /*
        $query = "SELECT
            titre, type, adresse, codepostal, ville, details
        FROM
            Annonce;";
        */
    
        /*
        $query = '
        SELECT
            titre, type, adresse, codepostal, ville, details, prix, duree
        FROM
            Annonce
            JOIN Annonce_Tarif ON Annonce.id = Annonce_Tarif.Annonceid
            JOIN Tarif ON Annonce_Tarif.Tarifid = Tarif.id
        WHERE
            (
                ('.$_nbPersonnes_min.' IS NULL)
                OR (Annonce.capacite >= '.$_nbPersonnes_min.')
                )
            AND (
                ('.$_nbPersonnes_max.' IS NULL)
                OR (Annonce.capacite <= '.$_nbPersonnes_max.')
                )
            AND (
                (\''.$_ville.'\' IS NULL)
                OR (Annonce.ville = \''.$_ville.'\')
                )
            AND (
                ('.$_codePostal.' IS NULL)
                OR (Annonce.codePostal = '.$_codePostal.')
                );';
        */

        $query = '
            SELECT
                titre, type, adresse, codepostal, ville, details, prix, duree
            FROM
                Annonce
                JOIN Annonce_Tarif ON Annonce.id = Annonce_Tarif.Annonceid
                JOIN Tarif ON Annonce_Tarif.Tarifid = Tarif.id
            WHERE
                (
                    (NULL IS NULL)
                    OR (Annonce.capacite >= NULL)
                    )
                AND (
                    (NULL IS NULL)
                    OR (Annonce.capacite <= NULL)
                    )
                AND (
                    (\''.$_ville.'\' IS NULL)
                    OR (Annonce.ville = \''.$_ville.'\')
                    )
                AND (
                    (NULL IS NULL)
                    OR (Annonce.codePostal = NULL)
                    );';

        
        $result = $bdd->query($query)->fetchAll();

        foreach ($result as $row) {
            $titre = $row['titre'];
            $type = $row['type'];
            $prix = $row['prix'];
            $duree = $row['duree'];
            $adresse = $row['adresse'];
            $codepostal = $row['codepostal'];
            $ville = $row['ville'];
            $details = $row['details'];
        ?>
        
        <div class="row mt-4 mb-5 annonce">
            <div class="col-4" style="background-image:url('media/image/office.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;"></div>
            <div class="col pt-2 ml-1">
                <h1 class="mb-2">
                    <?php echo $titre; ?>
                </h1>
                <h2 class="mb-0"><i class="material-icons">attach_money</i>
                    <?php echo $prix; ?>€/heure</h2>
                <h2 class="mb-0"><i class="material-icons">place</i>
                    <?php echo $adresse.", ".$codepostal." ".$ville; ?>
                </h2>
                <h2><i class="material-icons">people</i>
                    <?php echo $capacite; ?> personnes</h2>
                <p>
                    <?php echo $details; ?>
                </p>
            </div>
        </div>

        <?php       
        }
        ?>
        
        <?php include("components/footer.php"); ?>

    </div>

    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/aos/aos.js"></script>

</body>

</html>
