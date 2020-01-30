<?php

namespace Sagar\Usermaster\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sagar\Usermaster\Models\Usermaster;

class UsermasterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usermasters = Usermaster::latest()->paginate(5);
        return view('usermaster::index', compact('usermasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usermaster::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ]);

        Usermaster::create($request->all());

        return redirect()->route('usermaster.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Esense\Usermaster\Models\Usermaster  $usermaster
     * @return \Illuminate\Http\Response
     */
    public function show(Usermaster $usermaster)
    {
        return view('usermaster::show', compact('usermaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Esense\Usermaster\Models\Usermaster  $usermaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Usermaster $usermaster)
    {
        return view('usermaster::edit', compact('usermaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Esense\Usermaster\Models\Usermaster  $usermaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usermaster $usermaster)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ]);

        $usermaster->update($request->all());

        return redirect()->route('usermaster.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Esense\Usermaster\Models\Usermaster  $usermaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usermaster $usermaster)
    {
        $usermaster->delete();

        return redirect()->route('usermaster.index')->with('success', 'User deleted successfully');
    }
}
