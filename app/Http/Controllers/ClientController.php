<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function getClients(){
        $clients = Client::all();

        return  view('contacts.contacts', ['clients'=>$clients]);
    }

    public function create(){

        return  view('contacts.create');
    }

    public function store(Request $request){

        $client = new Client();
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->age = $request->input('age');
        $client->comment = $request->input('comment');
        $client->created_at = Carbon::now();
        $client->save();


        return  redirect()->route('clients');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();

        return  redirect()->route('clients');
    }
    public function edit($id)
    {
        $client = Client::find($id);

        return view('contacts.edit', ['client'=>$client]);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->age = $request->input('age');
        $client->comment = $request->input('comment');
        $client->updated_at = Carbon::now();
        $client->save();

        return  redirect()->route('clients');
    }
}
