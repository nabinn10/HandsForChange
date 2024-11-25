<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view ('request.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'request_type' => 'required',
            'description' => 'required',
            'document' => 'required|image',

        ]);

        dd($data);

    //    store this photo in images/request folder
     // Handle file upload
     if ($request->hasFile('document')) {
        $photo = $request->file('document');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/document/'), $photoname);
        $data['document'] = $photoname;
    }

        // create
        Request::create($data);
        return redirect()->route('welcome');


    }

    /**
     * Display the specified resource.
     */
    public function show(request $request)
    public function show(RequestModel $request)
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request)
    public function edit(RequestModel $request)
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, request $request)
    public function update(Request $request, RequestModel $requestModel)
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    public function destroy(RequestModel $request)
        //
    }
}
