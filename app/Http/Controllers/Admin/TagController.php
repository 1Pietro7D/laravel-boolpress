<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:30'
        ]);

        $form_data = $request->all();
        $tag= new Tag();
        $tag->fill($form_data);

        $slug = $this->getSlug($tag->name);
        $tag->slug = $slug;
        $tag->save();

        return redirect()->route('admin.tags.show', $tag->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $tag = Tag::where('slug', $slug)->first();
        return view('admin.tags.show', compact('tag'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $tag = Tag::where('slug', $slug)->first();
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $request->validate([
            'name' => 'required|max:30'
        ]);
        $form_data = $request->all();
        //qui aggiorniamo lo slug se il nome è diverso
        if($tag->name != $form_data['name']){
            $slug = $this->getSlug($form_data['name']);
            $form_data['slug'] = $slug;
        }

        $tag->update($form_data);

        return redirect()->route('admin.tags.show', $tag->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->posts()->sync([]);
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
    private function getSlug($name)
    {
        $slug = Str::slug($name);
        $slug_base = $slug;

        $existingCategory = Tag::where('slug', $slug)->first();
        $counter = 1;
        while ($existingCategory) {
            $slug = $slug_base . '_' . $counter;
            $counter++;
            $existingCategory = Tag::where('slug', $slug)->first();
        }
        return $slug;
    }
}
