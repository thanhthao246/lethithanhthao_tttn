<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

use App\Models\Link;
use App\Http\Requests\TopicStoreRequest;
use App\Http\Requests\TopicUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    #GET: admin/topic, admin/topic/index
    public function index()
    {
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.index', compact('list_topic'));
    }
    #GET:admin/topic/trash
    public function trash()
    {
        $list_topic = Topic::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.trash', compact('list_topic'));
    }
    #GET: admin/topic/create, admin/topic/create
    public function create()
    {
        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_topic as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.topic.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TopicStoreRequest $request)
    {
        $topic = new Topic; //tạo mới
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name = $request->name, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->parent_id = $request->parent_id;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = 1;
        //upload file
        if ($request->has('image')) {
            $path_dir = "public/images/topic/";
            if (File::exists(public_path($path_dir . $topic->image))) {
                File::delete(public_path($path_dir . $topic->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $topic->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            $topic->image = $filename;
        }
        // end upload file

        if ($topic->save()) {
            $link = new Link();
            $link->slug = $topic->slug;
            $link->table_id = $topic->id;
            $link->type = 'topic';
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu tin thành công !']);
        } //lưu vào dữ liệu
        else {
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu ti không thành công !']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        } else {
            return view('backend.topic.show', compact('topic'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_topic as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.topic.edit', compact('topic', 'html_parent_id', 'html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TopicUpdateRequest $request, $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name = $request->name, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->parent_id = $request->parent_id;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        //upload images
        if ($request->has('image')) {
            $path_dir = "images/topic/";
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $topic->slug . "." . $extension;
            $file->move($path_dir, $filename);
            $topic->image = $filename;
        }

        //end
        if ($topic->save()) {
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();
            $link->slug = $topic->slug;
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu tin thành công !']);
        } //lưu vào dữ liệu

        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => ' Thêm mẫu ti không thành công !']);
    }
    #GET:admin/topic/destroy/1
    public function destroy($id)
    {
        $topic = Topic::find($id);
        //lấy ra thông tin tấm hình cần xóa
        $path_dir = "images/topic/";
        $path_image_delete = ($path_dir . $topic->image);
        //end
        if ($topic == null) {
            return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($topic->delete()) {
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();
            $link->delete();
            return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'msg' => ' Xóa mẫu tin thành công !']);
        } //lưu vào dữ liệu
        return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'msg' => ' Xóa mẫu tin không thành công !']);
    }
    #GET:admin/topic/status/1
    public function status($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $topic->status = ($topic->status == 1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/topic/delete/1
    public function delete($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/topic/restore
    public function restore($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công!']);
    }
}
