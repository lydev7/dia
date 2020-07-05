<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Http\Requests\AttributeRequest;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    /**
     * List Attributes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('attribute.index',compact('attributes'));
    }

    /**
     * Create New Attribute
     * @param AttributeRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AttributeRequest $request)
    {
        Attribute::create($request->all(['attribute']));
        session()->flash('success', 'New Attribute Created Successfully');
        return redirect()->route('attribute.index');
    }

    /**
     * Delete Attribute
     * @param Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attribute $attribute)
    {
        if(isset($attribute->signals[0])){
            session()->flash('danger', 'This Attribute is related with message we can Not Deleted');
            return back();
        }
        $attribute->delete();
        session()->flash('success', 'The Attribute is Deleted Successfully');
        return redirect()->route('attribute.index');
    }
}
