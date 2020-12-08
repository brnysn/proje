<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\MassDestroyTagRequest;
use App\Tag;
use Auth;


class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::where('owner', Auth::user()->id)->get();

        return view('tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $user_id = Auth::user()->id;
        $tags = Tag::where('owner', $user_id)->get()->pluck('id')->toArray();

        if (in_array($tag->id, $tags)) {
            return view('tag.show', compact('tag'));
        } else {
            return redirect()->route('admin.tags.index');
        }
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(StoreTagRequest $request)
    {
        Tag::create($request->owner($request)->all());

        return redirect()->route('admin.tags.index');
    }

    public function edit(Tag $tag)
    {
        $user_id = Auth::user()->id;
        if ($tag->owner == $user_id) {
            return view('tag.edit', compact('tag'));
        } else {
            return redirect()->route('admin.tags.index');
        }
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $user_id = Auth::user()->id;
        if ($tag->owner == $user_id) {
            $tag->update($request->all());
            return redirect()->route('admin.tags.index');
        } else {
            return redirect()->route('admin.tags.index');
        }
    }

    public function destroy(Tag $tag)
    {
        $user_id = Auth::user()->id;
        if ($tag->owner == $user_id) {
            $tag->delete();
            return back();
        } else {
            return redirect()->route('admin.tags.index');
        }
    }

    public function massDestroy(MassDestroyTagRequest $request)
    {
        $user_id = Auth::user()->id;
        foreach (request('ids') as  $id) {
            $tag = Tag::where('id', $id)->first();
            if ($tag->owner == $user_id) {
                $tag->delete();
            } 
        }
        return back();
    }

}
