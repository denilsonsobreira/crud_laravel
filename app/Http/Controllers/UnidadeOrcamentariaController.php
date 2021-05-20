<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnidadeOrcamentariaRequest;
use Illuminate\Http\Request;
use App\Models\ModelOrgao;
use App\Models\ModelUnidadeOrcamentaria;

class UnidadeOrcamentariaController extends Controller
{
    private $objUniOrcamentaria;
    public function __construct()
    {
        $this->objUniOrcamentaria = new ModelUnidadeOrcamentaria();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("crud");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgao = ModelOrgao::all();
        return view("createUniOrcamentaria",compact('orgao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadeOrcamentariaRequest $request)
    {
        $cad = ModelUnidadeOrcamentaria::create([
            'descricao'=>$request->descricao,
            'orgao_id'=>$request->orgao_id
        ]);
        return redirect("crud");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orgao = ModelOrgao::all();
        $uniOrcamentaria = ModelUnidadeOrcamentaria::find($id);
        return view('createUniOrcamentaria', compact('uniOrcamentaria', 'orgao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadeOrcamentariaRequest $request, $id)
    {
        $this->objUniOrcamentaria->where(['id'=>$id])->update([
            'descricao'=>$request->descricao,
            'orgao_id'=>$request->orgao_id
        ]);
        return redirect('crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = ModelUnidadeOrcamentaria::destroy($id);
        return ($del)?"sim":"não";
    }
}
