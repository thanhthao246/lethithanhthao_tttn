<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Link;


use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    #GET: admin/product, admin/product/index
    public function index()
    {
        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
        return view('backend.page.index', compact('list_page'));
    }
    #GET:admin/product/trash
    public function trash()
    {
        $list_page = Post::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.page.trash', compact('list_page'));
    }
    #GET: admin/product/create, admin/product/create
    public function create()
    {
        $list_page = Post::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_page as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.page.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageStoreRequest $request)
    {
        $page = new Post; //tạo mới một page
        $page->title = $request->title;
        $page->slug = Str::slug($page->title = $request->title, "-");
        $page->detail = $request->detail;
        $page->type = 'page';
        $page->metakey = $request->metakey;
        $page->metadesc = $request->metadesc;
        $page->status = $request->status;
        $page->created_at = date('Y-m-d H:i:s');
        $page->created_by = 1;
        //upload file
        if ($request->has('image')) {
            $path_dir = "public/images/page/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $page->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            $page->image = $filename;
        }
        // end upload file
        if ($page->save()) {
            $link = new Link();
            $link->slug = $page->slug;
            $link->table_id = $page->id;
            $link->type = 'page';
            $link->save();
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu tin thành công !']);
        }
    }

    public function show($id)
    {
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        } else {
            return view('backend.page.show', compact('page'));
        }
    }

    public function edit($id)
    {
        $page = Post::find($id);
        $list_page = Post::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_page as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.page.edit', compact('page', 'html_parent_id', 'html_sort_order'));
    }

    public function update(PageUpdateRequest $request, $id)
    {
        $page = Post::find($id);
        $page->slug = Str::slug($page->name = $request->name, '-');

        //upload images
        if ($request->has('image')) {
            $path_dir = "images/product/page/";
            if (File::exists(public_path($path_dir . $page->image))) {
                File::delete(public_path($path_dir . $page->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $page->slug . "." . $extension;
            $file->move($path_dir, $filename);
            $page->image = $filename;
        }
        //end
        $page->name = $request->name;
        $page->detail = $request->detail;
        $page->metakey = $request->metakey;
        $page->metadesc = $request->metadesc;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = 1;
        if ($page->save()) {
            if ($link = Link::where([['type', '=', 'page'], ['table_id', '=', $id]])->first()) {
                $link->slug = $page->slug;
                $link->save();
            }
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật trang đơn thành công !']);
        }
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => ' Cập nhật trang đơn không thành công !']);
    }
    #GET:admin/product/destroy/1
    public function destroy($id)
    {
        $page = Post::find($id);
        //lấy ra thông tin tấm hình cần xóa
        $path_dir = "images/product/";
        $path_image_delete = ($path_dir . $page->image);
        //end
        if ($page == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($page->delete()) {
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
        } //lưu vào dữ liệu
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => ' Xóa mẫu tin không thành công !']);
    }
    #GET:admin/product/status/1
    public function status($id)
    {
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $page->status = ($page->status == 1) ? 2 : 1;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = 1;
        $page->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/product/delete/1
    public function delete($id)
    {
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $page->status = 0;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = 1;
        $page->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/product/restore
    public function restore($id)
    {
        $page = Post::find($id);
        if ($page == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $page->status = 2;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = 1;
        $page->save();
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công!']);
    }
}
