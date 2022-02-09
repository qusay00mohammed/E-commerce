<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $comments = Comment::paginate(12);
        return view('admin.comments.comments', compact('comments'));
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
        $comment = Comment::findOrfail($id);

        return view('admin.comments.edit_commet', compact('comment'));
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
        $comment = Comment::findOrFail($id);
        $input = $request->all();
        $request->validate([
            'comment' => 'required',
        ]);

        $updateComment = $comment->update($input);
        if ($updateComment) {
            return redirect()->route('comments')->withSuccess('updated successfully');
        }else {
            return redirect()->route('comments')->withError('not updated successfully');
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
        $comment = Comment::findOrFail($id);
        $deleteComment = $comment->delete();

        if ($deleteComment) {
            return redirect()->back()->withSuccess('deleted successfully');
        }else {
            return redirect()->back()->withError('not deleted successfully');
        }
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $status['status'] = 1;

        $approve = $comment->update($status);
        if ($approve) {
            return redirect()->back()->withSuccess('approved successfully');
        }else {
            return redirect()->back()->withError('not approved successfully');
        }
    }

}
