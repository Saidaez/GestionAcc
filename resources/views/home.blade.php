<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        img:hover {
            border: 2px solid gray; 
        }

     
        @media screen and (max-width: 768px) {
            .navbar-nav {
                display: none; 
            }

            .show-buttons {
                display: block !important; 
            }
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container d-flex justify-content-between align-items-center">
           
            <img src="{{ asset('images/logo.png')}}" alt="Logo" style="width: 100px; margin-top:5px; height: auto;">

           
            <h1 style="flex: 1; text-align: center;">Gestion pièce de rechange Accostage</h1>

           
            <div class="d-flex">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        </nav>
</header>


<main>
   
    <div class="container">
    <h1>Bienvenue Dans Gestion pièce de rechange Accostage</h1> <br>
    <br>
        <div class="row">
            <div class="col-md-6">
           <p style="font-family: Arial, Helvetica, sans-serif; text-indent:50px
           ; letter-spacing:2px;">Le poste d'accostage comprend une table élévatrice TEL13 avec 3 positions,
             permettant l'accostage des bases porteuses équipées d'organes mécaniques avec la caisse sur la balancelle du CVR aérien 6 pouces. 
             Le fonctionnement détaillé inclut le contrôle de la présence de la caisse, 
             l'introduction de la base porteuse, la montée de la table élévatrice, l'indexage de la balancelle,
              et la validation finale du cycle. Des procédures de sécurité et des alarmes
             sont intégrées pour assurer le bon déroulement de chaque étape.</p>
             </div> 
             <div class="col-md-6">
             <img src="{{ asset('images/acc.jpg')}}" alt="Button 1" style="width: 500px;
              height: 250px; margin-bottom: 40px; 
              box-shadow:0px 0px 10px rgba(0,0,0,0.5);  
              transition: transform 0.3s ease-in-out;">
        </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white" style="text-align: center;">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h5>Gestion pièce de rechange Accostage</h5>
                <p>© 2024 Renault group</p>
            </div>
        
        </div>
    </div>
</footer>
</body>
</html>