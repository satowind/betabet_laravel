<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Support\Facades\Route;


use Redirect;

use App\User;
use App\Branch;
use App\Units;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    //
    public function g_news(){

        $posts = Post::where('flag','!=','0')
            ->where('status',1)
            ->paginate(3);



        return view('news',compact('posts'));
    }

    public function g_news_single( $id=null ){

        $posts = Post::where('flag','!=','0')
            ->where('id',$id)
            ->where('status',1)
            ->first();

        return view('news_single',compact('posts'));
    }

    public function g_blog( $id=null){

        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }
        $name = Admin::where("user_id",$user->id)
            ->first();

        $posts = Post::where('flag','!=','0')
            ->get();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/blog',compact('posts','name','id','privillage'));
    }

    public function g_addblog(){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }

        $name = Admin::where("user_id",$user->id)
            ->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/addblog', compact("name",'privillage'));
    }

    public function g_editblog($id=null){
        $admin = new Admin;
        $user = Auth::user();
        if(!$user){
            return redirect('admin/login');
        }
        $name = Admin::where("user_id",$user->id)
            ->first();

        $posts = Post::where('flag','!=','0')
            ->where('id', $id)
            ->where('flag','!=','0')
            ->first();

        $privillage = Units::where('id',$name->staff_unit_id)->first();

        return view('admin/editblog', compact("name",'posts','id','privillage'));
    }


    public function p_update_blog(Request $request){

        $id = request()->ids;
        $title = request()->title;
        $tag = request()->tag;
        $status = request()->status;
        $contents = request()->contents;
        $cat = request()->categories;
        $categories = '';

        $i = 0;
        if(!empty($cat)){
            foreach($cat as $ca){
                if($i == 0){
                    $categories = $ca;
                }
                $categories .= ",".$ca;

                $i++;
            }
        }


        if ($request->hasFile('input_img') ) {
        $this->validate($request, [
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('admins/images/posts');
            $image->move($destinationPath, $name);

        }

        $post = Post::where('id' ,$id)->first();

        $post->title = $title;
        $post->tag = $tag;
        $post->status = $status;
        $post->content = $contents;

        if(!empty($name)){
            $post->images = $name;
        }

        if(!empty($categories)){
            $post->post_category = $categories;
        }




        if ($post->save()) {

            Session::flash('success', 'Congrats! blog updated successfully');
            return redirect('/admin/blog');

        }else{

            Session::flash('error', 'Sorry! blog update wasnt successful');
            return redirect('/admin/blog');

        }

    }


    public function  p_delete_blog(){

        $id = request()->id;

        $branch = Post::findOrFail($id);

        $branch->flag = 0;


        if ($branch->save()) {

            Session::flash('delete', 'Congrats! Unit record saved');
            return redirect('/admin/units');

        }else{
            //Session::flash('error', 'Sorry! Unit cant be deleted try again');
            return redirect('/admin/units');

        }



    }

    public function p_add_blog(Request $request){


        $title = request()->title;
        $tag = request()->tag;
        $status = request()->status;
        $contents = request()->contents;
        $cat = request()->categories;
        $categories = '';

        $i = 0;
        if(!empty($cat)){
            foreach($cat as $ca){
                if($i == 0){
                    $categories = $ca;
                }
                $categories .= ",".$ca;

                $i++;
            }
        }


        if ($request->hasFile('input_img') ) {
            $this->validate($request, [
                'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);



            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('admins/images/posts');
            $image->move($destinationPath, $name);

        }

        $post = new Post;

        $post->title = $title;
        $post->tag = $tag;
        $post->status = $status;
        $post->content = $contents;
        $post->flag = 1;

        if(!empty($name)){
            $post->images = $name;
        }

        if(!empty($categories)){
            $post->post_category = $categories;
        }




        if ($post->save()) {

            Session::flash('success', 'Congrats! blog updated successfully');
            return redirect('/admin/blog');

        }else{

            Session::flash('error', 'Sorry! blog update wasnt successful');
            return redirect('/admin/blog');

        }

    }
}
