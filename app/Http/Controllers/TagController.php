<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        Tag::create($request->only('name'));
        return redirect()->route('articles.index');
    }
    public function show(Tag $tag)
    {
        $articles = $tag->articles; 
        return view('tags.show', [
        'tag' => $tag,
        'articles' => $tag->articles
    ]);
    }};
   


