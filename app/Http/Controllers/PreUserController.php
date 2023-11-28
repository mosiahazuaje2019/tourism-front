<?php

namespace App\Http\Controllers;

use App\Models\PreUser;
use Illuminate\Http\Request;
use App\Http\Requests\PreUser\createRequest;
use Illuminate\Support\Facades\View;

class PreUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pre-users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequest $request)
    {
        $request->validate([
            'company_name' => 'required'
        ]);
        $preuser = PreUser::create($request->all());
        return View::make('welcome')->with('success','Pre-registro creado, debe esperar el administrador se comunique con usted');
       // return redirect()->route('register-complete')->with('success', 'Pre-registro creado, debe esperar el administrador se comunique con usted');
    }

    /**
     * Display the specified resource.
     */
    public function show(PreUser $preUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreUser $preUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PreUser $preUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreUser $preUser)
    {
        //
    }
}
