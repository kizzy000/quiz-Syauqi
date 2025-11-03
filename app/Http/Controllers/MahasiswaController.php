<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mhs'] = Mahasiswa::all();
        return view('mhs.mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mhs.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'nim'     => 'required|min:10',
            'email'   => 'required|email',
            'jurusan' => 'required|min:15',
            'alamat'  => 'required|min:100'
        ]);

        $data['name']     = $request->name;
        $data['nim']     = $request->nim;
        $data['email']    = $request->email;
        $data['jurusan'] = $request->jurusan;
        $data['alamat'] = $request->alamat;

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Penambahan Data Berhasil!');
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
    public function edit(string $id)
    {
        $data['mhs'] = Mahasiswa::findOrFail($id);
        return view('mhs.mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mhs_id = $id;
        $mhs    = User::findOrFail($user_id);

        $request->validate([
            'name'    => 'required|string|max:100',
            'nim'     => 'required|min:10',
            'email'   => 'required|email',
            'jurusan' => 'required|min:15',
            'alamat'  => 'required|min:100'
        ]);

        $mhs->name  = $request->name;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->jurusan = $request->jurusan;
        $mhs->alamat = $request->alamat;

        $mhs->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mhs = User::findOrFail($id);

        $mhs->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Di Hapus!');
    }
}
