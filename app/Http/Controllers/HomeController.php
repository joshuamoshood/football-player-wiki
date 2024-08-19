<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $players = Player::with(['playerStat', 'country', 'club'])->paginate(6);
        return view("welcome", compact('players'));
    }
}
