<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social=Social::all();         
        return view('admin.social.index',['data'=>$social]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
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
            'name'=>'required', 
            'f_class'=>'required',
            'url'=>'required'
             ]);
          
        
       //$us=Auth::user();
        $data=new Social();   
           
        $data->name=$r->name; 
        $data->url=$r->url; 
        $data->f_class=$r->f_class;      
        $data->status=0;       
        $pp=$data->save();
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Social with Name:".$r->name);
    return redirect()->route('social.index');
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Adding");  
    return redirect()->route('social.create');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }
    public function statuscheck(Request $r, Social $social,$id)
    {
        //
      
        $gal=Social::where('id',$id)->get()->first();
      // dd($gal->id);
       if($gal->status==1)
{
    $gal->status=0;   
    $gal->save();
    return redirect()->route('social.index');
}else
{
    $gal->status=1;  
    $gal->save();
    return redirect()->route('social.index');
}
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        
        return view('admin.social.edit',['data'=>$social]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Social $social)
    {
        $r->validate([
            'name'=>'required', 
            'f_class'=>'required',
            'url'=>'required'
             ]);
          
        
       //$us=Auth::user();
        $data=Social::find($social)->first();    
           
        $data->name=$r->name; 
        $data->url=$r->url;     
        $data->f_class=$r->f_class;     
        $pp=$data->save();
        if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Social id: ".$id." Successfully Updated");
    return redirect()->route('social.edit',$id);
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating Social");  
    return redirect()->route('social.edit',$id);
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $data=Social::find($social)->first();  
       
        $pp=$data->delete();
        if($pp)
{
    session()->flash('type',"danger");
    session()->flash('msg',"Social id: ".$id."  Deleted Successfully");
    return redirect()->route('social.index');
}else
{
    session()->flash('type',"warning");
    session()->flash('msg',"Error in Deleting Social Id:".$id);  
   return redirect()->route('social.index');
}
    }
    
}
