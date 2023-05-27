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

    public function index()
    {
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.index', compact('list_topic'));
    }
    public function trash()
    {
        $list_topic = Topic::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.trash', compact('list_topic'));
    }
    public function create()
    {
        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_top_id = '';
        $html_sort_order = '';
        foreach ($list_topic as $item) {
            $html_top_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau' . $item->title . '</option>';
        }
        return view('backend.topic.create', compact('html_top_id', 'html_sort_order'));
    }
    public function store(TopicStoreRequest $request)
    {
        $topic = new topic; // tạo mới
        $topic->title = $request->title;
        $topic->slug = Str::slug(
            $topic->title = $request->title,
            '-'
        );
        $topic->top_id = $request->top_id;
        $topic->sort_order = $request->sort_order;
        $topic->image = $request->image;
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->status = $request->status;
        $topic->updated_by = $request->updated_by;
        $topic->updated_at = $request->update_at;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = 1;
        //Upload file
        if ($request->has('image')) {
            $path_dir = "images/topic"; // nơi lưu trữ
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
            $filename = $topic->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);

            $topic->image = $filename;
        }
        // End upload 

        if ($topic->save()) {
            $link = new Link();
            $link->slug = $topic->id;
            $link->table_id = $topic->id;
            $link->type = 'topic';
            $link->save();
            return redirect()->route('topic.index')->with('message', [
                'type' => 'success',
                'msg' => 'Thêm mẫu tin thành công!'
            ]);
        }
        return redirect()->route('topic.index')->with('message', [
            'type' => 'danger',
            'msg' => 'Thêm không thành công!'
        ]);
    }
    public function show($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        } else {
            return view('backend.topic.show', compact('topic'));
        }
    }
    public function edit($id)
    {
        $topic = Topic::find($id);
        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_top_id = '';
        $html_sort_order = '';
        foreach ($list_topic as $item) {
            $html_top_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau' . $item->title . '</option>';
        }
        return view('backend.topic.edit', compact('topic', 'html_top_id', 'html_sort_order'));
    }
    public function update(TopicUpdateRequest $request, $id)
    {
        $topic = Topic::find($id); //lấy mẫu tin sau đó cập nhật
        $topic->title = $request->title;
        $topic->slug = Str::slug($topic->title = $request->title, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->top_id = $request->top_id;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        // Upload file
        if ($request->has('image')) {
            $path_dir = "images/topic/";
            if (File::exists(($path_dir . $topic->image))) {
                File::delete(($path_dir . $topic->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
            $filename = $topic->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);
            $topic->image = $filename;
        }
        //end upload file
        if ($topic->save()) {
            // $link = Link::where([['type','=','topic'],['table_id','=',$id]])->first();
            // $link->slug =$topic->slug;
            // $link->save();
            return redirect()->route('topic.index')->with('message', [
                'type' => 'success',
                'msg' => 'Thêm mẫu tin thành công!'
            ]);
        } else {
            return redirect()->route('topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Thêm không thành công!'
            ]);
        }
    }
    public function destroy($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        if ($topic->delete()) {
            $link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first();

            $link->delete();
            return redirect()->route('topic.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa mẫu tin thành công!'
            ]);
        }
        return redirect()->route('topic.trash')->with('message', [
            'type' => 'danger',
            'msg' => 'Xóa không thành công!'
        ]);
    }
    // admin topic/status/1  
    public function status($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $topic->status = ($topic->status == 1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('message', [
            'type' => 'sucess',
            'msg' => 'Thay đổi trạng thái thành công!'
        ]);
    }
    //admin topic/delete/1
    public function delete($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('message', [
            'type' => 'sucess',
            'msg' => 'Đưa vào thùng rác thành công!'
        ]);
    }
    public function restore($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Mẫu tin không tồn tại!'
            ]);
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.trash')->with('message', [
            'type' => 'sucess',
            'msg' => 'Thay đổi trạng thái thành công!'
        ]);
    }
}
