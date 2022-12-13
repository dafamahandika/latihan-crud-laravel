<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMoney()
    {
        $data = Money::get();
        return view('money.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMoney()
    {
        return view("money.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMoney(Request $request)
    {
        $request->validate([
            'nis' =>'required|numeric|min:8|unique:money,nis',
            'name' => 'required',
            'region' => 'required',
            'class' => 'required',
        ]);
        Money::create([
            'nis'=>$request->nis,
            'name'=>$request->name, 
            'region'=>$request->region, 
            'class'=>$request->class, 
        ]);

        return redirect()->route('indexMoney')
        ->with('success','Berhasil Menambahkan Money Safe'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMoney($id)
    {
        $data = Money::where('id', $id)->first();

        return view('money.edit')
        ->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMoney(Request $request, $id)
    {
        $request->validate([
            'nis' =>'required|min:8',
            'name' =>'required',
            'region' =>'required',
            'class' =>'required',
            'action' =>'required',
            'money' =>'required',
        ]);

        $data = Money::where('id', $id)->first();

        if($request->action == 'add') {
            $total_money = $data['money'] + $request->money;
        } else{   
            if($data['money'] < $request->money && $data['money'] == $request->money){
                return redirect(route('indexMoney'))->with('fail', 'Saldo anda kurang!!');
            } else{
                $total_money = $data['money'] - $request->money;
            }
        }

        $data->update([
            'nis'=> $request->nis, 
            'name'=> $request->name, 
            'region'=> $request->region, 
            'class'=> $request->class, 
            'money'=> $total_money, 
        ]);

        return redirect(route('indexMoney'))
        ->with('edit', 'Berhasil edit data');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMoney($id)
    {
        Money::where('id', $id)->delete();
        return redirect(route('indexMoney'))->with('delete','Berhasil menghapus data');
    }
}
