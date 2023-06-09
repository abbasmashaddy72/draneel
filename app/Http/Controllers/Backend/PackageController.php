<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use Illuminate\Support\Facades\Gate;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * @get('/admin/package')
         * @name('admin.package.index')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('package_list'), 403);

        return view('pages.backend.packages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * @get('/admin/package/create')
         * @name('admin.package.create')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('package_add'), 403);

        $package = null;

        return view('pages.backend.packages.cev', compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        /**
         * @post('/admin/package')
         * @name('admin.package.store')
         * @middlewares('web', auth')
         */
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        /**
         * @get('/admin/package/{package}')
         * @name('admin.package.show')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('package_view'), 403);

        $package = $package->id;

        return view('pages.backend.packages.cev', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        /**
         * @get('/admin/package/{package}/edit')
         * @name('admin.package.edit')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('package_edit'), 403);

        $package = $package->id;

        return view('pages.backend.packages.cev', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
