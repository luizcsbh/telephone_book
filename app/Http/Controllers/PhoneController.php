<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('log.acesso');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phones = Phone::with(['contact'])->paginate(10);

        return view('app.phone.index', ['phones' => $phones, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contacts)
    {
        $contacts = Contact::all();
        return view('app.phone.create', ['contacts' => $contacts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $regras = [
            'number'        => 'required|max:14',
            'contact_id'    => 'exists:contacts,id'
        ];

        $feedback = [
            'required'           => 'O campo :attribute deve ser preenchido',
            'number.max'         => 'O campo descrição deve ter no máximo 14 caracteres',
            'contact_id.exists'  => 'O contato informado não existe'

        ];

        $request->validate($regras, $feedback);
       
        Phone::create($request->all());
        
        return redirect()->route('app.phone');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = Phone::find($id);
        return view('app.phone.show',['phone' => $phone]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::all();
        $phone = Phone::find($id);
        return view('app.phone.edit',['phone' => $phone, 'contacts' => $contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        $regras = [
            'number'        => 'required|max:14',
            'contact_id'    => 'exists:contacts,id'
        ];

        $feedback = [
            'required'           => 'O campo :attribute deve ser preenchido',
            'number.max'         => 'O campo descrição deve ter no máximo 14 caracteres',
            'contact_id.exists'  => 'O contato informado não existe'

        ];

        $request->validate($regras, $feedback);

        $phone->update($request->all());
        return redirect()->route('app.phone.show',['phone' => $phone->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        return redirect()->route('app.phone');
    }
}
