<?php
namespace App\Http\Service\Menu;
use Illuminate\Support\Str;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class MenuService{


    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function getAll(){
        return Menu::orderby('id','asc')->paginate(20);
    }

    public function create($request){
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content')
            ]);
            Session::flash('success','Create Category Success');
        } catch (\Exception $err){
            Session::flash('error','error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function destroy($request){
        $id =(int) $request->input('id');
        $menu = Menu::where('id',$id)->first();
        if ($menu){
            return Menu::where('id',$id) ->orWhere('parent_id',$id)->delete();
        }
        return false;
    }

    public function update($request, $menu){
        if ($request->input('parent_id')!== $menu->id){
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->name=(string) $request->input('name');
        $menu->parent_id=(int) $request->input('parent_id');
        $menu->description=(string) $request->input('description');
        $menu->content=(string) $request->input('content');
        $menu->save();

        Session::flash('Success','Update Success');
        return true;
    }
}