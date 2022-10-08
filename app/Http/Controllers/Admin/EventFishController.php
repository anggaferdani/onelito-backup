<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventFish;
use App\Models\FishPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class EventFishController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $fishes = EventFish::query()
                ->with('photo')
                ->where('status_aktif', 1)
                ->orderBy('created_at', 'desc');

            return DataTables::of($fishes)
            ->addIndexColumn()
            ->editColumn('photo', function ($data) {
                $path = $data->photo->path_foto ?? false;

                if (!$path) {
                    return '';
                }

                return '
                    <img src="'.asset("storage/$path").'" style="
                    width: 80px;
                    height: 80px;
                    object-fit: cover;">
                ';
            })
            ->addColumn('action','admin.pages.auction-product.dt-action')
            ->rawColumns(['action', 'photo'])
            ->make(true);
        }

        return view('admin.pages.auction-product.index')->with([
            'type_menu' => 'manage-auction-product'
        ]);
    }

    public function store()
    {
        $data = $this->request->all();

        $data['create_by'] = Auth::guard('admin')->id();
        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 1;

        $image = null;
        if($this->request->hasFile('path_foto')){
            $image = $this->request->file('path_foto')->store(
                'foto_ikan','public'
            );
        }

        $createFish = DB::transaction(function () use ($data, $image){
            unset($data['path_foto']);
            $fish = EventFish::create($data);

            if ($image !== null) {
                $fotoIkan['id_ikan'] = $fish->id_ikan;
                $fotoIkan['path_foto'] = $image;
                $fotoIkan['create_by'] = Auth::guard('admin')->id();
                $fotoIkan['update_by'] = Auth::guard('admin')->id();
                $fotoIkan['status_aktif'] = 1;

                FishPhoto::create($fotoIkan);
            }
        });

        if($createFish){
            return redirect()->back()->with([
                'success' => true,
                'message' => 'Sukses Menambahkan Barang Lelang',

            ],200);
        }else{
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Gagal Menambahkan Barang Lelang'
            ],500);
        }
    }

    public function show($id)
    {
        $fish = EventFish::with('photo')->findOrFail($id);

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
        $fish = EventFish::With('photo')->findOrFail($id);
        $data = $this->request->all();
        $validator = Validator::make($this->request->all(), [
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data['update_by'] = Auth::guard('admin')->id();

        $image = null;
        if($this->request->hasFile('path_foto')){
            $image = $this->request->file('path_foto')->store(
                'foto_ikan','public'
            );
        }

        try {
            DB::transaction(function () use ($data, $image, $fish){
                unset($data['path_foto']);
                $fish->update($data);

                if ($image !== null) {
                    $fotoIkan['id_ikan'] = $fish->id_ikan;
                    $fotoIkan['path_foto'] = $image;
                    $fotoIkan['create_by'] = Auth::guard('admin')->id();
                    $fotoIkan['update_by'] = Auth::guard('admin')->id();
                    $fotoIkan['status_aktif'] = 1;

                    if ($fish->photo !== null) {
                        $fishFoto = $fish->photo;
                        $fishFoto->path_foto = $image;
                        $fishFoto->save();
                    } else {
                        FishPhoto::create($fotoIkan);
                    }
                }
            });

            return response()->json([
                'success' => true,
                'message' => [
                    'title' => 'Berhasil',
                    'content' => 'Mengubah data barang lelang',
                    'type' => 'success'
                ],
            ],200);

        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'error' => $e->getMessage(),
            ],500);
        }
    }

    public function destroy($id)
    {
        $eventFish = EventFish::findOrFail($id);
        $eventFish->status_aktif = 0;

        $eventFish->save();

        return response()->json([
            'success' => true,
        ],200);
    }
}
