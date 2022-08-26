<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('log.acesso');
    }
    
    public function index()
    {
        return view('app.contact.index');
    }

    public function listar(Request $request)
    {
        $contacts = Contact::with(['phones'])->where('name', 'like','%'.$request->input('name').'%')
            ->where('age', 'like', '%'.$request->input('age').'%')
            ->simplePaginate(perPage:4);
        return view('app.contact.listar', ['contacts' => $contacts, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg ='';

        if($request->input('_token') != '' && $request->input('id') == '') {
           $regras = [
               'name'  => 'required|min:3|max:100',
               'age'   => 'required|integer',
               
           ]; 
           
           $feedback = [
               'required'       => 'O campo :attribute deve ser preenchido',
               'name.min'       => 'O campo nome deve ter no mínimo 3 caracteres',
               'name.max'       => 'O campo nome deve ter no máximo 100 caracteres',
               'age.integer'    => 'O campo idade deve ser inteiro.'
           ];

           $request->validate($regras, $feedback);

           $contact = new Contact();
           $contact->create($request->all());

           $msg = 'Cadastro realizado com sucesso';
        }

        if($request->input('_token') != '' && $request->input('id') != '') {
            $contact = Contact::find($request->input('id'));
            $update = $contact->update($request->all());

            if($update) {
                $msg = 'Atualização realizado com sucesso';
            } else {
                $msg = 'Erro ao tentar realizar o registo';
            }

            return redirect()->route('app.contact.editar', ['id' =>$request->input('id'), 'msg' => $msg]);
        }

        return view('app.contact.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $contact = Contact::find($id);

        return view('app.contact.adicionar',['contact' => $contact, 'msg' => $msg]);
    }
    
    public function excluir($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('app.contact');
    }
    
    
}
