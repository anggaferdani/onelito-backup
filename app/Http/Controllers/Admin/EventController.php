<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $auctions = Event::query()
                ->where('status_aktif', 0)
                ->orderBy('created_at', 'desc');

            return DataTables::of($auctions)
            ->addIndexColumn()
            ->addColumn('action','admin.pages.auction.dt-action')
            ->make(true);
        }

        return view('admin.pages.auction.index')->with([
            'type_menu' => 'manage-auction'
        ]);
    }

    public function store()
    {
        $data = $this->request->all();

        $data['create_by'] = Auth::guard('admin')->id();
        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 0;

        $createAuction = Event::create($data);

        if($createAuction){
            return redirect()->back()->with([
                'success' => true,
                'message' => 'Sukses Menambahkan Auction',

            ],200);
        }else{
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Gagal Menambahkan Auction'
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
                    $fotoIkan['status_aktif'] = 0;

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
        $auction = Event::findOrFail($id);
        $auction->status_aktif = 1;

        $auction->save();

        return response()->json([
            'success' => true,
        ],200);
    }
}
