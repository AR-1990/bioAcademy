<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    private function defaultBlogCategories(): array
    {
        return [
            ['name' => 'Tips & Guides', 'slug' => 'tips-guides'],
            ['name' => 'Latest Advances', 'slug' => 'latest-advances'],
            ['name' => 'Expert Insights', 'slug' => 'expert-insights'],
            ['name' => 'Conditions & Care', 'slug' => 'conditions-care'],
            ['name' => 'Trial Benefits', 'slug' => 'trial-benefits'],
            ['name' => 'For Participants', 'slug' => 'for-participants'],
            ['name' => 'Other', 'slug' => 'other'],
        ];
    }

    private function ensureBlogCategoriesExist(): void
    {
        if (!Schema::hasTable('blog_categories')) {
            return;
        }

        if (DB::table('blog_categories')->count() > 0) {
            return;
        }

        foreach ($this->defaultBlogCategories() as $category) {
            DB::table('blog_categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function ensureOtherCategoryExists(): string
    {
        if (!Schema::hasTable('blog_categories')) {
            return 'other';
        }

        $otherCategory = DB::table('blog_categories')->where('slug', 'other')->first();

        if (!$otherCategory) {
            DB::table('blog_categories')->insert([
                'name' => 'Other',
                'slug' => 'other',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return 'other';
    }

    private function blogCategories(): array
    {
        if (!Schema::hasTable('blog_categories')) {
            return collect($this->defaultBlogCategories())->pluck('name', 'slug')->toArray();
        }

        $this->ensureBlogCategoriesExist();

        $categories = DB::table('blog_categories')
            ->orderByRaw("CASE WHEN slug = 'other' THEN 1 ELSE 0 END")
            ->orderBy('name')
            ->pluck('name', 'slug')
            ->toArray();

        return !empty($categories) ? $categories : ['other' => 'Other'];
    }

    private function normalizeBlogCategory(?string $category): string
    {
        $categories = $this->blogCategories();

        if ($category && array_key_exists($category, $categories)) {
            return $category;
        }

        return $this->ensureOtherCategoryExists();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('university.about');
        // });
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view_blog(){
        // $blog=Blog::orderBy('id', 'desc')->get();
        // return view('blogs',compact('blog'));
        $blogs = DB::table('blogs')->orderBy('id', 'desc')->get();
        return view('admin_blogs.blogs', [
            'blogs' => $blogs,
            'blogCategories' => $this->blogCategories(),
        ]);

    }
    public function createBlogForm(){
        return view('admin_blogs.add-blog', [
            'blogCategories' => $this->blogCategories(),
        ]);
    }
    public function blogs(){
        $blogs = DB::table('blogs')->where('status','1')->orderBy('id', 'desc')->get();
        return view('university.blogs.index', [
            'blogs' => $blogs,
            'blogCategories' => $this->blogCategories(),
        ]);
    }
    public function blogCategoriesIndex()
    {
        $this->ensureBlogCategoriesExist();

        $categories = DB::table('blog_categories as categories')
            ->leftJoin('blogs', 'blogs.category', '=', 'categories.slug')
            ->select(
                'categories.id',
                'categories.name',
                'categories.slug',
                'categories.created_at',
                DB::raw('COUNT(blogs.id) as blogs_count')
            )
            ->groupBy('categories.id', 'categories.name', 'categories.slug', 'categories.created_at')
            ->orderByRaw("CASE WHEN categories.slug = 'other' THEN 1 ELSE 0 END")
            ->orderBy('categories.name')
            ->get();

        return view('admin_blogs.categories', compact('categories'));
    }
    public function storeBlogCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->input('slug') ?: $request->input('name'));

        if ($slug === '') {
            return redirect()->back()->withInput()->with('error', 'Please enter a valid category slug.');
        }

        if (DB::table('blog_categories')->where('slug', $slug)->exists()) {
            return redirect()->back()->withInput()->with('error', 'This category slug already exists.');
        }

        DB::table('blog_categories')->insert([
            'name' => $request->input('name'),
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Category added successfully.');
    }
    public function updateBlogCategory(Request $request, $id)
    {
        $category = DB::table('blog_categories')->where('id', $id)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $slug = $category->slug === 'other'
            ? 'other'
            : Str::slug($request->input('slug') ?: $request->input('name'));

        if ($slug === '') {
            return redirect()->back()->withInput()->with('error', 'Please enter a valid category slug.');
        }

        if (DB::table('blog_categories')->where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->withInput()->with('error', 'This category slug already exists.');
        }

        DB::transaction(function () use ($request, $category, $id, $slug) {
            DB::table('blog_categories')->where('id', $id)->update([
                'name' => $request->input('name'),
                'slug' => $slug,
                'updated_at' => now(),
            ]);

            if ($category->slug !== $slug) {
                DB::table('blogs')->where('category', $category->slug)->update([
                    'category' => $slug,
                    'updated_at' => now(),
                ]);
            }
        });

        return redirect()->back()->with('success', 'Category updated successfully.');
    }
    public function deleteBlogCategory($id)
    {
        $category = DB::table('blog_categories')->where('id', $id)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        if ($category->slug === 'other') {
            return redirect()->back()->with('error', 'Default Other category cannot be deleted.');
        }

        $fallbackCategory = $this->ensureOtherCategoryExists();

        DB::transaction(function () use ($category, $fallbackCategory, $id) {
            DB::table('blogs')->where('category', $category->slug)->update([
                'category' => $fallbackCategory,
                'updated_at' => now(),
            ]);

            DB::table('blog_categories')->where('id', $id)->delete();
        });

        return redirect()->back()->with('success', 'Category deleted successfully. Related blogs moved to Other.');
    }
    public function blogDetail($slug){
        // dd($slug);
        $blogs = DB::table('blogs')->where('status','1')->where('slug',$slug)->orderBy('id', 'desc')->get();
        return view('university.blogs.detail',compact('blogs'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id',$id)->get();
        return view('admin_blogs.editblog', [
            'blog' => $blog,
            'blogCategories' => $this->blogCategories(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
    public function changeBlogStatus(Request $request)
    {
        // $blog = Blog::find($request->id);


        // $blog->status = $request->status;
        // $blog->save();
        DB::table('blogs')
        ->where('id', $request->id)
        ->update(['status' => $request->status]);
        return response()->json(['success'=>'Status change successfully.']);
    }
    // public function update_blog(Request $request)
    // {

    //     $request->validate([
    //         'title' => 'required|string',
    //         'content' => 'required|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Retrieve the blog entry by ID
    //     $blog = Blog::find($request->id);

    //     // Handle image upload if an image is provided
    //     $imagePath = $blog->image; // Use the existing image path by default
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imagePath = $image->store('blog_images', 'public'); // Store image in 'storage/app/public/blog_images' directory

    //         // Delete the previous image if it exists
    //         if ($blog->image) {
    //             \Storage::disk('public')->delete($blog->image);
    //         }
    //     }

    //     // Update the blog entry
    //     $blog->update([
    //         'title' => $request->input("title"),
    //         'heading' => $request->input("heading"),
    //         'slug' => $request->input("slug"),
    //         'content' => $request->input("content"),
    //         'image' => $imagePath, // Store the new image path in the database, or the existing one if no new image is uploaded
    //         'meta_tags' => $request->input("meta_tags"),
    //     ]);

    //     // Return a response or redirect as needed
    //     return redirect()->route('/admin/blogs');
    // }
    public function create_blog(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string',
        //     'heading' => 'required|string',
        //     'content' => 'required|string',
        //     'slug' => 'required',
        //     'cuctomeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
    
        // $imagePath = null;
        // if ($request->hasFile('cuctomeimage')) {
        //     $image = $request->file('cuctomeimage');
        //     $imagePath = $image->store('blog_images', 'public');
        // }
    
        // $blog = Blog::create([
        //     'title' => $request->input("title"),
        //     'heading' => $request->input("heading"),
        //     'slug' => $request->input("slug"),
        //     'content' => $request->input("content"),
        //     'image' => $imagePath,
        //     'meta_tags' => $request->input("meta_tags"),
        // ]);
        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'content' => 'required|string',
            'slug' => 'required',
            'category' => 'required|string',
            'cuctomeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
        ]);
    
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('cuctomeimage')) {
            $image = $request->file('cuctomeimage');
            $imagePath = $image->store('blog_images', 'public');
        }
    
        // Insert blog data into the 'blogs' table using Query Builder
        DB::table('blogs')->insert([
            'title' => $request->input('title'),
            'heading' => $request->input('heading'),
            'slug' => $request->input('slug'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'meta_tags' => $request->input('meta_tags'),
            'category' => $this->normalizeBlogCategory($request->input('category')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('/admin/blogs');
    }
    
    public function update_blog(Request $request)
    {
    $request->validate([
        'title' => 'required|string',
        'heading' => 'required|string',
        'slug' => 'required',
        'content' => 'required|string',
        'category' => 'required|string',
        'cuctomeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
    ]);

    // Retrieve the existing blog entry
    $blog = DB::table('blogs')->where('id', $request->id)->first();

    if (!$blog) {
        return redirect()->back()->with('error', 'Blog not found.');
    }

    // Handle image upload if provided
    $imagePath = $blog->image; // Default to existing image path
    if ($request->hasFile('cuctomeimage')) {
        $image = $request->file('cuctomeimage');
        $imagePath = $image->store('blog_images', 'public');

        // Delete previous image if exists
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
    }

    // Update the blog entry using Query Builder
    DB::table('blogs')->where('id', $request->id)->update([
        'title' => $request->input("title"),
        'heading' => $request->input("heading"),
        'slug' => $request->input("slug"),
        'content' => $request->input("content"),
        'image' => $imagePath,
        'meta_tags' => $request->input("meta_tags"),
        'category' => $this->normalizeBlogCategory($request->input("category")),
        // 'status' => '0',
        'updated_at' => now(),
    ]);

    // Redirect after updating
    return  redirect()->route('/admin/blogs')->with('success', 'Blog updated successfully.');
}

}
