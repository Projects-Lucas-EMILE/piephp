<?php
session_start();
if (isset($_SESSION['id'])) { ?>
    <button onclick="window.location='/localhost_piephp/User/show'">Informations de l'utilisateur</button>
    <button onclick="window.location='/localhost_piephp/User/all'">Voir tous les utilisateurs</button>
    <button onclick="window.location='/localhost_piephp/Movie/allMovie'">Voir tous les films</button>
    <button onclick="window.location='/localhost_piephp/User/update'">Mettre à jour un utilisateur</button>
    <button onclick="window.location='/localhost_piephp/User/delete'">Supprimer un utilisateur</button>
    <button onclick="window.location='/localhost_piephp/User/logout'">Se déconnecter</button>
    <h1>Informations de l'utilisateur</h1>
    <?php
    $this->readUserInfos($id);
} else {
    header('Location: /localhost_piephp/User/Login');
}
