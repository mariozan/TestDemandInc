<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $filter = strtoupper(request('filter'));
        $sort = strtoupper(request('sort'));

        $blogs = Blog::select('blog.*', 'users.username')->join('users', 'users.id', 'blog.user_id');

        if($filter){
            $blogs = $blogs->whereRaw("UPPER(title) like '%{$filter}%'");
        }

        if($sort){
            $blogs = $blogs->orderBy('title', $sort);
        }

        $blogs = $blogs->paginate(10)->setPath('blog');

        return $blogs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'file',
            'text' => 'required',
        ]
        );

        $blog = new Blog;


        if($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/blogs'), $file);
            $blog->image    = 'images/blogs/'.$file;
        }

        $blog->title     = $request->get('title');
        $blog->user_id     = $request->get('user_id');
        $blog->text    = $request->get('text');

        $blog->save();
        // if($blog->save()) {
            // return redirect('company')->with('status', 'Empresa <strong>'.$blog->name .'</strong> Adicionado con Exito!');
        // }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
