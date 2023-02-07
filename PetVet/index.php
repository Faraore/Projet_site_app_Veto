<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PetVet</title>
</head>
<body>
    <header>
        <?php
            require "includes/partials/header.php";
        ?>
        
        <nav>
            <?php 
            require "includes/partials/navbarNoCo.php";
        ?>
        </nav>
    </header>
    <main>
        <article>
            <?php
            require "includes/partials/cardAcceuil.php";
            ?>
        </article>

    </main>
    <footer>
        <?php
        require"includes/partials/footer.php";
        ?>

    </footer>
    
</body>
</html>
