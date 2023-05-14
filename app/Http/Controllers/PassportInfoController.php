<?php

namespace App\Http\Controllers;

use App\Models\PassportInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PassportInfoController extends Controller
{
    //




    public function index(){

        $passes=PassportInfo::all();

        return view('admin.passportinfo.index',['passes'=>$passes]);
    }
    public function create(){

        return view('admin.passportinfo.create');
    }

    public function edit(PassportInfo $pass){
        return view('admin.passportinfo.edit',['pass'=>$pass]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'pass_num'=>['required','unique:passport_infos,pass_num'],
            'name'=>['required'],
            'office_name'=>['required'],
            'birthday'=>['required']
        ]);

        PassportInfo::create([
            'pass_num'=>$request['pass_num'],
            'office_name'=>$request['office_name'],
            'state_info'=>$request['state_info'],
            'state'=>$request['state'],
            'birthday'=>$request['birthday'],
            'name'=>$request['name'],
        ]);
        session()->flash('success', 'تم اضافة معلومات الجواز بنجاح!!');

        return redirect()->route('admin.pass.create');

    }
    public function update(Request $request,PassportInfo $pass){


        if($request['pass_num']!=$pass->pass_num)
        $this->validate($request,[
            'pass_num'=>['required','unique:passport_infos,pass_num'],
            'name'=>['required'],
            'office_name'=>['required'],
            'birthday'=>['required']
        ]);
        else
        $this->validate($request,[
            'name'=>['required'],
            'office_name'=>['required'],
            'birthday'=>['required']
        ]);

        $pass->update([
            'pass_num'=>$request['pass_num'],
            'office_name'=>$request['office_name'],
            'state_info'=>$request['state_info'],
            'state'=>$request['state'],
            'birthday'=>$request['birthday'],
            'name'=>$request['name'],
        ]);
        session()->flash('success', 'تم نعديل معلومات الجواز بنجاح!!');

        return redirect()->route('admin.pass');

    }

    public function search(Request $requset){

        $res=PassportInfo::where('pass_num','=',$requset['pass_num'])
        ->first();


        $resultt=View::make('result',['pass'=>$res,'pass_num'=>$requset['pass_num']]);

        return $data=[
            'resulteView'=>"".$resultt."",
        'state'=>$res!=null,
        'pass_num'=>$requset['pass_num']
    ];

        return  response(['res'=>view('result',['pass'=>$res]) ],200);

    }

}
