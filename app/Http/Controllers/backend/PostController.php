<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;


use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $list_post = Post::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.index', compact('list_post'));
    }
    public function trash()
    {
        $list_post = Post::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.trash', compact('list_post'));
    }
    public function create()
    {
        $list_top = Topic::where('status', '!=', 0)->get();
        $list_post = Post::where('status', '!=', 0)->get();
        $html_top_id = '';
        foreach ($list_top as $item) {
            $html_top_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
        }
        return view('backend.post.create', compact('html_top_id'));
    }
    public function store(PostStoreRequest $request)
    {
        $post = new post; // tạo mới
        $post->title = $request->title;
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->detail = $request->detail;
        $post->top_id = $request->top_id;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->type = 'post';
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        //Upload file
        if ($request->has('image')) {
            $path_dir = "images/post"; // nơi lưu trữ
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
            $filename = $post->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);
            $post->image = $filename;
            $post->save();

            return redirect()->route('post.index')->with('message', [
                'type' => 'success',
                'msg' => 'Thêm mẫu tin thành công!'
            ]);
        }
        // End upload 



        return redirect()->route('post.index')->with('message', [
            'type' => 'danger',
            'msg' => 'Thêm không thành công!'
        ]);
    }
    public function show($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        } else {
            return view('backend.post.show', compact('post'));
        }
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $list_top = Topic::where('status', '!=', 0)->get();
        $list_post = Post::where('status', '!=', 0)->get();
        $html_top_id = '';
        foreach ($list_top as $item) {
            $html_top_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
        }

        return view('backend.post.edit', compact('post', 'html_top_id'));
    }
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id); //lấy mẫu tin sau đó cập nhật
        $post->title = $request->title;
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->top_id = $request->top_id;
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        if ($post->save()) {
            // $link = Link::where([['type','=','post'],['table_id','=',$id]])->first();
            // $link->slug=Str::slug($post->title=$request->title,'-');
            // $link->save();
            return redirect()->route('post.index')->with('message', [
                'type' => 'success',
                'msg' => 'Thêm mẫu tin thành công!'
            ]);
        } else {
            return redirect()->route('post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Thêm không thành công!'
            ]);
        }
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        if ($post->delete()) {

            return redirect()->route('post.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa mẫu tin thành công!'
            ]);
        }
        return redirect()->route('post.trash')->with('message', [
            'type' => 'danger',
            'msg' => 'Xóa không thành công!'
        ]);
    }
    // admin post/status/1  
    public function status($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.index')->with('message', [
            'type' => 'sucess',
            'msg' => 'Thay đổi trạng thái thành công!'
        ]);
    }
    //admin post/delete/1
    public function delete($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.index')->with('message', [
            'type' => 'sucess',
            'msg' => 'Đưa vào thùng rác thành công!'
        ]);
    }
    public function restore($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.trash')->with('message', [
            'type' => 'sucess',
            'msg' => 'Thay đổi trạng thái thành công!'
        ]);
    }
}
