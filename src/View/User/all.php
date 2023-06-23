<?php
session_start();
if (isset($_SESSION['id'])) { ?>
    <button onclick="window.location='/localhost_piephp/User/show'">Informations de l'utilisateur</button>
    <button onclick="window.location='/localhost_piephp/User/all'">Voir tous les utilisateurs</button>
    <button onclick="window.location='/localhost_piephp/Movie/allMovie'">Voir tous les films</button>
    <button onclick="window.location='/localhost_piephp/User/update'">Mettre à jour un utilisateur</button>
    <button onclick="window.location='/localhost_piephp/User/delete'">Supprimer un utilisateur</button>
    <button onclick="window.location='/localhost_piephp/User/logout'">Se déconnecter</button>
    <h1>Tous les utilisateurs</h1>
    <div>
        @foreach ($users as $user)
        <a href="/localhost_piephp/User/show/{{$user['id']}}">
            <h2>{{$user['firstname']}} {{$user['lastname']}}</h2>
        </a>
        @endforeach
    </div>
    <?php
} else {
    header('Location: /localhost_piephp/User/Login');
}
