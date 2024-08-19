<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Country;
use App\Models\FootballClub;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Player\StoreRequest as StorePlayerRequest;
use App\Http\Requests\Player\UpdateRequest as UpdatePlayerRequest;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $players = Player::with(['playerStat', 'country', 'club'])->paginate(6);
        return view("players.admin.index", compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $clubs = FootballClub::all();
        
        return view("players.admin.create", compact('clubs', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        $profilePic = null;
        if($request->profile_pic instanceof UploadedFile){
            $profilePic = $request->profile_pic->store('players', 'public');
        }
        
        $player = Player::create([
            'name' => $request->name,
            'age' => $request->age,
            'country_id' => $request->country_id,
            'football_club_id' => $request->football_club_id,
            'profile_pic' => $profilePic,
        ]);

        $player->playerStat()->create($request->only([
            'appearances',
            'goals',
            'assists',
            'yellow_cards',
            'red_cards'
        ]));

        session()->flash("success", "Player created successfully!");
        return redirect()->route("players.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        $countries = Country::all();
        $clubs = FootballClub::all();
        
        return view("players.admin.edit", compact('player', 'clubs', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, string $id)
    {
        $player = Player::findOrFail($id);

        $profilePic = null;
        if($request->profile_pic instanceof UploadedFile){
            $profilePic = $request->profile_pic->store('players', 'public');
        }

        $player->update([
            'name' => $request->name,
            'age' => $request->age,
            'country_id' => $request->country_id,
            'football_club_id' => $request->football_club_id,
            'profile_pic' => $profilePic ?? $player->profile_pic
        ]);

        $player->playerStat()->update($request->only([
            'appearances',
            'goals',
            'assits',
            'yellow_cards',
            'red_cards'
        ]));
        session()->flash("success", "Player updated successfully!");
        return redirect()->route("players.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::findOrFail($id);

        if($player->profile_pic){
            try {
                Storage::disk('public')->delete($player->profile_pic);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        $player->delete();

        session()->flash("success", "Player deleted successfully!");
        return redirect()->route("players.index");
    }
}
