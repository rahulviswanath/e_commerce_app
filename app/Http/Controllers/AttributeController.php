<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;

class AttributeController extends Controller
{
    public function index(){
        $attributes = Attribute::all();
        return view('attribute.list',compact('attributes',$attributes));
     }

    public function create(){ 
        return view('attribute.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string',
            'code' => 'required|string',
            'type' => 'required',
            // 'options' => 'required',
        ]);
    }
    public function store(Request $request){
        $data = $request->all();
        Attribute::create($data);
        return redirect()->route('attribute.list', []);
    }
}
