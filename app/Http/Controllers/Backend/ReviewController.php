<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * @get('/admin/review')
         * @name('admin.review.index')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('review_list'), 403);

        return view('pages.backend.reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * @get('/admin/review/create')
         * @name('admin.review.create')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('review_add'), 403);

        $review = null;

        return view('pages.backend.reviews.cev', compact('review'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        /**
         * @post('/admin/review')
         * @name('admin.review.store')
         * @middlewares('web', auth')
         */
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        /**
         * @get('/admin/review/{review}')
         * @name('admin.review.show')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('review_add'), 403);

        $review = $review->id;

        return view('pages.backend.reviews.cev', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        /**
         * @get('/admin/review/{review}/edit')
         * @name('admin.review.edit')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('review_edit'), 403);

        $review = $review->id;

        return view('pages.backend.reviews.cev', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
