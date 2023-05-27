<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Productsale;
use App\Models\Productstore;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    #GET: admin/product, admin/product/index
    public function index()
    {
        $list_product = Product::join('lttt_product_image', 'lttt_product_image.product_id', '=', 'lttt_product.id')->where('lttt_product.status', '!=', 0)->orderBy('lttt_product.created_at', 'desc')->get();
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
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = 1;
        $product->status = $request->status;
        if ($product->save() == 1) {
            //uploaod hình ảnh
            if ($request->has('image')) {
                $path_dir = "images/product/";
                if (File::exists(public_path($path_dir . $product->image))) {
                    File::delete(public_path($path_dir . $product->image));
                }
                $array_file = $request->file('image');
                $i = 1;
                foreach ($array_file as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = $product->slug . "-" . $i . "-" . "." . $extension;
                    $file->move($path_dir, $filename);
                    $Product_image = new Productimage();
                    $Product_image->product_id = $product->id;
                    $Product_image->image = $filename;
                    $Product_image->save();
                    $i++;
                }
            }
            //khuyến mãi
            if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
                $Product_sale = new Productsale();
                $Product_sale->product_id = $product->id;
                $Product_sale->price_sale = $request->price_sale;
                $Product_sale->date_begin = $request->date_begin;
                $Product_sale->date_end = $request->date_end;
                $Product_sale->save();
            }
        }
        //kho nhập
        if (strlen($request->price) && strlen($request->qty)) {
            $Product_store = new Productstore();
            $Product_store->product_id = $product->id;
            $Product_store->price = $request->price;
            $Product_store->qty = $request->qty;
            $Product_store->created_at = date('Y-m-d H:i:s');
            $Product_store->created_by = 1;
            $Product_store->save();
        }
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thêm mẫu tin thành công !']);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        } else {
            return view('backend.product.show', compact('product'));
        }
    }
    #GET:admin/product/edit/1
    public function edit($id)
    {
        $product = Product::find($id);
        $list_product = Product::where('status', '!=', 0)->get();
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_category_id = '';
        $html_brand_id = '';
        foreach ($list_category as $item) {
            $html_category_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        foreach ($list_brand as $item) {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.edit', compact('product', 'html_category_id', 'html_brand_id'));
    }
    // public function edit($id)
    // {
    //     $product = Product::find($id);
    //     $list_product = Product::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    //     $html_parent_id = '';
    //     $html_sort_order = '';
    //     foreach ($list_product as $item) {
    //         $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
    //         $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
    //     }
    //     return view('backend.product.edit', compact('product', 'html_parent_id', 'html_sort_order'));
    // }
    #GET:admin/product/update/1
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
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        if ($product->delete()) {
            return redirect()->route('product.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa mẫu tin thành công!'
            ]);
        }
        return redirect()->route('product.trash')->with('message', [
            'type' => 'danger',
            'msg' => 'Xóa không thành công!'
        ]);
    }
    // public function destroy($id)
    // {
    //     $product = Product::find($id);
    //     if ($product == null) {
    //         return redirect()->route('product.trash')->with('message', [
    //             'type' => 'danger',
    //             'msg' => 'Mẫu tin không tồn tại!'
    //         ]);
    //     }
    //     if ($product->delete()) {
    //         return redirect()->route('product.trash')->with('message', [
    //             'type' => 'success',
    //             'msg' => 'Xóa mẫu tin thành công!'
    //         ]);
    //     }
    //     return redirect()->route('product.trash')->with('message', [
    //         'type' => 'danger',
    //         'msg' => 'Xóa không thành công!'
    //     ]);
    //}
    #GET:admin/product/status/1
    public function status($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', [
            'type' => 'sucess',
            'msg' => 'Thay đổi trạng thái thành công!'
        ]);
    }
    #GET:admin/product/delete/1
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', [
            'type' => 'sucess',
            'msg' => 'Đưa vào thùng rác thành công!'
        ]);
    }
    // public function delete($id)
    // {
    //     $product = Product::find($id);
    //     if ($product == null) {
    //         return redirect()->route('product.index')->with('message', [
    //             'type' => 'danger',
    //             'msg' => 'Mẫu tin không tồn tại!'
    //         ]);
    //     }
    //     $product->status = 0;
    //     $product->updated_at = date('Y-m-d H:i:s');
    //     $product->updated_by = 1;
    //     $product->save();
    //     return redirect()->route('product.index')->with('message', [
    //         'type' => 'sucess',
    //         'msg' => 'Đưa vào thùng rác thành công!'
    //     ]);
    // }
    #GET:admin/product/restore
    public function restore($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.trash')->with('message', [
            'type' => 'sucess',
            'msg' => 'Thay đổi trạng thái thành công!'
        ]);
    }
}
