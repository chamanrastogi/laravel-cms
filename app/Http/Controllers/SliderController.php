<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::all();             
       
        return view('admin.slider.index',['data'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //  $this->authorize('store',Post::class);
        $r->validate([
            'name'=>'required|min:8|max:255',                
            'image'=>'required|mimes:jpeg,jpg,gif,png',
             ]);
          
        if($file=$r->file('image'))
        {
    $image=$r->file('image');
    $ext=$image->extension();
    $file=time().'.'.$ext;     
    $image->storeAs('slider',$file);
      }
       //$us=Auth::user();
        $data=new Slider();   
        
        $data->name=$r->name;           
        $data->text=$r->text; 
        $data->image=$file; 
        $data->sort=(Slider::count())+1;   
        $data->status=0;
        $pp=$data->save();
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Slider with Name:".$r->name);
    return redirect()->route('slider.index');
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Adding");  
    return redirect()->route('slider.create');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }
    public function statuscheck(Request $r, Slider $slider,$id)
    {
        //
      
        $gal=Slider::where('id',$id)->get()->first();
      // dd($gal->id);
       if($gal->status==1)
{
    $gal->status=0;   
    $gal->save();
    return redirect()->route('slider.index');
}else
{
    $gal->status=1;  
    $gal->save();
    return redirect()->route('slider.index');
}
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        
        return view('admin.slider.edit',['data'=>$slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Slider $slider)
    {
        $post=Slider::find($slider)->first();  
        
        $inputs=$r->validate([
            'name'=>'required|min:8|max:255',                
            'image'=>'mimes:jpeg,jpg,gif,png',
             ]);
             
        if($file=$r->file('image'))
        {
            Storage::delete($data->folder.'/'.$data->image);     
    $image=$r->file('image');
    $ext=$image->extension();
    $file=time().'.'.$ext;       
    $inputs['image']=$image->storeAs('slider',$file);
    $post->image=$file;  
      }
     
      if(isset($r->check_image))
      {       
        Storage::delete($data->folder.'/'.$data->image); 
        $data->image=''; 
      }     
      
        $post->name=$r->name;           
        $post->text=$r->text;   
        
        $pp=$post->save();       
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Slider id: ".$post->id." Successfully Updated");
    return redirect()->route('slider.edit',$post->id);
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating Post");  
    return redirect()->route('slider.edit',$id);
}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
       
                $data= Slider::find($slider)->first();               
                $pp=$data->delete();
                if($pp)
        {
            session()->flash('type',"danger");
            session()->flash('msg',"Slider id: ".$id."  Deleted Successfully");
            return redirect()->route('slider.index');
        }else
        {
            session()->flash('type',"warning");
            session()->flash('msg',"Error in Deleting Slider Id:".$id);  
           return redirect()->route('slider.index');
        }
            
        
    }
}
