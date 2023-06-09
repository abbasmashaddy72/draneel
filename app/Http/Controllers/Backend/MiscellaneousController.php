<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MiscellaneousController extends Controller
{
    public function image_upload(Request $request)
    {
        /**
         * @post('/admin/image_upload')
         * @name('admin.ckeditor.upload')
         * @middlewares('web', auth')
         */
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
        /**
         * @get('/admin/terms')
         * @name('admin.terms')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('terms'), 403);

        return view('pages.backend.terms');
    }

    public function privacy()
    {
        /**
         * @get('/admin/privacy')
         * @name('admin.privacy')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('privacy'), 403);

        return view('pages.backend.privacy');
    }

    public function practice_places()
    {
        /**
         * @get('/admin/practice_place')
         * @name('admin.practice_place')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('practice_places'), 403);

        return view('pages.backend.career');
    }

    public function feedback()
    {
        /**
         * @get('/admin/feedback')
         * @name('admin.feedback')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('feedback'), 403);

        return view('pages.backend.feedback');
    }
}
