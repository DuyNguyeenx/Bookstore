<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\banner;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    //
    public function index() {
        $banners = banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    public function create(Request $request){
        if ($request->isMethod('POST')) {
            $request->validate([
                'image' => 'required',
            ]);
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image',$request->file('image'));
            }
           $room = banner::create($params);
           if ($room->id) {
               Session::flash('success','thêm mới thành công');
               return redirect()->route('admin.banner');
           }
         }
         return view('admin.banner.create');
    }

    public function edit(Request $request,$id) {
        $banner = banner::find($id);
        if($request->isMethod('POST')) {
            $request->validate([
                'image' => 'required',
            ]);
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$banner->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('image',$request->file('image'));
              }
            } else {
                $params['image'] = $banner->image;
            }
           $result = banner::where('id',$id)->update($params);
           if ($result) {
               Session::flash('success','sửa thành công ');
               return redirect()->route('admin.banner',['id'=>$id]);
           }
        }
        return view('admin.banner.edit', compact('banner'));
    }

    public function delete($id) {
        banner::where('id', $id)->delete();
        Session::flash('success','xoa thành công ');
        return redirect()->route('admin.banner');
    }
}
