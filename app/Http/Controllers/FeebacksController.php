<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Http\Request;

class FeebacksController extends Controller
{
    public function create(Request $request)
    {
        $order_id = $request->order_id;


        return view('feedbacks.index', compact('order_id'));
    }

    public function store(Request $request)
    {
        Feedbacks::create(
            [
                'message' => $request->message,
                'order_id' => $request->order_id,
                'user_id' => auth()->user()->id,
            ]


        );
        $request->session()->flash('flash_message', 'Profile was successfully updated.');
        return redirect()->route('products.index');  
    }
}
