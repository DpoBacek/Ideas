<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Models\Ideas;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(createIdeaRequest $request)
    {

       $validated = $request->validated();
       $validated['user_id'] = auth()->id();
        $idea = Ideas::create($validated);
        return redirect()->route('dashboard')->with('success', 'Idea create successfully.');
    }

    public function destroy(Ideas $idea)
    {
        $this->authorize('idea.destroy', $idea);
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea Delete successfully.');

    }


    public function show(Ideas $idea)
    {
        return view('ideas.show', compact('idea'));
    }


    public function edit(Ideas $idea)
    {
        $this->authorize('idea.edit', $idea);
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));

    }

    public function update(UpdateIdeaRequest  $request ,Ideas $idea)
    {
        $this->authorize('idea.edit', $idea);
        $validated = $request->validated();
        $idea->update($validated);
        return redirect()->route('idea.show',compact('idea'))->with('success','Idea Update successfully');
    }
}
