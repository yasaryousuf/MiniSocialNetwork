<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use DB;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    
    public function index()
    {
        //$articles = Article::all();
        //$articles = Article::paginate(10);
        //return $articles;
        //$articles = Article::orderBy('created_at', 'desc')->paginate(10);
        $articles = Article::where('live',1)->orderBy('created_at', 'desc')->paginate(10);
        return view('articles.index', compact('articles','username'));

    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = new Article;
        $article->user_id = Auth::user()->id; 
        $article->content = $request->content;
        $article->live = (boolean)$request->live;
        $article->post_on = $request->post_on;
        $article->save();
        return redirect('/articles');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',compact('article'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',compact('article'));    
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (!isset($request->live)) {
            $article->update(array_merge($request->all(), ['live' => false]));

        }
        else{
            $article->update($request->all());
        }
        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');
        //
    }
}
