<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Response::paginate(3)->setPath('answer');
        return $answers;
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
            'image' => 'file',
            'text' => 'required',
        ]
        );

        $answer = new Response();

        if($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/answers'), $file);
            $answer->image    = 'images/answers/'.$file;
        }

        $answer->blog_id     = $request->get('blog_id');
        $answer->user_id     = $request->get('user_id');
        $answer->text    = $request->get('text');

        $answer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answers = Response::select('response.*', 'bu.username as blog_owner', 'au.username as replied_by')
            ->join('blog', 'response.blog_id', 'blog.id')
            ->join('users as bu', 'bu.id', 'blog.user_id')
            ->join('users as au', 'au.id', 'response.user_id')
            ->where('blog_id', $id)
            ->paginate(3)->setPath('blog');
        return $answers;        
    }

    public function newAnswer($blogId){
        return view('answer.create')->with('blogId', $blogId);
    }

    public function showAnswer($blogId){
        return view('answer.get')->with('blogId', $blogId);
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
