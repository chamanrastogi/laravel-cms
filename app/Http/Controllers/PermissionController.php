<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role=Permission::all();
        return view('admin.permission.index',['data'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'name'=>'required|min:4|max:20|unique:permissions'
             ]);
             $data=new Permission();   
             
             $data->name=$r->name; 
             $data->slug=$r->slug; 
             $pp=$data->save();
     if($pp)
     {
         $r->session()->flash('type',"success");
         $r->session()->flash('msg',"Permission with Name:".$r->name);
         return redirect()->route('permission.index');
     }else
     {
         $r->session()->flash('type',"danger");
         $r->session()->flash('msg',"Error in Adding");  
         return redirect()->route('permission.create');
     }
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
    public function edit(Permission $permission)
    {
       
        return view('admin.permission.edit',['data'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $data=Permission::find($id); 
        $r->validate([
            'name'=>'required|min:4|max:20|unique:roles,name,'.$id,
             ]);
                  
             $data->name=$r->name; 
             $data->slug=$r->slug;

             $pp=$data->save();
                   
             if($pp)
             {
                 $r->session()->flash('type',"success");
                 $r->session()->flash('msg',"Permission Name: ".$r->name." Successfully Updated");
                 return redirect()->route('permission.edit',$id);
             }else
             {
                 $r->session()->flash('type',"danger");
                 $r->session()->flash('msg',"Error in Updating Role");  
                 return redirect()->route('permission.edit',$id);
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data= Permission::find($id);   
        $name= $data->name;    
        $pp=$data->delete();
        if($pp)
{
    session()->flash('type',"danger");
    session()->flash('msg',"Permission Name: ". $name."  Deleted Successfully");
    return redirect()->route('permission.index');
}else
{
    session()->flash('type',"warning");
    session()->flash('msg',"Error in Deleting Permission Name:". $name);  
   return redirect()->route('permission.index');
}
  
    }
}
