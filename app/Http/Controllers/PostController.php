<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::search($request->search)
                ->paginate(12)
                ->withQueryString();
            $posts->load('creator', 'tags');
        } else {
            $posts = Post::with('creator', 'tags')
                ->orderBy('id', 'DESC')
                ->paginate(12)
                ->withQueryString();
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * View user own posts
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOwn(Request $request)
    {
        if ($request->search) {
            $posts = Post::search($request->search)
                ->where('creator_id', auth()->user()->getKey())
                ->paginate(12)
                ->withQueryString();
        } else {
            $posts = Post::where('creator_id', auth()->user()->getKey())
                ->orderBy('id', 'desc')
                ->paginate(12);
        }

        return view('posts.own', compact('posts'));
    }

    /**
     * View user own dashboard of posts
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOwnDashboard()
    {
        return view('posts.own-dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreate()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreatePostRequest $request)
    {

        try {
            DB::beginTransaction();

            $imagePath = $request->file('representative_image')->store('public/post-images');
            $post = Post::create(array_merge(
                $request->only(['title', 'description', 'content']),
                ['representative_image_path' => $imagePath]
            ));

            // Tag relationship
            $tagNames = collect(explode(',', $request->tag_names))
                ->map(function ($tagName) {
                    return trim($tagName, ' ,');
                })
                ->filter(function ($tagName) {
                    return !empty($tagName);
                });
            $post->tags()->attach(Tag::firstOrCreateMany($tagNames));

            DB::commit();
        } catch (\Throwable $th) {
            Storage::delete($imagePath);
            DB::rollback();
            throw $th;
        }

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Display form to edit post.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewUpdate(Post $post)
    {
        return view('posts.update', compact('post'));
    }

    /**
     * Handle update post.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['title', 'description', 'content']);
            if ($request->hasFile('representative_image')) {
                $imagePath = $post->representative_image_path;
                $data['representative_image_path'] = $request->file('representative_image')->store('public/post-images');
            }

            $post->update($data);

            // Tag relationship
            $tagNames = collect(explode(',', $request->tag_names))
                ->map(function ($tagName) {
                    return trim($tagName, ' ,');
                })
                ->filter(function ($tagName) {
                    return !empty($tagName);
                });
            $post->tags()->sync(Tag::firstOrCreateMany($tagNames));

            Storage::delete($imagePath ?? null);
            DB::commit();
        } catch (\Throwable $th) {
            Storage::delete($data['representative_image_path'] ?? null);
            DB::rollback();
            throw $th;
        }

        return redirect()->back()->with('successUpdate', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
