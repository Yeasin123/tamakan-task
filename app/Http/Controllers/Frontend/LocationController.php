<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Area;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function City(Request $request)
    {
        $city = new City;
        $city->city_name = $request->city_name;
        $city->save();
        return response()->json($city);
    }

    public function getCity()
    {
        $city = City::orderBy('id','desc')->get();
        return response()->json($city);
    }

    public function Area(Request $request)
    {
        $area = new Area();
        $area->area = $request->area;
        $area->city_id = $request->city_id;
        $area->delivery_charge = $request->delivery_charge;
        $area->save();

        $allarea = ["Adabor","Aftabnagar","Agargaon","Aminbazar","Azimpur","Babubazar","Badda","Banani","Banasree","Bangshal","Baridhara","Baridhara J Block","Basundhara RA","Bawnia","Bosila","BSCIC, Narayanganj","Cantonment","Chashara, Narayanganj","Dakshin Khan","Dayaganj","Deobhog Narayanganj","Dhaka University","Dhalpur","Dhanmondi","Dholaipar","DOHS Banani","DOHS Baridhara","DOHS Mirpur","DOHS Mohakhali","Eskaton","Faridabad","Farmgate","Fatullah, Narayanganj","Gabtoli","Gandaria","Gulshan","Indira Road","Jalkury, Narayanganj","Jatrabari","Jurain","Kafrul","Kakrail","Kalabagan","Kallyanpur","Kalshi","Kamrangir Char","Kashipur, Narayanganj","Kathalbagan","Kawla","Kazipara","Khanpur, Narayanganj","Khilgaon","Khilkhet","Kotwali","Kuril","Lalbagh","Lalmatia","Malibagh","Maniknagar","Masdair, Narayanganj","Matikata","Matuail","Merul Badda","Mirpur","Moghbazaar","Mohakhali","Mohammadpur","Motijheel","Mridhabari","Munshiganj","Niketan","Nikunja","Nitaigonj, Narayanganj","Pagla, Narayanganj","Paikpara","Pallabi","Paltan","Panthapath","Pink City","Ramna","Rampura","Rayerbagh","Sadarghat","Sankar","Shahbagh","Shaymoli","Shewrapara","Shiddhirganj, Narayanganj","Shonir akra","Sibu Market, Narayanganj","Sutrapur","Tejgaon","Tongi","Uttar Khan","Uttara","Vatara","Vatulia","Wari"];
        $prices = rand(30,60);

        foreach($allarea as $data){
            $area = new Area();
            $area->city_id=1;
            $area->area = $data;
            $area->delivery_charge = $prices;
            $area->save();
        }
        return response()->json($area);
    }

}
