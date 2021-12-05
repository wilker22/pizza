<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->category);
        if(!$request->category){
            $pizzas =  Pizza::latest()->get();
            return view('frontpage', compact('pizzas'));
        }
        $pizzas = Pizza::where('category', $request->category)->get();

        return view('frontpage', compact('pizzas'));
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);
       
        return view('show', compact('pizza'));
    }
    
    public function store(Request $request)
    {
        if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0){
            return back()->with('errormessage', 'Por favor escolha o(s) tamanho(s) de pizza(s) e indique a quantidade!');
        }
        if($request->small_pizza < 0 || $request->medium_pizza == 0 || $request->large_pizza == 0){
            return back()->with('errormessage', 'A quantidade não pode ser menor que ZERO!');
        }
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        // dd($data);
        Order::create($data);

        return back()->with('message', 'Compra realizada com sucesso!');
    }
}
