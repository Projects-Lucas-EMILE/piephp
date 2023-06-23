<button onclick="window.location='/localhost_piephp/User/show'">Informations de l'utilisateur</button>
<button onclick="window.location='/localhost_piephp/User/all'">Voir tous les utilisateurs</button>
<button onclick="window.location='/localhost_piephp/Article/articles'">Voir tous les articles</button>
<button onclick="window.location='/localhost_piephp/User/update'">Mettre à jour un utilisateur</button>
<button onclick="window.location='/localhost_piephp/User/delete'">Supprimer un utilisateur</button>
<button onclick="window.location='/localhost_piephp/User/logout'">Se déconnecter</button>
<h1>Tous les articles</h1>
<div>
    @foreach ($articles as $article)
    <h2><a href="./articles/{{$article['id']}}">{{ $article['title'] }}</a></h2>
    <h4>{{ $article['content'] }}</h4>

    @foreach ($article['tag'] ?? [] as $tag)
    <p>#{{ $tag['name'] }}</p>
    @endforeach

    @foreach ($article['comment'] ?? [] as $comment)
    <h6>{{ $comment['text'] }}</h6>
    @endforeach
    @endforeach
</div>