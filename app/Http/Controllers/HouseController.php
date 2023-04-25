<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HouseController extends Controller
{
   public function getHouses(){
    $houses = House::all();
    return view('houses.houses', ['houses'=>$houses]);
   }
}
