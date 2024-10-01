<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;

class SearchController extends Controller
{
    /**
     * Search for catering services (Merchants) based on various criteria.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function searchKatering(Request $request)
    {
        // Validasi kriteria pencarian (opsional, tergantung kebutuhan)
        $request->validate([
            'lokasi' => 'nullable|string',
            'jenis_makanan' => 'nullable|string',
            'nama_perusahaan' => 'nullable|string',
        ]);

        // Inisialisasi query untuk Merchant
        $query = Merchant::query();

        // Filter berdasarkan lokasi jika diinputkan
        if ($request->filled('lokasi')) {
            $query->where('alamat', 'like', '%' . $request->lokasi . '%');
        }

        // Filter berdasarkan jenis makanan (contoh filter pada field di menu katering)
        if ($request->filled('jenis_makanan')) {
            $query->whereHas('menus', function ($q) use ($request) {
                $q->where('jenis_makanan', 'like', '%' . $request->jenis_makanan . '%');
            });
        }

        // Filter berdasarkan nama perusahaan
        if ($request->filled('nama_perusahaan')) {
            $query->where('nama_perusahaan', 'like', '%' . $request->nama_perusahaan . '%');
        }

        // Dapatkan hasil pencarian
        $merchants = $query->get();

        // Tampilkan hasil ke view
        return view('search.results', compact('merchants'));
    }
}
