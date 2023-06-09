<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    
    public function postcontact(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'content' => 'required',
            
           
        ],
        [
            'name.required' => 'Bạn chưa nhập tên ',
            'email.required' => 'Bạn chưa nhập email',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'content.required' => 'Bạn chưa nhập nội dung',
        ]);

        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->content=$request->content;
        $contact->status=1;
        $contact->save();
        return redirect()->route('frontend.contact')-> with('message', ['type' => 'success','msg'=>
        'Đã gửi thành công']);
    }  
    public function index(){
        return view('frontend.contact'); 
    }

}
