<?php
 
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
//use App\Models\Orders;
use Illuminate\Http\RedirectResponse;
use Exception;
 
class OrdersController extends Controller
{
    public static $orders = [
        ["id"=>"1", "date"=>"TV", "total"=>"1000"],
        ["id"=>"2", "date"=>"iPhone", "total"=>"2000"],
        ["id"=>"3", "date"=>"Chromecast", "total"=>"3000"],
        ["id"=>"4", "date"=>"Glasses", "total"=>"4000"]
    ];


    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Orders - Online Store";
        $viewData["subtitle"] =  "List of orders";
        $viewData["orders"] = OrdersController::$orders;
        return view('orders.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View | RedirectResponse
    {
        /*
        $viewData = [];
        $product = ProductController::$products[$id-1];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
        */

        try{
            $order = OrdersController::$orders[$id-1];
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
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create order";

        return view('orders.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "id" => "required",
            "date" => ["required", "numeric", "gt:0"],
            "total" => ["required", "numeric", "gt:0"]
        ]);
        dd($request->all());
        //here will be the code to call the model and save it to the database
        //$viewData = []; //to be sent to the view
        //$viewData["title"] = "Order created";
        //$viewData["description"] = "Order created";
        //Orders::create($request->only(["id","date","total"]));
        //return view('orders.save')->with("viewData", $viewData);

        //return back();
    }
}