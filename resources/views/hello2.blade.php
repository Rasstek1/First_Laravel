<h1>helloworld</h1>

<?php
$tableau = array("Bob", "John", "Katia");
?>

<h2>Affichage des éléments du tableau :</h2>
@forelse ($tableau as $valeur)
    <p>{{ $valeur }}</p>
@empty
    <p>Le tableau est vide !</p>
@endforelse

<h2>Affichage des éléments du tableau avec leur indice :</h2>
@forelse ($tableau as $nom)
    <p>{{ $loop->index }} : {{ $nom }}</p>
@empty
    <p>Le tableau est vide !</p>
@endforelse
