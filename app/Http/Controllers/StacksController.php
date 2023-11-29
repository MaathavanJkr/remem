<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stack;

class StacksController extends Controller
{
    public function index()
    {
        $stacks = auth()->user()->stacks();
        return view('dashboard', compact('stacks'));
    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$stack = new Stack();
    	$stack->description = $request->description;
    	$stack->user_id = auth()->user()->id;
    	$stack->save();
    	return redirect('/dashboard'); 
    }

    public function edit(Stack $stack)
    {

    	if (auth()->user()->id == $stack->user_id)
        {            
                return view('edit', compact('stack'));
        }           
        else {
             return redirect('/dashboard');
         }            	
    }

    public function update(Request $request, Stack $stack)
    {
    	if(isset($_POST['delete'])) {
    		$stack->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$stack->description = $request->description;
	    	$stack->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
}
