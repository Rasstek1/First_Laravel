<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController
{
    public function Hello3()
    {
        return view('hello2');
    }

    public function AfficherUser($id, $name): View
    {
        return view('user', [
            "nomUsager" => $name,
            "id" => $id
        ]);
    }

}
