<?php

namespace App\Http\Controllers;

 
use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LibraryController extends Controller
{
    public function index_admin () {
        $bukus = Buku::all();
        return view('index_admin', compact("bukus"));
    }

    public function index_siswa (){
        return view('index_siswa');
    }

    public function index_akun (){
        $siswas = Siswa::all();
        return view('index_akun', compact("siswas"));
    }

    public function login () {
        return view('login');
    }

    public function register () {
        return view('register');
    }

    public function profil () {
        return view('profil');
    }
    
    public function delete_buku($id){
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('dashboard_admin')->with('success', 'buku berhasil dihapus');
    }

    public function delete_akun($id){
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('dashboard_akun')->with('success', 'akun berhasil dihapus');
    }

    public function create_buku(Request $request){

        // return $request->file('image')->store('cover-images');

        $datas = $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|string',
        ]);

        if($request->file('image')){
            $datas['image'] = $request->file('image')->store('cover-images');
        };



        $datas = Buku::create($datas);
        return redirect()->route('dashboard_admin')->with('success', 'buku berhasil ditambahkan');
    }

    public function edit_buku(Request $request, $id){
        $datas = $request->validate([
           
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|string',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($datas);
        return redirect()->route('dashboard_admin')->with('success', 'buku berhasil diedit');
    }

    public function create_akun(Request $request){
        $user = Siswa::create([
            'nama' => $request->nama, 
            'kelas' => $request->kelas, 
            'role_status' => 'siswa', 
            'email' => $request->email, 
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('dashboard_akun')->with('success', 'akun berhasil ditambahkan');
    }

    public function edit_akun(Request $request, $id){
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama, 
            'kelas' => $request->kelas, 
            'role_status' => 'siswa', 
            'email' => $request->email, 
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('dashboard_akun')->with('success', 'akun berhasil ditambahkan');
    }

   
}
