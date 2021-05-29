<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();       
        $this->authorize('viewany',$user);
        $tem = Template::find(1); 
      
        return view('admin.settings',['data'=>$tem]);
    }

    public function update(Request $r)
    {
        $data=Template::find(1)->first();  
        
        $inputs=$r->validate([
            'sitename'=>'required|min:8|max:255' ,           
            'logo'=>'mimes:jpeg,gif,png',
            'logo'=>'mimes:jpeg,gif,png'
             ]);
             
        if($file=$r->file('logo'))
        {
            
    $image=$r->file('logo');
    $ext=$image->extension();
    $file=time().'.'.$ext;       
    $inputs['logo']=$image->storeAs('template',$file);
    $data->logo=$file;  
      }
     
      if($file=$r->file('favicon'))
      {
          
  $image=$r->file('favicon');
  $ext=$image->extension();
  $file=time().'.'.$ext;       
  $inputs['favicon']=$image->storeAs('template',$file);
  $data->favicon=$file;  
    }   
      
        $data->sitename=$r->sitename;           
        $data->meta_key=$r->meta_key;            
        $data->meta_des=$r->meta_des;
        $data->email=$r->email;      
        $pp=$data->save();       
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Settings Successfully Updated");
   return redirect()->route('template.settings');
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating Post");  
    return redirect()->route('template.settings');
}

    }
    
}
