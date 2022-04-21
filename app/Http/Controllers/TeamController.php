<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allteams=Team::where('groupe',0)->get();
        $teamA=Team::where('groupe',1)->get();
        $teamB=Team::where('groupe',2)->get();
        $teamC=Team::where('groupe',3)->get();
        $teamD=Team::where('groupe',4)->get();
        
        return view('tournois',compact('allteams','teamA','teamB','teamC','teamD'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $names = explode("\n",$request->name);

        foreach($names as $name){
            if($name == ""){

            }else{                
            Team::create([
                'name'=> $name
            ]);
            }
        }
        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $team = Team::findOrFail($request->team);
        $team->update([        
            'groupe'=>$request->groupe,
          ]);
        return redirect()->route('teams.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $team = Team::findOrFail($request->id);
        $team->delete();
        return redirect()->route('teams.index');
    }
    public function destroyAll()
    {
        DB::table('teams')->delete();
        return redirect()->route('teams.index');
    }
    public function updateteam(Request $request)
    {
        $team = Team::findOrFail($request->id);
        $team->update([        
            'groupe'=>0,
          ]);
        return redirect()->route('teams.index');
    }
}
