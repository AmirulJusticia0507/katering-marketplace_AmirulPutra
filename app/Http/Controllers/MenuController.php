<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchants = Merchant::all();
        return view('menus.create', compact('merchants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required',
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image',
            'harga' => 'required|numeric',
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        Menu::create([
            'merchant_id' => $request->merchant_id,
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'foto' => $imageName,
            'harga' => $request->harga,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merchants = Merchant::all();
        return view('menus.edit', compact('menu', 'merchants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'merchant_id' => 'required',
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image',
            'harga' => 'required|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $data['foto'] = $imageName;
        }

        $menu = Menu::findOrFail($id);
        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
