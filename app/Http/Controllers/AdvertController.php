<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Http\Requests\AdvertRequest;
use Illuminate\Http\Request;
use Auth;
use Gate;

class AdvertController extends Controller
{
    public function create($id = null)
    {
        $advert = Advert::find($id);

        if($advert && Gate::denies('update', $advert)) {
            return redirect('/');
        }

        return view('advert.create', compact('advert'));
    }

    public function store(AdvertRequest $request, $id = null)
    {
        if($id) {
            $advert = Advert::find($id);

            $this->authorize('update', $advert);

            $advert->edit($request->title, $request->description);
        } else {
            $advert = Auth::user()->advert()->create([
                'title' => $request->title,
                'description' => $request->description
            ]);
        }

        return redirect(route('advert.show', $advert->id));
    }

    public function show($id)
    {
        $advert = Advert::findOrFail($id);

        return view('advert.show', compact('advert'));
    }


    public function delete($id)
    {
        $advert = Advert::findOrFail($id);
        $this->authorize('delete', $advert);

        $advert->delete();

        return redirect('/');
    }
}
