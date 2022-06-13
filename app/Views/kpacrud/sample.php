<?php

/**
 * @example
 * <pre>
 *      &lt;html&gt;
 *          &lt;head&gt;
 *              &lt;title&gt;KpaCrud Sample&lt;/title&gt;
 *          &lt;/head&gt;
 *          &lt;body&gt;
 *              &lt;?=$output?&gt;
 *          &lt;/body>
 *      &lt;/html>
 * </pre>
 * 
 * @package KpaCrud\Views
 * 
 * @version 1.3.0.2a
 * @author JMFXR <dev@siensis.com> 
 * @copyright 2022 SIENSIS Dev
 * @license MIT
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 * 
 * This code is provided for educational purposes
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "Gestió " . $title ?? 'Administració' ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Panell d'administració</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/usuaris'); ?>">Usuaris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/establiments'); ?>">Establiments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/categories'); ?>">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/cartes'); ?>">Cartes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/plats'); ?>">Plats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/alergens'); ?>">Alergens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/suplements'); ?>">Suplements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/taules'); ?>">Taules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/crud/temes'); ?>">Temes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>">Tornar al Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1><?= $title ?? 'Demo CrudGen' ?></h1>
    <div class="container-lg">
        <?= $output ?>
    </div>
</body>

</html>