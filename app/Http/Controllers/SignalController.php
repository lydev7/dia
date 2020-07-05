<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Message;
use Illuminate\Http\Request;

class SignalController extends Controller
{

    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->limit(100)->get();
        $attributes = Attribute::all();
        return view('signal.signal', compact('messages', 'attributes'));
    }

    public function store(Request $request)
    {
        $valid = $this->validateRequest($request);
        if(!$valid){
            session()->flash('danger', 'an Error is Generated Try again Please');
            return back();
        }
        $message = Message::create();
        foreach ($request->values as $key => $value) {
            $message->signals()->create([
                'attribute_id' => $request->input('attributes')[$key],
                'value' => $value
            ]);
        }
        session()->flash('success', 'Signal Created Successfully');
        return redirect()->route('message.index');
    }

    private function validateRequest(Request $request)
    {
        foreach ($request->values as $key => $value) {
            if(!isset($request->input('attributes')[$key])){
                return false;
            }
        }
        return true;
    }

    public function edit(Message $message)
    {
        $attributes = Attribute::all();
        return view('signal.edit',compact('message','attributes'));
    }

    public function update(Request $request, Message $message)
    {
        $valid = $this->validateRequest($request);
        if(!$valid){
            session()->flash('danger', 'an Error is Generated Try again Please');
            return back();
        }
        $new_message = Message::create([
            'message_id' => $message->id
        ]);
        foreach ($request->values as $key => $value) {
            $new_message->signals()->create([
                'attribute_id' => $request->input('attributes')[$key],
                'value' => $value
            ]);
        }
        session()->flash('success', 'Signal Created Successfully');
        return redirect()->route('message.index');
    }

    public function destroy(Message $message)
    {
        if(isset($message->responses[0])) {
            session()->flash('danger','This Signal has response we can Not Deleted');
        }

        else{
            foreach ($message->signals as $signal) {
                $signal->delete();
            }
            $message->delete();
            session()->flash('success','Signal Deleted Successfully');
        }

        return redirect()->route('message.index');
    }

}
