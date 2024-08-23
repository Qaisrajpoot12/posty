<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post  =   auth()->user()->posts()->orderby('created_at', 'desc')->get();


        return view('user.post.dashboard', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('user.post.post_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            $post = Posts::create([
                'title' => $request->title,
                'content' => $request->content,
                'author_id' => $user->id,
            ]);





            if ($request->hasFile('image')) {


                // Store the new file
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('post_images'), $filename);
                $post->update(['image' => $filename]);
            }
            if ($post) {


                //// on post creation  send a realtime message
                $message ='A New post has been Added !';

              event(new PostCreated($post,$message));


                return redirect()->route('posts.index')->with('success', 'Post created successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to create post');
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post  =   Posts::where('id', $id)->first();
        $post->load('user');

        return view('user.post.post_view', compact('post'));
    }

    public function blogDetail(string $id)
    {
        $post  =   Posts::where('id', $id)->first();
        $post->load('user');

        return view('client.blogdetail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $post =  $user->posts()->find($id);



        if ($post) {

            return view('user.post.post_edit', compact('post'));
        } else {
            return  redirect()->back()->with('error', 'Post not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = auth()->user();
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

            $post = $user->posts()->find($id);


            if ($post) {
                $post->update([
                    'title' => $request->title,
                    'content' => $request->content,
                ]);

                if ($request->hasFile('image')) {


                    if ($post->image != null) {
                        unlink(public_path('/post_images/' . $post->image));
                    }

                    // Store the new file
                    $file = $request->file('image');
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    $file->move(public_path('post_images'), $filename);
                    $post->update(['image' => $filename]);
                }
                return redirect()->route('posts.index')->with('success', 'Post Updated successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to Update post');
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $post)
    {


        $user = auth()->user();
        $post =   $user->posts()->find($post);
        if ($post) {
            $post->delete();
            return  redirect()->back()->with('success', 'Post Deleted Sccessfully');
        } else {
            return  redirect()->back()->with('error', 'Post not found');
        }
    }
}
