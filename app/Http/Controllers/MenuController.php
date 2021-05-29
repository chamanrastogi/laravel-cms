<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Menu_group;
use App\Menu_type;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Menu::all(); 
        return view('admin.menu.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_group = Menu_group::all();
        $menu_group= array('' => 'Select Menu Group') + $menu_group->pluck('title', 'id')->toArray();
        $menu_type = Menu_type::all();
        $menu_type= array('' => 'Select Menu Type') + $menu_type->pluck('title', 'id')->toArray();
        return view('admin.menu.create',['mgroup'=>$menu_group,'mtype'=>$menu_type]);
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
            'title'=>'required|min:4|max:20|unique:menus',
            'url'=>'required|min:4|max:20|unique:menus',
            'menu_type'=>'required',
            'menu_group'=>'required'
             ]);
             $data=new Menu();  
             $data->parent_id=0;           
             $data->title=$r->title; 
             $data->url=$r->url; 
             $data->class=$r->menu_type; 
             $data->group_id=$r->menu_group; 
             $data->position=$r->position;
             $data->status=0; 
             $pp=$data->save();
     if($pp)
     {
         $r->session()->flash('type',"success");
         $r->session()->flash('msg',"Menu with title:".$r->title);
         return redirect()->route('menu.index');
     }else
     {
         $r->session()->flash('type',"danger");
         $r->session()->flash('msg',"Error in Adding");  
         return redirect()->route('menu.create');
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
