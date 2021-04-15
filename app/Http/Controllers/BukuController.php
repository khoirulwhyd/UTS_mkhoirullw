<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){ // Jika ingin melakukan pencarian nama
            $book = Buku::where('Judul', 'like', "%".$request->search."%")->paginate(5);
        } else { // Jika tidak melakukan pencarian nama
            //fungsi eloquent menampilkan data menggunakan pagination
            $book = Buku::paginate(5); // Pagination menampilkan 5 data
        }
        return view('book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_Buku'=> 'required',
            'Judul'=>'required',
            'Kategori'=>'required',
            'Penerbit'=>'required',
            'Pengarang'=>'required',
            'Jumlah'=>'required',
            'Status'=>'required',
        ]);
        Buku::create($request->all());
        return redirect()-> route('book.index')
            ->with('success','Buku Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID_Buku)
    {
        $buku =Buku::find($ID_Buku);
        return view('book.detail', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_Buku)
    {
        $buku = Buku::find($ID_Buku);
        return view('book.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_Buku)
    {
        $request->validate([
            'ID_Buku'=> 'required',
            'Judul'=>'required',
            'Kategori'=>'required',
            'Penerbit'=>'required',
            'Pengarang'=>'required',
            'Jumlah'=>'required',
            'Status'=>'required',
        ]);
        Buku::find($ID_Buku)->update($request->all());
        return redirect()-> route('book.index')
            ->with('success','Buku Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_Buku)
    {
        Buku::find($ID_Buku)->delete();
            return redirect()->route('book.index')
            -> with('success', 'Buku Berhasil Dihapus!');
    }
}