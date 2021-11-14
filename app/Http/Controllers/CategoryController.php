<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (auth()->user()->cannot('view_category'))
            return $this->permissionDenied($this->fallbackRoute);

        $categories = Category::all();

        return view('backend.pages.category.index')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (auth()->user()->cannot('create_category'))
            return $this->permissionDenied($this->fallbackRoute);

        return view('backend.pages.category.form')->with([
            'form' => [
                'route' => route('dashboard.categories.store'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        if (auth()->user()->cannot('create_category'))
            return $this->permissionDenied($this->fallbackRoute);

        Category::create($request->validated() + [
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('dashboard.categories.index')
            ->with('status', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Category $category)
    {
        if (auth()->user()->cannot('update_category'))
            return $this->permissionDenied($this->fallbackRoute);

        return view('backend.pages.category.form')->with([
            'form' => [
                'route' => route('dashboard.categories.update', ['category' => $category]),
                '_method' => 'PATCH',
            ],
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if (auth()->user()->cannot('update_category'))
            return $this->permissionDenied($this->fallbackRoute);

        $category->update($request->validated());

        return redirect()->route('dashboard.categories.index')
            ->with('status', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if (auth()->user()->cannot('view_category'))
            return $this->permissionDenied($this->fallbackRoute);

        $category->delete();

        return redirect()->route('dashboard.categories.index')
            ->with('status', 'Category updated successfully.');
    }
}
