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

global $_CONFIG;
$_CONFIG = json_decode(file_get_contents("/mnt/familine/private/FamilineConfig.json"), true);

global $loggedIn;
$loggedIn = null;

global $_WELCOMED;
if (!file_exists("/mnt/familine/private/welcomed.json")) {
    file_put_contents("/mnt/familine/private/welcomed.json", "[]");
}
$_WELCOMED = json_decode(file_get_contents("/mnt/familine/private/welcomed.json"), true);
$_FRENCH = str_starts_with($_SERVER['HTTP_ACCEPT_LANGUAGE'], "fr");

if (isset($_COOKIE['FL_SESSION_TOKEN'])) {
    if (str_contains($_COOKIE['FL_SESSION_TOKEN'], ".") || str_contains($_COOKIE['FL_SESSION_TOKEN'], "/")) {
        $loggedIn = false;
    }

    if (file_exists("/mnt/familine/private/tokens/" . str_replace(".", "", str_replace("/", "", $_COOKIE['FL_SESSION_TOKEN'])))) {
        $_PROFILE = json_decode(file_get_contents("/mnt/familine/private/tokens/" . str_replace(".", "", str_replace("/", "", $_COOKIE['FL_SESSION_TOKEN']))), true);

        if (isset($_PROFILE['familine'])) {
            $loggedIn = false;
        }

        $_USER = $_PROFILE['login'];
        $_SUID = $_PROFILE['login'];
        $_FULLNAME = $_PROFILE['name'];
        $_FRENCH = $_PROFILE['profile']['locale']['name'] === "fr";
        $loggedIn = true;

        if (!in_array($_USER, $_WELCOMED)) {
            $loggedIn = false;
        }
    } else {
        $loggedIn = false;
    }
} else {
    $loggedIn = false;
}

function l($fr, $en) {
    global $_FRENCH;

    if ($_FRENCH) {
        return $fr;
    } else {
        return $en;
    }
}