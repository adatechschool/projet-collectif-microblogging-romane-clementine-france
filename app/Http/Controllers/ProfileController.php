<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParametersUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

//cette page permettra de consulter les données du profil en uri.
//Si l'user_id uri = user_id de l'utilisateur connecté alors on permet également de faire des modifications.
