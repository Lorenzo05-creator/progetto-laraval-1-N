<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['user', 'category'])
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','min:3','max:255'],
            'content' => ['required','min:10'],
            'category_id' => ['required','exists:categories,id'],
        ]);

        $validated['user_id'] = auth()->id();

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Articolo pubblicato con successo!');
    }

    public function edit(Article $article)
    {
        abort_if(auth()->id() !== $article->user_id, 403);

        $categories = Category::orderBy('name')->get();

        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        abort_if(auth()->id() !== $article->user_id, 403);

        $validated = $request->validate([
            'title' => ['required','min:3','max:255'],
            'content' => ['required','min:10'],
            'category_id' => ['required','exists:categories,id'],
        ]);

        $article->update($validated);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Articolo aggiornato!');
    }

    public function destroy(Article $article)
    {
        abort_if(auth()->id() !== $article->user_id, 403);

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Articolo eliminato.');
    }

    public function byCategory(Category $category)
{
    $articles = Article::with(['user', 'category'])
        ->where('category_id', $category->id)
        ->latest()
        ->get();

    return view('articles.index', compact('articles', 'category'));
}
}