<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role=Role::all();
        return view('admin.role.index',['data'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $permission= $permissions->pluck('name', 'id')->toArray();
        return view('admin.role.create',['permissions'=>$permission]);
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
            'name'=>'required|min:4|max:20|unique:roles'
             ]);
             $data=new Role();                
             $data->name=$r->name; 
             $data->slug=$r->slug; 
             $pp=$data->save();
     if($pp)
     {
         $r->session()->flash('type',"success");
         $r->session()->flash('msg',"Role with Name:".$r->name);
         return redirect()->route('role.index');
     }else
     {
         $r->session()->flash('type',"danger");
         $r->session()->flash('msg',"Error in Adding");  
         return redirect()->route('role.create');
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
    public function edit(Role $role)
    {
        $perm = Permission::all(); 
        $myper =  $role->permissions->pluck('id')->toArray();
        $permissions=array('' => 'Select Permission') + $perm->pluck('name', 'id')->toArray();   
       
        return view('admin.role.edit',['data'=>$role,'permissions'=>$permissions,'myper'=>$myper]);
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
        $data=Role::find($id); 
        $r->validate([
            'name'=>'required|min:4|max:20|unique:roles,name,'.$id,
             ]);
                  
             $data->name=$r->name; 
             $data->slug=$r->slug; 


             if($r->permissions=='')
             {
                 $y=$data->permissions()->get()->first(); 
                 if($y!=NULL)
                 {
                 $data->permissions()->Detach($y->id);  
                 }
             }else
             {
             $rol=Permission::all();  
            // dd($rol);
           
             $y=$data->permissions()->get()->pluck('id')->toarray();         
            
             foreach($rol as $key=>$role)
             { 
              if((!in_array($role->id,$y)) && (in_array($role->id,$r->permissions))  )
             {
              //  dd($role->name);
              $data->permissions()->attach($role->id); 
             } else if((in_array($role->id,$y)) && (!in_array($role->id,$r->permissions))  )
             {   // dd($role->name);          
                $data->permissions()->Detach($role->id);
             }
         }
             }
             $pp=$data->save();
                   
             if($pp)
             {
                 $r->session()->flash('type',"success");
                 $r->session()->flash('msg',"Role Name: ".$r->name." Successfully Updated");
                 return redirect()->route('role.edit',$id);
             }else
             {
                 $r->session()->flash('type',"danger");
                 $r->session()->flash('msg',"Error in Updating Role");  
                 return redirect()->route('role.edit',$id);
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
        $data= Role::find($id);   
        $name= $data->name;    
        $pp=$data->delete();
        if($pp)
{
    session()->flash('type',"danger");
    session()->flash('msg',"Role Name: ". $name."  Deleted Successfully");
    return redirect()->route('role.index');
}else
{
    session()->flash('type',"warning");
    session()->flash('msg',"Error in Deleting Role Name:". $name);  
   return redirect()->route('role.index');
}
  
    }
}
