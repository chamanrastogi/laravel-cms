<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Testimonial::all();         
        return view('admin.testimonial.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name'=>'required|min:8|max:255', 
            'text'=>'required'
             ]);
          
        
       //$us=Auth::user();
        $data=new Testimonial();   
           
        $data->name=$r->name; 
        $data->text=$r->text;      
        $data->status=0;       
        $pp=$data->save();
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Testimonail with Name:".$r->name);
    return redirect()->route('testimonial.index');
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Adding");  
    return redirect()->route('testimonial.create');
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',['data'=>$testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Testimonial $testimonial)
    {
        $r->validate([
            'name'=>'required|min:8|max:255', 
            'text'=>'required'
             ]);
          
        
       //$us=Auth::user();
        $data=Testimonial::find($testimonial)->first();    
           
        $data->name=$r->name; 
        $data->text=$r->text; 
        $pp=$data->save();
        if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Testimonial id: ".$id." Successfully Updated");
    return redirect()->route('testimonial.edit',$id);
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating Testimonial");  
    return redirect()->route('testimonial.edit',$id);
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $data=Testimonial::find($testimonial)->first(); 
       
        $pp=$data->delete();
        if($pp)
{
    session()->flash('type',"danger");
    session()->flash('msg',"Testimonial id: ".$id."  Deleted Successfully");
    return redirect()->route('testimonial.index');
}else
{
    session()->flash('type',"warning");
    session()->flash('msg',"Error in Deleting Testimonial Id:".$id);  
   return redirect()->route('testimonial.index');
}
    
    }
}
