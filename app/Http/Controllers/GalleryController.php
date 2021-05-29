<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Gallery::all();
        return view('admin.gallery.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'image'=>'required|mimes:jpeg,jpg,gif,png',
             ]);
          
        if($file=$r->file('image'))
        {
    $image=$r->file('image');
    $ext=$image->extension();
    $file=time().'.'.$ext;     
    $image->storeAs('gallery',$file);
      }
       //$us=Auth::user();
        $data=new Gallery();   
        
        $data->name=$r->name;
        $data->image=$file;        
        $data->status=0;
        $pp=$data->save();
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Gallery with Name:".$r->name);
    return redirect()->route('gallery.index');
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Adding");  
    return redirect()->route('gallery.create');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }
    public function statuscheck(Request $r, Gallery $gallery,$id)
    {
        //
      
        $gal=Gallery::where('id',$id)->get()->first();
      // dd($gal->id);
       if($gal->status==1)
{
    $gal->status=0;   
    $gal->save();
    return redirect()->route('gallery.index');
}else
{
    $gal->status=1;  
    $gal->save();
    return redirect()->route('gallery.index');
}
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit',['data'=>$gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Gallery $gallery)
    {
        $post=Gallery::find($gallery)->first();  
        
        $inputs=$r->validate([
            'name'=>'required|min:8|max:255',                
            'image'=>'mimes:jpeg,jpg,gif,png',
             ]);
             
        if($file=$r->file('image'))
        {
            
    $image=$r->file('image');
    $ext=$image->extension();
    $file=time().'.'.$ext;       
    $inputs['image']=$image->storeAs('gallery',$file);
    $post->image=$file;  
      }
     
             
      
        $post->name=$r->name;  
        
        $pp=$post->save();       
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Gallery id: ".$post->id." Successfully Updated");
    return redirect()->route('gallery.edit',$post->id);
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating Post");  
    return redirect()->route('gallery.edit',$id);
}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        
        $data= Gallery::find($gallery)->first();               
        $pp=$data->delete();
        if($pp)
{
    session()->flash('type',"danger");
    session()->flash('msg',"Gallery id: ".$id."  Deleted Successfully");
    return redirect()->route('gallery.index');
}else
{
    session()->flash('type',"warning");
    session()->flash('msg',"Error in Deleting Gallery Id:".$id);  
   return redirect()->route('gallery.index');
}
    }
   
}
