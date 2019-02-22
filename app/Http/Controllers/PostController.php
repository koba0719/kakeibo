<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\BudgetCategory;
use App\Capital;

class PostController extends Controller
{

    /**
     * Constructor
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('post_date', 'desc')->get();
        $category = BudgetCategory::orderBy('category_id', 'asc')->get();
        $capital = Capital::all();

        $incomePosts = Post::where('capital_id', 2)->get();
        $spedingPosts = Post::where('capital_id', 1)->get();

        $addIncome = 0;
        foreach ($incomePosts as $incomePost) {
            $addIncome += $incomePost->price;
        }

        $addSpeding = 0;
        foreach ($spedingPosts as $spedingPost) {
            $addSpeding += $spedingPost->price;
        }

        \Debugbar::info($incomePosts);
        \Debugbar::info($spedingPosts);

        return view('posts.index', [
            'posts' => $posts, 
            'categories' => $category, 
            'capitals' => $capital, 
            'addIncome' => $addIncome, 
            'addSpeding' => $addSpeding,
        ]);
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
        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->capital_id = $request->capital;
        $post->post_date = $request->post_date;
        $post->price = $request->price;
        $post->category_id = $request->category_id;
        $post->memo = $request->memo;
        $post->store = $request->store;
        $post->save();

        $posts = Post::orderBy('post_date', 'desc')->get();
        $category = BudgetCategory::orderBy('category_id', 'asc')->get();
        $capital = Capital::all();

        $incomePosts = Post::where('capital_id', 2)->get();
        $spedingPosts = Post::where('capital_id', 1)->get();

        \Debugbar::info($incomePosts);
        \Debugbar::info($spedingPosts);

        $addIncome = 0;
        foreach ($incomePosts as $incomePost) {
            $addIncome += $incomePost->price;
        }

        $addSpeding = 0;
        foreach ($spedingPosts as $spedingPost) {
            $addSpeding += $spedingPost->price;
        }

        return view('posts.index', [
            'posts' => $posts, 
            'categories' => $category, 
            'capitals' => $capital, 
            'addIncome' => $addIncome, 
            'addSpeding' => $addSpeding,
        ]);
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
