<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function image_upload(Request $request)
    {
        $blog = new Blog();
        $blog->id = 0;
        $blog->exists = true;
        $image = $blog->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl('thumb')
        ]);
    }

    public function terms()
    {
        return view('pages.backend.terms');
    }

    public function privacy()
    {
        return view('pages.backend.privacy');
    }

    public function career()
    {
        return view('pages.backend.career');
    }
}
