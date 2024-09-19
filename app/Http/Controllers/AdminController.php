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


   public function CategoryPage()
   {
    $categories = Category::all();
    return view ('admin.category.product_category', compact('categories'));
   }
   
   public function AdminAddCategory()
   {
    return view ('admin.category.add_product_category');
   }

   public function EditCategory()
   {
   
    return view ('admin.category.add_product_category');
   }

   public function AdminProduct()
   {
    $categories = Category::all();
    return view ('admin.product.admin_product', compact('categories'));
   }

   public function EditProduct()
   {
    return view ('admin.product.admin_edit_product');
   }

   public function AddProduct()
   {
    return view ('admin.product.admin_add_product');
   }



   public function AdminCategoriesStore (Request $request)

   {
    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        'category_name' => 'required|string|max:255',
    ]);

    if ($request->hasfile('photo')){
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientsOriginlName();
        $photo->move(public_path('upload/admin_images')). $photoName;
        $validatedInput['photo'] = $photoName;
    }

    Category::create($validatedInput);

    $notification = array( 
    'message' => 'Product Category added successfully.',
    'alert-type' => 'success'
);

    return redirect()->route('admin.category.product_category')->with($notification);
   
   }





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



}