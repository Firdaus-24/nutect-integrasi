<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Securities\Price;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Editor\Fields\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        return view('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.addProduk')->with(['data' => Kategori::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_name' => 'required|unique:produks,produk_name|min:3|max:30',
            'foto' => 'required|max:3000|mimes:jpeg,jpg,png'
        ]);
        try {
            $produk = Produk::create($request->all());
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
                $produk->foto = $request->file('foto')->getClientOriginalName();
                $produk->save();
            }
            return back()->with('success', 'data berhasil di simpan');
        } catch (\Throwable $th) {
            $th = "error euy";
        }
    }
    public function dataTableProduk(Request $request)
    {
        // if ($request->ajax()) {
        $data = Produk::with('kategori')->get();
        $datatables = DataTables::of($data)

            ->addIndexColumn()
            ->addColumn('foto', function ($data) {
                return "<img src='images/" . $data->foto . "' alt='" . $data->foto . "' width=60 class='max-h-1'>";;
            })
            ->addColumn('produk_name', function ($data) {
                return $data->produk_name;
            })
            ->addColumn('kategori_name', function ($data) {
                return $data->kategori->name;
            })
            ->addColumn('harga_beli', function ($data) {
                return $data->harga_beli;
            })
            ->addColumn('harga_jual', function ($data) {
                return $data->harga_jual;
            })
            ->addColumn('stok', function ($data) {
                return $data->stok;
            })
            ->addColumn('aksi', function ($data) {
                return "
                <div class='flex flex-row'>
                    <a role='button'  href='" . route('update.produk', ['id' => $data->id]) . "' class='mx-2'><img src='" .  asset('images/edit.png')  . "' alt='edit' width='15' heigth='15'> </a>
                    <a onClick='hapus(this)' role='button'  class='mx-2' data-id='" . $data->id . "' ><img src='" .  asset('images/delete.png')  . "' alt='edit'  width='15' heigth='15' > </a>

                </div>
                ";
            })->rawColumns(['aksi', 'foto']);

        return $datatables->make(true);
        // }
    }
    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $request->validate([

            'produk_name' => 'required|unique:produks,produk_name|min:3|max:30',
            'foto' => 'max:3000|mimes:jpeg,jpg,png'
        ]);
        try {
            $produk = Produk::findOrFail($request->id);
            $produk->update([
                'produk_name' => $request->produk_name,
                'kategori_id' => $request->kategori_id,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
            ]);

            // Handle photo update if a new photo is provided
            if ($request->hasFile('foto')) {
                // Delete the old photo if it exists
                // if ($produk->foto) {
                //     unlink('images/' . $produk->foto);
                // }
                $image_path = public_path('images/') . $request->foto;  // Value is not URL but directory file path

                if (file_exists($image_path)) {
                    try {
                        unlink($image_path);
                    } catch (\Exception $e) {
                        Log::error('Error deleting old file: ' . $e->getMessage());
                    }
                }

                // Store the new photo
                $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());

                // Update the produk with the new photo path
                $produk->update([
                    'foto' => $request->file('foto')->getClientOriginalName(),
                ]);
            }

            return back()->with('success', 'data berhasil di simpan');
        } catch (\Throwable $th) {
            $th = "error euy";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $produk = Produk::findOrFail($request->id);
        $data = Kategori::all();
        return view('produk.updateProduk')->with(['data' => $data, 'produk' => $produk]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk, $request)
    {
        $data = Produk::find($request);
        try {
            $image_path = public_path('images/') . $data->foto;  // Value is not URL but directory file path

            if (file_exists($image_path)) {
                try {
                    unlink($image_path);
                } catch (\Exception $e) {
                    Log::error('Error deleting old file: ' . $e->getMessage());
                }
            }
            // if (File::exists($image_path)) {
            $delete = $data->delete();
            //     File::delete($image_path);
            // }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Produk Dihapus!',
                    'data'    => $data->produk_name
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Produk Gagal Dihapus!',
                    'data'    => $data
                ],
                500
            );
        }
    }
}
