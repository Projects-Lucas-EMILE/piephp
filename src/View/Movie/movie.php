<button onclick="window.location='/localhost_piephp/User/show'">Informations de l'utilisateur</button>
<button onclick="window.location='/localhost_piephp/User/all'">Voir tous les utilisateurs</button>
<button onclick="window.location='/localhost_piephp/Movie/allMovie'">Voir tous les films</button>
<button onclick="window.location='/localhost_piephp/User/update'">Mettre à jour un utilisateur</button>
<button onclick="window.location='/localhost_piephp/User/delete'">Supprimer un utilisateur</button>
<button onclick="window.location='/localhost_piephp/User/logout'">Se déconnecter</button>
<h1>Tous les films</h1>
<div>
    @foreach ($movies as $movie)
    <a href="/localhost_piephp/Movie/movie/{{$movie['id']}}">
        <h2>{{ $movie['title'] }}</h2>
        <h2>by {{ $movie['director'] }}</h2>
        @foreach ($movie['genre'] ?? [] as $genre)
        <p>#{{ $genre['name'] }}</p>
        @endforeach
        <h4>{{ $movie['duration'] }}</h4>
        <h4>Release in {{ $movie['release_date'] }}</h4>
    </a>
    @endforeach
</div>