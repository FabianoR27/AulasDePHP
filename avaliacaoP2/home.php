<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

include 'components/header.php'
?>

<body class="bg-fabi-1 text-light bg-hero">
    <main class="py-5" id="hero">
        <div class="container my-0 my-md-5 p-md-0">
            <header class="d-flex flex-column align-items-center align-items-md-start gap-3" data-aos="fade-right" data-aos-delay="400" data-aos-duration="1000">
                <p class="h2 lh-base fw-light text-light">Olá, <span class="fw-semibold"><?= $_SESSION['usuario'] ?>!</span> Seja bem vindo(a) ao...</p>
                <h1 class="display-2 text-uppercase fw-bold text-mustard text-center text-md-start">Fantástico Mundo de <br> Fabiano Ramos.</h1>
                <p class="h2 lh-base fw-light text-light">Essa é uma área restrita. Então relaxe, ninguém saberá que você esteve aqui ;)</p>
                <p class="h2 lh-base fw-light text-light">Aproveita que tá aqui e dá uma moral na minha <span class="text-mustard fw-semibold">página pessoal</span>. o link tá logo abaixo! hehe</p>
                <p class="h5 lh-base fw-light text-light">PS: Se isso não valer um 10, eu não sei mais o que vale...</p>
            </header>

            <div class="d-flex gap-3 mt-3 justify-content-center justify-content-md-start"">
                <a href="https://fabianor27.github.io" target="_blank" rel="noopener noreferrer" class="btn btn-lg btn-warning shadow fw-semibold"><i class="bi bi-box-arrow-up-right"></i> Minha página</a>
                <a href="login.php?logout=true" class="btn btn-lg border border-warning text-warning shDOW"><i class="bi bi-door-closed-fill"></i> Logout</a>
            </div>
        </div>
    </main>

    <footer class="text-center m-auto py-3">
        <a href="https://fabianor27.github.io" target="_blank" rel="noopener noreferrer" title="olha aqui, que maneiro!"><img src="images/mysignwhite.png" width="100" alt="Fabiano Ramos Signature" class="img-fluid signature" loading="lazy"></a>
    </footer>
</body>
</html>