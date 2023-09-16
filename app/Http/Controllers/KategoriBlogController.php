<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriPost;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class KategoriBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $globalSearch = AllowedFilter::callback('global',function($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%");
                });
            });
        });

        $kategori = QueryBuilder::for(Kategori::select('kategori.*','users.name as name_user',
                                    DB::raw('DATE_FORMAT(kategori.created_at, "%d-%m-%Y %H:%i:%s") as created_at_formatted'))
                    ->join('users','users.id','kategori.user_id'))
                    ->defaultSort('name')
                    ->allowedFilters(['name', $globalSearch])
                    ->paginate(10)
                    ->withQueryString();
        return Inertia::render('Kategori/Index',[
            'kategori' => $kategori,
        ])->table(function (InertiaTable $table) {
            $table->column(key: 'id',label:'ID', searchable: true, sortable: true);
            $table->column(key: 'name',label:'Kategori', searchable: true, sortable: true);
            $table->column(key: 'name_user',label:'User', searchable: true, sortable: true);
            $table->column(key: 'created_at_formatted',label:'Join Date', searchable: true, sortable: true);
            $table->column(label: 'Actions');
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Kategori/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriPost $request)
    {
        try {
            $kategori = new Kategori;
            $kategori->name = $request->get('name');
            $kategori->user_id = Auth::user()->id;
            $kategori->save();
            sleep(1);
            return redirect()->route('kategori.index')->with('message','Berhasil menambahkan data.');
        } catch (Exception $th) {
            return redirect()->route('kategori.index')->with('errors','Berhasil menambahkan data.');
        }
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
        $data = Kategori::find($id);
        return Inertia::render('Kategori/Edit',[
            'kategori' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriPost $request, string $id)
    {
        try {
            $update = Kategori::find($id);
            $update->name = $request->get('name');
            $update->user_id = Auth::user()->id;
            $update->update();
            sleep(1);
            return redirect()->route('kategori.index')->with('message','Berhasil mengganti data.');
        } catch (Exception $th) {
            return redirect()->route('kategori.index')->with('errors','Berhasil menambahkan data.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
           Kategori::find($id)->delete();
            sleep(1);
            return redirect()->route('kategori.index')->with('message','Berhasil menghapus data.');
        } catch (Exception $th) {
            return redirect()->route('kategori.index')->with('errors','Berhasil menambahkan data.');
        }
    }
}
