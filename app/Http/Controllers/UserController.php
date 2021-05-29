<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Role;
class UserController extends Controller
{
    //
    public function index()
    {
        $user=User::all();
        return view('admin.users.index',['user'=>$user]);
    }
    public function show(User $user){
        $roleall = Role::all(); 
        $myroles =  $user->roles->pluck('id')->toArray();
        $roles=array('' => 'Select Roles') + $roleall->pluck('name', 'id')->toArray();        
         return view('admin.users.profile',['user'=>$user,'roles'=>$roles,'myrole'=>$myroles]);
     }
     
    public function create()
     {
         $roleall = Role::all();
         $roles= $roleall->pluck('name', 'id')->toArray();
        return view('admin.users.create',['roles'=>$roles]);
     }
     public function update(Request $r, $id)
     {
      $r->validate([
         'username'=>'required|min:8|max:255', 
         'name'=>'required|min:8|max:255', 
         'email'=>'required|max:255|email', 
         'avatar'=>'mimes:jpeg,gif,png'            
               
          ]);
      $user=User::findOrFail($id); 
  
         // dd( $r->file('avatar'));
         //dd($r->post('roles'));
         
        
          if($file=$r->file('avatar'))
          {  

      $image=$r->file('avatar');
      $ext=$image->extension();     
      $file=time().'.'.$ext;       
      $image->storeAs('public/user',$file);
      $user->avatar=$file;  
        }
       
        $user->username=$r->username;           
        $user->name=$r->name;   
        $user->email=$r->email; 
        $user->password=$r->password; 
        
        if($r->roles=='')
        {
            $y=$user->roles()->get()->first(); 
            //dd($y->id);
            $user->roles()->Detach($y->id);  
        }else
        {
        $rol=Role::all();  
        //dd($rol);
      
        $y=$user->roles()->get()->pluck('id')->toarray();         
       
        foreach($rol as $key=>$role)
        { 
         if((!in_array($role->id,$y)) && (in_array($role->id,$r->roles))  )
        {
         //  dd($role->name);
          $user->roles()->attach($role->id); 
        } else if((in_array($role->id,$y)) && (!in_array($role->id,$r->roles))  )
        {   // dd($role->name);          
           $user->roles()->Detach($role->id);
        }
    }
        }
       
      
       $pp=$user->save();       
if($pp)
{
    $r->session()->flash('type',"success");
    $r->session()->flash('msg',"Profile Successfully Updated");
    return redirect()->route('user.profile.show',$id);
}else
{
    $r->session()->flash('type',"danger");
    $r->session()->flash('msg',"Error in Updating User");  
    return redirect()->route('user.profile.show',$id);
}
     }
     public function destory(User $user)
    {
           //
         
           $pp=$user->delete();
           if($pp)
   {
       session()->flash('type',"danger");
       session()->flash('msg',"User id: ".$user->id."  Deleted Successfully");
       return redirect()->route('user.index');
   }else
   {
       session()->flash('type',"warning");
       session()->flash('msg',"Error in Deleting User Id:".$user->id);  
      return redirect()->route('user.index');
   }
       
    }
     
}
