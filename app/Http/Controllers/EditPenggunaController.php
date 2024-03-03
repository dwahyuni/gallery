<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EditPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datapengguna.editpengguna');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        return view('datapengguna.editpengguna', [
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'max:255'],
            'level' => ['string'],
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->level = $request->level;
        $data->save();

        return to_route('pengguna')->withMessage('success', 'Data Berhasil diEdit');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
     {
         $user = User::where('id', $id)->first(); // Retrieve the model instance
 
         if (!$user) {
             return redirect('/pengguna')->with('error', 'Photo not found');
         }
 
         // Delete the record from the database
         $deletedRows = User::where('id', $id)->delete();
 
         return redirect('/pengguna')->with('success', 'Data Berhasil Di Hapus!');
    }

}
