<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    //
    public function index(){
        $productModel = new ProductModel();
        $data['productList'] = $productModel->all();
        return view ('pages.formview',$data);
    }

    public function register_product(){
        return view ('pages.formregister');
    }

    public function edit_product_view($id){
        //$productModel = new ProductModel();
        //$data_to_be_updated = $productModel->where('id',$id)->first();
        $data_to_be_updated = ProductModel::where('id',$id)->first();
        return view('pages.formedit',$data_to_be_updated);

    }

    public function update_product(Request $request, $id){

        $validator=$this->setValidationFields($request);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data_to_be_updated = array(
            'title' =>$request->FormControlInputTitle,
            'description' =>$request->FormControlInputDescription,
            'quantity' => $request->FormControlInputQuantity,
            'price' =>$request->FormControlInputPrice
        );
        ProductModel::find($id)->update($data_to_be_updated);
        return redirect('/')->with('success','Product updated successful');


    }

    private function setValidationFields(Request $request){
        $validator = Validator::make($request->all(), [
            'FormControlInputTitle' => 'required|min:3|max:255',
            'FormControlInputDescription' => 'required',
            'FormControlInputQuantity' => 'required|integer',
            'FormControlInputPrice' => 'required|numeric'
        ]);
        $atributeNames=array(
            'FormControlInputTitle'=>'Title',
            'FormControlInputDescription' => 'Description',
            'FormControlInputQuantity' => 'Quantity',
            'FormControlInputPrice' => 'Price'
        );

        $validator->setAttributeNames($atributeNames);

        return $validator;

    }

    public function store_product(Request $request){

        $validator=$this->setValidationFields($request);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $productModel = new ProductModel();
        $productModel->title = $request->FormControlInputTitle;
        $productModel->description = $request->FormControlInputDescription;
        $productModel->quantity = $request->FormControlInputQuantity;
        $productModel->price = $request->FormControlInputPrice;
        $productModel->save();
        return redirect('/')->with('success','Product registered successful');

    }
    public function delete_product($id){
        $productModel = new ProductModel();
        $productModel->find($id)->delete();
        return redirect('/')->with('success','Product removed successful.');
    }

    public function searchQueryHeader(Request $resquest){
        $searchQuery = $resquest->SearchQuery;
        $data['productList'] = ProductModel::where('title','like','%' . $searchQuery . '%')->get();
        return view('pages.formview',$data);
    }

    public function sortingProduct(){
        $data['productList'] = ProductModel::orderBy('title','asc')->get();
        return view('pages.formview',$data);
    }


}
