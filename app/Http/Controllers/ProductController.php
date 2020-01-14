<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductAttributes;
use App\Attribute;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.list',compact('products',$products));
     }

    public function create(){
        $attributes  = Attribute::all();
        return view('product.create',compact('attributes',$attributes));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sku' => 'required|string',
            'name' => 'required|string',
            'price' => 'required',
            'description' => 'required',
            // 'options' => 'required',
        ]);
    }
    public function store(Request $request){
        $productData = $request->all();
        $attributeData = $productData['attribute'];
        unset($productData['attribute']);
        $product = Product::create($productData);
        if($product){
            if($attributeData){
                foreach($attributeData as $key=>$attributeId){
                    if($attributeId)
                    ProductAttributes::create([
                                            'product_id'=>$product->id,
                                            'attribute_id'=>$key,
                                            'value' => $attributeId
                                            ]);
                }
            }
        }
        return redirect()->route('product.list', []);
    }
    public function show($id){
        $product = Product::where('id',$id)->first();
        $productAttributes  = ProductAttributes::with(['attribute'])->where('product_id',$id)->get();
        return view('product.show',compact('product','productAttributes'));
    }
}
