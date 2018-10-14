<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MBDesk - Partenaires</title>
    <link rel="shortcut icon" href="favicon.png" />
    <link rel='stylesheet' href='css/style.css' />
</head>

<body>
    <?php include("components/header.php"); ?>

    <div class="container">

        <section>
            <div class="row">
                <div class="col">
                    <h1>Les partenaires MBDesk</h1>
                    <p class="text-center">Plus de 50 références de l'immobilier professionnel</p>
                </div>
            </div>
        </section>

        <!-- affiche chacun des partenaires de la bdd -->

        <section>
            <div class="row">
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/airbnb.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/amd.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/nvidia.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/uber.192.png">
                </div>                
            </div>
            
            <div class="row">
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/sap.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/kakao.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/deepmind.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/dropbox.192.png">
                </div>                
            </div>
            
            <div class="row">
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/ebay.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/google.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/snapchat.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/intel.192.png">
                </div>                
            </div>            
            <div class="row">
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/coca_cola.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/xiaomi.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/qualcomm.192.png">
                </div>
                <div class="col">
                    <img src="https://www.tensorflow.org/site-assets/images/partner-logos/twitter.192.png">
                </div>                
            </div>              

        </section>


        <div class="row annonce">
            <div class="col-4" style="background-image:url('media/image/partenaires.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;"></div>
            <div class="col pt-2 ml-1">
                <h1 class="mb-2">Nom entreprise partenaire</h1>
                <h2 class="mb-0"><i class="material-icons">place</i> Adresse entreprise, code postal, ville</h2>
            </div>
        </div>

        <section>

        </section>

        <?php include("components/footer.php") ?>

    </div>

    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
