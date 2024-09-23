<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use PDF;


class AdminController extends Controller
{

    public function AdminDashboard()
    {
        return view('admin.index');
    } 

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }  // end method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }  // end method


    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }  // end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    } // end method



    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } //  end method


    //customer list//
    public function AdminCustomerList()
    {
        $customers = User::where('role', 'user')->get();
        return view ();
    }
    //customer list end//

//category page//
   public function CategoryPage()
   {
    $categories = Category::all();
    return view ('admin.category.product_category', compact('categories'));
   }
   
   public function AdminAddCategory()
   {
    return view ('admin.category.add_product_category');
   }

   public function AdminCategoriesStore (Request $request)

   {
    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        'category_name' => 'required|string|max:255',
    ]);

    //handle photo upload//

    if ($request->hasfile('photo')){
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('upload/admin_images')). $photoName;
        $validatedInput['photo'] = $photoName;
    }

    Category::create($validatedInput);

    $notification = array( 
    'message' => 'Product Category added successfully.',
    'alert-type' => 'success'
);

    return redirect()->route('category.page')->with($notification);
   
   }


   public function AdminEditCategory($id)
   {
        $category = Category::findOrFail($id);
        return view('admin.category.edit_category', compact('category'));

   }

   public function AdminUpdateCategory (Request $request, $id)

   {
    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        'category_name' => 'required|string|max:255',
    ]);

    //handle photo upload//

    if ($request->hasfile('photo')){
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientOriginlName();
        $photo->move(public_path('upload/admin_images'), $photoName);
        $validatedInput['photo'] = $photoName;
    }
    

    

    $category = Category::findOrFail($id);
    $category->update($validatedInput);

    return redirect()->route('category.page')->with([
    'message' => 'Product Category Updated successfully.',
    'alert-type' => 'success'
    ]);
   
   }

   public function AdminDeleteCategory($id)
   {
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('category.page')->with([
    'message' => 'Product Category deleted successfully.',
    'alert-type' => 'success'
    ]);

   }
   //end category page//


//product start//


   public function AdminProduct()
   {
    $categories = Category::all();
    $products = Product::all();
    return view ('admin.product.admin_product', compact('categories', 'products'));
   }

   //admin_product_store start//

   public function AdminProductStore(Request $request)
   {

    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'required|string|max:65535',
    ]);

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('upload/admin_images'), $photoName);
        $validatedInput['photo'] = $photoName;
    }

    Product::create($validatedInput);

    return redirect()->back()->with([
        'message' => 'Product Added Successfully',
        'alert-type' => 'success'
    ]);

    }

    //admin_product_store end//


    //admin_product_view start//

    public function AdminProductView($id)
    {
        $product = Product::findOrFail($id);
        return view();
    }

    //admin_product-view end//


    //admin_edit_product start//

   public function EditProduct()
   {
    $categories = Category::all();
    $product = Product::findOrFail($id);
    return view ('admin.product.admin_edit_product', compact('product', 'categories'));
   }

   //admin_edit_product end//


   //admin_update_product start//

   public function AdminUpdateProduct(Request $request, $id)
   {

    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'required|string',
    ]);

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('upload/admin_images'), $photoName);
        $validatedInput['photo'] = $photoName;
    }

    $product = Product::findOrFail($id);
    $product->update($validatedInput);

    return redirect()->back()->with([
        'message' => 'Product Updated Successfully',
        'alert-type' => 'success'
    ]);

   }

   //admin_update_product end//



   //admin_delete_product start//

   public function AdminDeleteProduct($id)

   {

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with([
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        ]);    

   }

    

    

   public function AddProduct()
   {
    $categories = Category::all();
    return view ('admin.product.admin_add_product', compact('categories'));
   }





    



}