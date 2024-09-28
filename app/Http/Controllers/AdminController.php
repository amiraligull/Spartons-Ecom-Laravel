<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Transaction;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Support\Str;


class AdminController extends Controller
{



    public function Userindex()
    {
        $users = User::all();
        return view('Admin.manage-users', compact('users'));
    }
    
    public function Userstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'about' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'about' => $request->about,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    public function Useredit($id)
    {
        $user = User::findOrFail($id);
        return view('users.index', compact('user')); // For the edit form
    }
    
    public function Userupdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'about' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $user->update($request->only('name', 'email', 'about', 'address', 'phone'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    
    public function Userdestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }




//=========================================================================

public function AnnouncementIndex()
{
    $announcements = Announcement::all();
    return view('Admin.manage-announcements', compact('announcements'));
}

public function AnnouncementStore(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'link' => 'nullable|url',
    ]);

    Announcement::create($request->only('title', 'content', 'link'));

    return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
}

public function AnnouncementEdit($id)
{
    $announcement = Announcement::findOrFail($id);
    return view('Admin.edit-announcement', compact('announcement'));
}

public function AnnouncementUpdate(Request $request, $id)
{
    $announcement = Announcement::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'link' => 'nullable|url',
    ]);

    $announcement->update($request->only('title', 'content', 'link'));

    return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
}

public function announcementdelete($id)
{
    $announcement = Announcement::findOrFail($id);
    $announcement->delete();

    return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
}


//==========================================================================
    public function Productindex()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('Admin.manage-products', compact('products', 'categories'));
    }

    public function Productstore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('manage-products')->with('success', 'Product added successfully');
    }

    public function Productupdate(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        return redirect()->route('manage-products')->with('success', 'Product updated successfully');
    }

    public function Productdestroy($id)
    {
        $product = Product::find($id);
        if ($product->image && file_exists(public_path('images/'.$product->image))) {
            unlink(public_path('images/'.$product->image));
        }
        $product->delete();

        return redirect()->route('manage-products')->with('success', 'Product deleted successfully');
    }





// ===============================================================================

    // team category methods
    public function viewCategories()
    {
        $categories = Category::all(); // Fetch all categories
        return view('Admin.Category', compact('categories'));
    }

    // Add a new category
    public function addCategory(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Create new category
        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name); // Create slug
        $category->save();

        return redirect()->route('manage-categories')->with('success', 'Category added successfully.');
    }
    // Update a category
     public function updateCategory(Request $request, $id)
     {
         // Validate the input
         $request->validate([
             'name' => 'required|string|max:255|unique:categories,name,' . $id,
         ]);
 
         // Find and update category
         $category = Category::findOrFail($id);
         $category->name = $request->name;
         $category->slug = \Str::slug($request->name); // Update slug
         $category->save();
 
         return redirect()->route('manage-categories')->with('success', 'Category updated successfully.');
     }

    // Delete a category
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('manage-categories')->with('success', 'Category deleted successfully.');
    }




//===================================================================
public function TransactionIndex()
{
    $transactions = Transaction::all(); // Fetch all transactions
    return view('Admin.manage-transactions', compact('transactions'));
}

//====================================================================

// coupon managment
public function CouponIndex()
{
    $coupons = Coupon::all(); // Fetch all coupons
    return view('Admin.manage-coupons', compact('coupons')); // Pass coupons to the view
}

public function CouponStore(Request $request)
{
    $request->validate([
        'code' => 'required|string|max:255|unique:coupons,code',
        'discount' => 'required|integer|min:1|max:100', // Ensuring the discount is a percentage
    ]);

    Coupon::create([
        'code' => $request->code,
        'discount' => $request->discount, // Store discount as a number
    ]);

    return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
}

public function CouponUpdate(Request $request, $id)
{
    $coupon = Coupon::findOrFail($id);

    $request->validate([
        'code' => 'required|string|max:255|unique:coupons,code,' . $coupon->id,
        'discount' => 'required|integer|min:1|max:100',
    ]);

    $coupon->update([
        'code' => $request->code,
        'discount' => $request->discount,
    ]);

    return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
}

public function CouponDestroy($id)
{
    $coupon = Coupon::findOrFail($id);
    $coupon->delete();
    return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
}



//=====================================================================

// orders
public function orderIndex()
{
    $orders = Order::with(['user', 'product'])->get();
    $users = User::all();
    $products = Product::all();
    return view('Admin.manage-orders', compact('orders', 'users', 'products'));
}

public function orderStore(Request $request)
{
    // Validate request data
    $request->validate([
        'user_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required|integer',
        'total_amount' => 'required|numeric',
        'status' => 'required',
    ]);

    // Create a new order
    $order = Order::create([
        'user_id' => $request->user_id,
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'total_amount' => $request->total_amount,
        'status' => $request->status,
        'order_date' => now(),
    ]);

    return redirect()->route('orders.index')->with('success', 'Order created successfully.');
}

public function orderStatusUpdate(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->update(['status' => $request->status]);

    return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
}

public function orderDestroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
}

//=========================================
    // update profile setting 

public function showSettingsForm()
{
    return view('Admin.settings');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->route('settings')->with('error', 'Current password is incorrect.');
    }

    $user->update([
        'password' => bcrypt($request->new_password),
    ]);

    return redirect()->route('settings')->with('success', 'Password updated successfully.');
}

public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        // Add other profile fields as needed...
    ]);
    Auth::user()->update([
        'name' => $request->name,
        'email' => $request->email,
        // Update other profile fields...
    ]);

    return redirect()->route('settings')->with('success', 'Profile updated successfully.');
}
//================================================
//blog
   // Display all categories
   public function blogCategoryIndex()
   {
       $categories = BlogCategory::all();
       return view('Admin.manage-blog-categories', compact('categories'));
   }

   public function blogCategoryStore(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
       ]);
   
       // Generate slug from the name if slug is not provided
       $slug = $request->slug ? $request->slug : Str::slug($request->name);
   
       // Create the blog category
       BlogCategory::create([
           'name' => $request->name,
           'slug' => $slug,
       ]);
   
       return redirect()->back()->with('success', 'Blog Category created successfully!');
   }
   
   public function blogCategoryUpdate(Request $request, $id)
   {
       $request->validate([
           'name' => 'required|string|max:255',
       ]);
   
       // Find the blog category
       $category = BlogCategory::findOrFail($id);
   
       // Generate slug from the name if slug is not provided
       $slug = $request->slug ? $request->slug : Str::slug($request->name);
   
       // Update the category
       $category->update([
           'name' => $request->name,
           'slug' => $slug,
       ]);
   
       return redirect()->back()->with('success', 'Blog Category updated successfully!');
   }

   // Delete a category
   public function blogCategoryDestroy($id)
   {
       $category = BlogCategory::findOrFail($id);
       $category->delete();

       return redirect()->route('blog.category.index')->with('success', 'Category deleted successfully.');
   }
//=========================================
//blog post

public function blogPostIndex()
{
    $posts = BlogPost::with('category')->get();
    $categories = BlogCategory::all();
    return view('Admin.manage-blog-posts', compact('posts', 'categories'));
}

public function blogPostStore(Request $request)
{
    // Validate request data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'category_id' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ]);

    // Handle image upload
    $imgPath = null;
    if ($request->hasFile('img')) {
        // Save the image in the 'uploads/blog_images' directory
        $image = $request->file('img');
        $imageName = time() . '_' . $image->getClientOriginalName(); 
        $imgPath = $image->move(public_path('uploads/blog_images'), $imageName); 

        // Set the relative path for the database
        $imgPath = 'uploads/blog_images/' . $imageName;
    }

    // Generate slug from the title if not provided
    $slug = $request->slug ? $request->slug : Str::slug($request->title);

    // Create new blog post
    BlogPost::create([
        'title' => $request->title,
        'slug' => $slug,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'img' => $imgPath,
    ]);

    return redirect()->back()->with('success', 'Blog post created successfully!');
}


public function blogPostUpdate(Request $request, $id)
{
    // Validate request data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'category_id' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ]);

    // Find the post
    $post = BlogPost::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('img')) {
        // Delete the old image if exists
        if ($post->img && file_exists(public_path($post->img))) {
            unlink(public_path($post->img));
        }

        // Save the new image in the 'uploads/blog_images' directory
        $image = $request->file('img');
        $imageName = time() . '_' . $image->getClientOriginalName(); 
        $imgPath = $image->move(public_path('uploads/blog_images'), $imageName); 

        // Set the relative path for the database
        $imgPath = 'uploads/blog_images/' . $imageName;
    } else {
        $imgPath = $post->img; // Keep the old image if no new one is uploaded
    }

    // Generate slug from the title if not provided
    $slug = $request->slug ? $request->slug : Str::slug($request->title);

    // Update post
    $post->update([
        'title' => $request->title,
        'slug' => $slug,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'img' => $imgPath,
    ]);

    return redirect()->back()->with('success', 'Blog post updated successfully!');
}


public function blogPostDestroy($id)
{
    $post = BlogPost::findOrFail($id);

    // Delete the image if exists
    if ($post->img && \Storage::disk('public')->exists($post->img)) {
        \Storage::disk('public')->delete($post->img);
    }

    $post->delete();

    return redirect()->back()->with('success', 'Blog post deleted successfully!');
}
//==================================================

}
