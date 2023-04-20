<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Departments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
class LeadController extends Controller
{
    //

    public function getLeads()
    {
        $leads = Lead::all();
        return view('leads.leads', ['leads'=>$leads]);

    }

    public function create(){
        $departments = Departments::all();
        $users = User::all();
        $clients = Client::all();
        return view('leads.create', ['users' => $users, 'clients' => $clients, 'departments' => $departments]);
    }

    public function edit($id)
    {
        $departments = Departments::all();
        $users = User::all();
        $clients = Client::all();
        $lead = Lead::find($id);
        return view('leads.edit', ['lead'=>$lead, 'users' => $users, 'clients' => $clients, 'departments' => $departments]);
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::find($id);
        $lead-> updated_at = Carbon::now();
        $lead->client_id = $request -> input('client_id');
        $lead->user_id = $request -> input('user_id');
        $lead->department_id = $request -> input('department_id');
        $lead->comment = $request -> input('comment');
        $lead->status = $request -> input('status');
        $lead->save();

        return redirect() -> to(route("leads"));
    }

    public function add(Request $request){
        $leads = new Lead();
        $leads-> created_at = Carbon::now();
        $leads->client_id = $request -> input('client_id');
        $leads->user_id = $request -> input('user_id');
        $leads->department_id = $request -> input('department_id');
        $leads->comment = $request -> input('comment');
        $leads->status = $request -> input('status');
        $leads->save();

        return redirect() -> to(route("leads"));
    }
}
