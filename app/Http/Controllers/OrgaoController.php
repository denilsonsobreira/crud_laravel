<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrgaoRequest;
use Illuminate\Http\Request;
use App\Models\ModelOrgao;
use App\Models\ModelUnidadeOrcamentaria;

class OrgaoController extends Controller
{
    private $objOrgao;
    public function __construct()
    {
        $this->objOrgao = new ModelOrgao();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uniOrcamentaria = ModelUnidadeOrcamentaria::all();
        $orgao = $this->objOrgao->all();
        return view("index", compact('uniOrcamentaria', 'orgao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createOrgao");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrgaoRequest $request)
    {
        $cad = ModelOrgao::create([
            'descricao'=>$request->descricao,
            'codigo'=>$request->codigo
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
        $orgao = ModelOrgao::find($id);
        return view ('createOrgao',compact('orgao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrgaoRequest $request, $id)
    {
        $this->objOrgao->where(['id'=>$id])->update([
            'descricao'=>$request->descricao,
            'codigo'=>$request->codigo
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
        $del = ModelOrgao::destroy($id);
        return($del)?"sim":"não";
    }
}
