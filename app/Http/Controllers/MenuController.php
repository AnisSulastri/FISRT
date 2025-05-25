<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); 
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|min:5|max:255',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                'public/menus',
                'menu_' . time() . '.' . $request->file('image')->extension()
            );
            $validated['image'] = basename($path);
        }

        Menu::create($validated);

        $notification = [
            'message' => 'Data menu berhasil disimpan',
            'alert-type' => 'success'
        ];

        // Sesuai route kamu, index route name-nya 'menu'
        if ($request->save ?? false) {
            return redirect()->route('menu')->with($notification);
        } else {
            return redirect()->route('menu.create')->with($notification);
        }
    }

    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|min:5|max:255',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($menu->image) {
                Storage::delete('public/menus/' . $menu->image);
            }
            $path = $request->file('image')->storeAs(
                'public/menus',
                'menu_' . time() . '.' . $request->file('image')->extension()
            );
            $validated['image'] = basename($path);
        }

        $menu->update($validated);

        $notification = [
            'message' => 'Data menu berhasil diubah',
            'alert-type' => 'success'
        ];

        return redirect()->route('menu')->with($notification);
    }

    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image) {
            Storage::delete('public/menus/' . $menu->image);
        }

        $menu->delete();

        $notification = [
            'message' => 'Data menu berhasil dihapus',
            'alert-type' => 'success'
        ];

        return redirect()->route('menu')->with($notification);
    }
}