<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;


use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    #GET: admin/product, admin/product/index
    public function index()
    {
        $list_product = Product::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.index', compact('list_product'));
    }
    #GET:admin/product/trash
    public function trash()
    {
        $list_product = Product::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.trash', compact('list_product'));
    }
    #GET: admin/product/create, admin/product/create
    public function create()
    {
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_category_id = '';
        foreach ($list_category as $item) {
            $html_category_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        $html_brand_id = '';
        foreach ($list_brand as $item) {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return view('backend.product.create', compact('html_category_id', 'html_brand_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product; //tạo mới
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->parent_id = $request->parent_id;
        $product->sort_order = $request->sort_order;
        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = 1;
        //upload file
        if ($request->has('image')) {
            $path_dir = "public/images/product/";
            if (File::exists(public_path($path_dir . $product->image))) {
                File::delete(public_path($path_dir . $product->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $product->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            $product->image = $filename;
        }
        // end upload file
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu tin thành công !']);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        } else {
            return view('backend.product.show', compact('category'));
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $list_product = Product::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_product as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.product.edit', compact('category', 'html_parent_id', 'html_sort_order'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->parent_id = $request->parent_id;
        $product->sort_order = $request->sort_order;
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        //upload images
        if ($request->has('image')) {
            $path_dir = "images/product/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $product->slug . "." . $extension;
            $file->move($path_dir, $filename);
            $product->image = $filename;
        }

        //end
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu ti không thành công !']);
    }
    #GET:admin/product/destroy/1
    public function destroy($id)
    {
        $product = Product::find($id);
        //lấy ra thông tin tấm hình cần xóa
        $path_dir = "images/product/";
        $path_image_delete = ($path_dir . $product->image);
        //end
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($product->delete()) {
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
        } //lưu vào dữ liệu
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => ' Xóa mẫu tin không thành công !']);
    }
    #GET:admin/product/status/1
    public function status($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/product/delete/1
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/product/restore
    public function restore($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công!']);
    }
}
