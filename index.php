<?php
/*
 * MIT License
 *
 * Copyright (c) 2022- Minteck
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

if (str_contains($_SERVER["HTTP_USER_AGENT"], "+AutomateCloud/")) {
    header("Location: https://app.familine.minteck.org/");
    die();
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/session.php";
global $loggedIn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://cdn.familine.minteck.org/favicon.svg" type="image/svg+xml">
    <title>Familine | <?= l("Des outils fiables et puissants pour la famille", "Powerful and reliable tools for the family") ?></title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        <nav id="main-nav" class="container">
            <a id="nav-logo" href="/">
                <img src="https://cdn.familine.minteck.org/favicon.svg" alt="Familine" id="nav-logo-img">
            </a>

            <span id="nav-links">
                <a class="nav-link" href="https://minteck.org/legal/#/privacy"><?= l("Confidentialité", "Data Privacy") ?></a>
                <a class="nav-link" href="https://minteck.org/legal/#/terms"><?= l("Conditions d'utilisation", "Terms of Use") ?></a>
                <a class="nav-link" href="/conditions"><?= l("Conditions d'accès", "Terms of Access") ?></a>
                <a class="nav-link" href="https://gitlab.minteck.org/familine"><?= l("Code source", "Source code") ?></a>
            </span>

            <?php if (!$loggedIn): ?>
            <a id="nav-aside" href="https://session.familine.minteck.org/login/?r=https%3A%2F%2Ffamiline.minteck.org%2F">
                <span id="loggedin-action"><?= l("Se connecter avec Familine", "Login with Familine") ?></span>
            </a>
            <?php else: ?>
            <a id="nav-aside" href="https://app.familine.minteck.org">
                <img src="https://cdn.familine.minteck.org/me" id="loggedin-profile">
                <span id="loggedin-name">&nbsp;<?= $_FULLNAME ?> &rsaquo;</span>
            </a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <article id="hero"></article>
        <div id="hero-content">
            <div>
                <h1 id="hero-title-part-big"><span id="hero-stylized">Familine</span></h1>
                <h1 id="hero-title-part-small"><?= l("met votre famille en sécurité", "keeps your family safe") ?></h1>
                <?php if ($loggedIn): ?>
                <a class="button button-main" href="https://app.familine.minteck.org"><?= l("Ouvrir Familine", "Open Familine") ?></a>
                <?php else: ?>
                <a class="button button-main" href="https://session.familine.minteck.org/login/?r=https%3A%2F%2Fapp.familine.minteck.org%2F"><?= l("Se connecter", "Login") ?></a>
                <a class="button button-secondary" href="https://docs.google.com/forms/d/e/1FAIpQLSeXkgy_-Dd1iQSdGjccCL96pdzNAOKcnqOPUUuzsLj-7NJ2Wg/viewform"><?= l("Demander un compte", "Request Account") ?></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="container" style="text-align: center;">
            <br><br>
            <h5><?= l("Familine, c'est une multitude de services qui vous attend", "Familine, a lot of services await you") ?></h5>
            <img class="welcome-intro-img" src="/icns/familine-docs.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="<?= l("Pages", "Docs") ?>">
            <img class="welcome-intro-img" src="/icns/familine-help.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="<?= l("Aide", "Help") ?>">
            <img class="welcome-intro-img" src="/icns/familine-movies.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="<?= l("Films", "Movies") ?>">
            <img class="welcome-intro-img" src="/icns/familine-photos.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Photos">
            <img class="welcome-intro-img" src="/icns/familine-planning.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Planning">
            <img class="welcome-intro-img" src="/icns/familine-recall.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="<?= l("Généalogie", "Genealogy") ?>">
            <img class="welcome-intro-img" src="/icns/familine-share.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="<?= l("Partage", "Share") ?>">
            <img class="welcome-intro-img" src="/icns/familine-you.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="<?= l("Discussions", "Chat") ?>">
            <p><?= l(
                    "Pages · Aide · Films · Photos · Planning · Généalogie · Partage · Discussions",
                    "Docs · Help · Movies · Photos · Planning · Genealogy · Share · Chat"
                ) ?></p>
            <br>
        </div>

        <div class="welcome-box-0 welcome-box">
            <div class="container welcome-box-container">
                <div class="welcome-box-container--inner">
                    <div>
                        <h2><?= l("Un compte... tout Familine", "An account... all Familine") ?></h2>
                        <p><?= l("Avec seulement votre compte Familine, vous avez accès à une multitude de services tous interconnectés les uns avec les autres.", "With only your Familine account, you can access plenty of services all connected with each other.") ?></p>
                    </div>
                </div>
                <div class="welcome-box-container--inner">
                    <div>
                        <img id="01-account" alt="" src="https://app.familine.minteck.org/welcome/01-account-light.svg" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>

        <div class="welcome-box-1 welcome-box">
            <div class="container welcome-box-container">
                <div class="welcome-box-container--inner">
                    <div>
                        <img id="02-privacy" alt="" src="https://app.familine.minteck.org/welcome/02-privacy-light.svg" style="width:100%;">
                    </div>
                </div>
                <div class="welcome-box-container--inner">
                    <div>
                        <h2><?= l("Une sécurité sur tous les points", "An unmatched security level") ?></h2>
                        <p><?= l("Ce qui est dans la famille doit le rester. Aucune des données présentes sur Familine n'est accessible au public, l'utilisation d'un compte est obligatoire.", "What is in the family must stay in the family. None of the data on Familin eis publicly accessible, using an account is required.") ?></p>
                        <p><?= l("De plus, certaines données strictement personnelles sont accessibles par vous et seulement par vous.", "Furthermore, some data is strictly personal and accessible by you and only you.") ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="welcome-box-2 welcome-box">
            <div class="container welcome-box-container">
                <div class="welcome-box-container--inner">
                    <div>
                        <h2><?= l("N'importe où, n'importe quand", "Anywhere, at anytime") ?></h2>
                        <p><?= l("Où que vous vous trouvez dans le monde, depuis n'importe quel appareil, et à n'importe quelle heure de la journée, Familine reste accessible pour vous et toute la famille.", "Wherever you are in the world, from any device, and at any time of the day, Familine stays there for you and all the family.") ?></p>
                        <p class="text-muted small">(<?= l("Familine n'est pas accessible en Chine", "Familine is not available in China") ?>)</p>
                    </div>
                </div>
                <div class="welcome-box-container--inner">
                    <div>
                        <img id="03-devices" alt="" src="https://app.familine.minteck.org/welcome/03-devices-light.svg" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="main.js"></script>
</body>
</html>
