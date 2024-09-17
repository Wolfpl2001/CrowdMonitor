<?php

// app/Http/Controllers/TerugkijkpaginaController.php

namespace App\Http\Controllers;

class TerugkijkController extends Controller
{
    public function index()
    {
        $evenementController = new EvenementController();
        $data = $evenementController->getEventDataById(1); // Provide the desired event ID

        return view("terugkijkpagina", $data);
    }
}