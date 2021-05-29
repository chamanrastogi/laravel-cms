<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module=Module::all();  
        $user = Auth::user();       
        $this->authorize('viewany',$user);
        return view('admin.module.index',['data'=>$module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.module.create');
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
            'name'=>'required|min:3|max:255',           
            'image'=>'mimes:jpeg,gif,png'            
             ]);
          
        if($file=$r->file('image'))
        {
    $image=$r->file('image');
    $ext=$image->extension();
    $file=time().'.'.$ext;     
    $image->storeAs('module',$file);
      }
       //$us=Auth::user();
        $data=new Module();   
        $data->name=$r->name;     
        $data->heading=$r->heading;
        $data->link=$r->link;  
        $data->text=$r->text; 
        $data->image=$file;      
        $data->ftext=$r->ftext;       
        $pp=$data->save();
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Module with Name:".$r->name);
    return redirect()->route('module.index');
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Adding");  
    return redirect()->route('module.create');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
        $user = Auth::user();
        $this->authorize('viewany',$user);
        return view('admin.module.edit',['data'=>$module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Module $module)
    {
        $data=Module::find($module)->first();  
       
        $inputs=$r->validate([
            'name'=>'required|min:3|max:255',           
            'image'=>'mimes:jpeg,gif,png'
             ]);
             
        if($file=$r->file('image'))
        {
          
    Storage::delete($data->folder.'/'.$data->image); 
    $image=$r->file('image');
    $ext=$image->extension();
    $file=time().'.'.$ext;       
    $inputs['image']=$image->storeAs('module',$file);
    $data->image=$file;  
      }
      if(isset($r->check_image))
      {       
        Storage::delete($data->folder.'/'.$data->image);
        $data->image='';  
      }
      $data->name=$r->name;     
      $data->heading=$r->heading; 
      $data->link=$r->link; 
      $data->text=$r->text;           
      $data->ftext=$r->ftext;   
         
        $pp=$data->save();       
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Module id: ".$data->id." Successfully Updated");
    return redirect()->route('module.edit',$data->id);
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating Module");  
    return redirect()->route('module.edit',$id);
}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
        $data= Module::find($module)->first();
        $this->authorize('delete',$data);
        $pp=$data->delete();
        if($pp)
{
    session()->flash('type',"danger");
    session()->flash('msg',"Module id: ".$data->id."  Deleted Successfully");
    return redirect()->route('module.index');
}else
{
    session()->flash('type',"warning");
    session()->flash('msg',"Error in Deleting Module Id:".$data->id);  
   return redirect()->route('module.index');
}
    }
}
