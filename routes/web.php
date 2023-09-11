<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//pour tester dans le terminal : php artisan serve et appuyer sur 127.0.0.1:8000

Route::get('/', function () {
    return view('hello2');
});

Route::get('/hello', function () {//http://127.0.0.1:8000/hello
    return 'Hello World';
});

Route::get('/user', function () {//Route #1
    $name = request("name");		// tester avec l’url : /user?name=Alex
    return view('user',[
        "nomUsager" => $name 		//La vue peut utiliser la variable $nomUsager
    ]);
});

Route::get('/user/{id}', function ($id){			// tester avec l’url : /user/2
    $users = ['Alex', 'Émile', 'Julie', 'Mélanie'];
    return view("user", ["nomUsager" => $users[$id]]);
});

Route::get('/hello3', [UserController::class, 'hello3']);	//[Contrôleur::class, 'méthode’] Usercontroller est le nom du contrôleur et hello3 est la méthode

Route::get('/user/{id}', function ($id){			// erreur si url = http://127.0.0.1:8000/user/4
    $users = ['Alex', 'Émile', 'Julie', 'Mélanie'];
    return view("user", ["nomUsager" => $users[$id]]);
})-> where(['id' => '[0-3]']);		//tester avec l’url : /user/2  => Julie

Route::get('user2/{id}/{name}',
    [UserController::class, 'AfficherUser'])//Fonctionne avec le contrôleur UserController et la méthode AfficherUser
    -> where (['id' => '[0-9]+', 'name' => '[a-z]+']); //tester avec l’url : /user2/2/Julie

