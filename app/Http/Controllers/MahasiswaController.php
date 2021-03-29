<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::where([
            ['nama','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('nim','desc')
        ->simplePaginate(5);
        
        return view('users.index' , compact('mahasiswa'))
        ->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
        'Nim' => 'required',
        'Nama' => 'required',
        'Kelas' => 'required',
        'Jurusan' => 'required',
        'Email' => 'required',
        'No_Handphone' => 'required',
        'Tanggal_Lahir' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
        }
       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        return view('users.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
         $Mahasiswa = Mahasiswa::find($nim);
         return view('users.edit', compact('Mahasiswa'));
    }
    public function update(Request $request, $nim)
    {//melakukan validasi data
         $request->validate([
         'Nim' => 'required',
         'Nama' => 'required',
         'Kelas' => 'required',
         'Jurusan' => 'required',
         'Email' => 'required',
         'No_Handphone' => 'required',
         'Tanggal_Lahir' => 'required',
         ]);
        //fungsi eloquent untuk mengupdate data inputan kita
         Mahasiswa::find($nim)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect()->route('mahasiswa.index')
         ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
         Mahasiswa::find($nim)->delete();
         return redirect()->route('mahasiswa.index')
         -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
};
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    


