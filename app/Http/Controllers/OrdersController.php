<?php
 
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Exception;
 
class OrdersController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Orders - TemporalAdventures";
        $viewData["subtitle"] =  "List of orders";
        $viewData["orders"] = Order::all();
        return view('orders.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View | RedirectResponse
    {
        try{
            $order = Order::findOrFail($id);
            $viewData["title"] = $order["id"]." - TemporalAdventures";
            $viewData["subtitle"] =  $order["id"]." - Order total";
            $viewData["orders"] = $order;
            return view('orders.show')->with("viewData", $viewData);
        } catch (Exception $e){
            return redirect('/');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create order - TemporalAdventures";

        return view('orders.create')->with("viewData",$viewData);
    }

    public function save(Request $request) 
    {
        $request->validate([
            "date" => ["required", "date"],
            "total" => ["required", "numeric", "gt:0"]
        ]);

        $viewData = [];
        $viewData["title"] = "Order created";
        $viewData["description"] = "Order created successfully";
        Order::create($request->only(["date","total"]));
        return view('orders.save')->with("viewData", $viewData);
    }

    public function delete(string $id) : RedirectResponse
    {
        try{
            $order = Order::findOrFail($id);
            $order->delete();
        } catch (Exception $e){
            return redirect('/');
        }
        return redirect('/orders');
    }
}