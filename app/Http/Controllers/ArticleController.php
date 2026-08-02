<?php



namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
 public function index()
{
    $articles = Article::with('tags')->get(); 
    return view('articles.index', compact('articles'));
}

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $article = Article::create($request->only('title','content'));
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articles.edit', compact('article','tags'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->only('title','content'));
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.show', $article);
    }

    public function destroy(Article $article)
{
    
    $article->tags()->detach();

    
    $article->delete();

    return redirect()
        ->route('articles.index')
        ->with('success', 'Articolo eliminato con successo');
}

}

