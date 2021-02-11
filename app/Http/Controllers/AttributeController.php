<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Attribute;
use DateTime;

class AttributeController extends Controller
{
    public function create()
    {
        return view('attribute.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute_name' => 'required',
            'employee_name' => 'required',
            'employee_phone' => 'required',
            'expired_at' => 'required'
        ]);
        //$attribute = new Attribute();
        $attribute->object_id = $request->object;
        $attribute->attribute_name = $request->attribute_name;
        $attribute->employee_name = $request->employee_phone;
        $attribute->employee_phone = $request->employee_phone;
        $attribute->active = $request->active;
        $date = DateTime::createFromFormat('Y-m-d\TH:i', $request->expired_at);
        $attribute->expired_at = $date->format('Y-m-d H:i:s');

        $attribute->save();

        return redirect()->route('attribute.create')->with('success', 'Attribute inserted succesfully!');
    }
}