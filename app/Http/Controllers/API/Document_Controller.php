<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Children_detail_document;

class Document_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $children_document = Children_detail_document::all();
        return response()->json([
            'children_document' => $children_document
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $children_document = new Children_detail_document();
        $children_document->id_children = $request->input("id_children");
        $currentDoc = $children_document->Document;
        if ($request->Document != $currentDoc) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Document, 0, strpos($request->Document, ';')))[1])[1];
            \Image::make($request->Document)->save(public_path('img/document/') . $name);
            $request->merge(['Document' => $name]);
            $PhotoDoc = public_path('img/document/') . $currentDoc;
            if (file_exists($PhotoDoc)) {
                @unlink($PhotoDoc);
            }
        }
        $children_document->Document = $request->input("Document");
        $children_document->Asli_Fotocopy = $request->input("Asli_Fotocopy");
        $children_document->Keterangan = $request->input("Keterangan");
        $children_document->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $children_document = Children_detail_document::FindOrFail($id);
        $currentDoc = $children_document->Document;
        if ($request->Document != $currentDoc) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Document, 0, strpos($request->Document, ';')))[1])[1];
            \Image::make($request->Document)->save(public_path('img/document/') . $name);
            $request->merge(['Document' => $name]);
            $PhotoDoc = public_path('img/document/') . $currentDoc;
            if (file_exists($PhotoDoc)) {
                @unlink($PhotoDoc);
            }
        }
        $children_document->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children_document = Children_detail_document::FindOrFail($id);
        $children_document->forceDelete();
    }
}
