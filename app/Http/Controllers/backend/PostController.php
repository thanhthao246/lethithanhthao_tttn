<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;


use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    #GET: admin/post, admin/post/index
    public function index()
    {
        $list_post = Post::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.index', compact('list_post'));
    }
    #GET:admin/post/trash
    public function trash()
    {
        $list_post = Post::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.trash', compact('list_post'));
    }
    #GET: admin/post/create, admin/post/create
    public function create()
    {
        $list_post = Post::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_post as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.post.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Category; //tạo mới
        $post->name = $request->name;
        $post->slug = Str::slug($post->name = $request->name, '-');
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->parent_id = $request->parent_id;
        $post->sort_order = $request->sort_order;
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        //upload file
        if ($request->has('image')) {
            $path_dir = "public/images/post/";
            if (File::exists(public_path($path_dir . $post->image))) {
                File::delete(public_path($path_dir . $post->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $post->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            $post->image = $filename;
        }
        // end upload file
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu tin thành công !']);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        } else {
            return view('backend.post.show', compact('category'));
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $list_post = Post::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_post as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.post.edit', compact('category', 'html_parent_id', 'html_sort_order'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $post->name = $request->name;
        $post->slug = Str::slug($post->name = $request->name, '-');
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->parent_id = $request->parent_id;
        $post->sort_order = $request->sort_order;
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        //upload images
        if ($request->has('image')) {
            $path_dir = "images/post/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $post->slug . "." . $extension;
            $file->move($path_dir, $filename);
            $post->image = $filename;
        }

        //end
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu ti không thành công !']);
    }
    #GET:admin/post/destroy/1
    public function destroy($id)
    {
        $post = Post::find($id);
        //lấy ra thông tin tấm hình cần xóa
        $path_dir = "images/post/";
        $path_image_delete = ($path_dir . $post->image);
        //end
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($post->delete()) {
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
        } //lưu vào dữ liệu
        return redirect()->route('post.trash')->with('message', ['type' => 'success', 'msg' => ' Xóa mẫu tin không thành công !']);
    }
    #GET:admin/post/status/1
    public function status($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/post/delete/1
    public function delete($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/post/restore
    public function restore($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công!']);
    }
}
