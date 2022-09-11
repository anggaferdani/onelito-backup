<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KoiStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KoiStockController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $fishes = KoiStock::query()
                ->where('status_aktif', 1)
                ->orderBy('created_at', 'desc');

            return DataTables::of($fishes)
            ->addIndexColumn()
            ->addColumn('action','admin.pages.fish.dt-action')
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.fish.index')->with([
            'type_menu' => 'manage-fish'
        ]);
    }

    public function store()
    {
        $data = $this->request->all();

        $data['create_by'] = Auth::guard('admin')->id();
        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 1;

        $createFish = KoiStock::create($data);

        if($createFish){
            return redirect()->back()->with([
                'success' => true,
                'message' => 'Sukses Menambahkan Ikan',

            ],200);
        }else{
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Gagal Menambahkan Ikan'
            ],500);
        }
    }

    public function show($id)
    {
        $fish = KoiStock::findOrFail($id);

        if($fish){
            return response()->json($fish);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found'
            ],404);
        }
    }

    public function update($id)
    {
        $fish = KoiStock::findOrFail($id);
        $data = $this->request->all();
        $validator = Validator::make($this->request->all(), [
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data['update_by'] = Auth::guard('admin')->id();
        $updateFish = $fish->update($data);

        if($updateFish){
            return response()->json([
                'success' => true,
                'message' => [
                    'title' => 'Berhasil',
                    'content' => 'Mengubah data ikan',
                    'type' => 'success'
                ],
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => [
                    'title' => 'Gagal',
                    'content' => 'Mengubah data ikan',
                    'type' => 'error'
                ],
            ],400);
        }
    }

    public function destroy($id)
    {
        $koi = KoiStock::findOrFail($id);
        $koi->status_aktif = 0;

        $koi->save();

        return response()->json([
            'success' => true,
        ],200);
    }
}
