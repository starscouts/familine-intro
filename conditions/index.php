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
    <title><?= l("Conditions d'accès", "Terms of Access") ?> | Familine</title>
    <link rel="stylesheet" href="/stylesheet.css">
</head>
<body>
    <header class="scrolled-force">
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
        <div id="skip-header"></div>
        <div class="container" style="padding-top: 5px;">
            <h1><?= l("Conditions d'accès aux services Familine hébergé par Equestria.dev", "Terms to access Familine services hosted by Equestria.dev") ?></h1>
            <?php if ($loggedIn): ?>
            <p class="text-muted"><?= l("Vous êtes déjà connecté·e à Familine, vous avez par conséquent déjà accès à Familine ; cela signifie que vous respectez l'intégralité des conditions décrites dans ce document.", "You are already logged into Familine, so you already have access to Familine; this means you already respect all of the conditions described here.") ?></p>
            <?php endif; ?>

            <?= l(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/conditions/fr.html"), file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/conditions/en.html")); ?>
        </div>
    </main>

    <script src="/main.js"></script>
</body>
</html>
