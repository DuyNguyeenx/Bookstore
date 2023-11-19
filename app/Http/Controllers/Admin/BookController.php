<?php

namespace App\Http\Controllers\Admin;

use App\Models\book;
use App\Models\genre;
use App\Models\author;
use App\Models\promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
	//

	public function index()
	{
		$books = book::all();
		return view('admin.book.index', compact('books'));
	}
	public function create(Request $request)
	{
		$authors = author::all();
		$genres = genre::all();
		$promotions = promotion::all();
        if ($request->isMethod('POST')) {
			$request->validate([
				// 'prominent' => 'required',
				'genre_id' => 'required',
				'author_id' => 'required',
				'title' => 'required',
				'description' => 'required',
				'price' => 'required',
				'quantity' => 'required',
				'image' => 'required|image',
			]);
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image',$request->file('image'));
            }
           $book = book::create($params);
           if ($book->id) {
               Session::flash('success','thêm mới thành công');
               return redirect()->route('admin.book');
           }
        }
		return view('admin.book.create', compact('authors', 'genres', 'promotions'));
    }

	public function edit(Request $request ,$id)
	{
		$book = book::find($id);
		$authors = author::all();
		$genres = genre::all();
		$promotions = promotion::all();
        if ($request->isMethod('POST')) {
        $request->validate([
			// 'prominent' => 'required',
			'genre_id' => 'required',
			'author_id' => 'required',
			'title' => 'required',
			'description' => 'required',
			'price' => 'required',
			'quantity' => 'required',
			'image' => 'image',
		]);
        $params = $request->except('_token');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
          $resultDL = Storage::delete('/public/'.$book->image);
          if ($resultDL) {
              $params['image'] = uploadFile('image',$request->file('image'));
          }
        } else {
            $params['image'] = $book->image;
        }
       $result = book::where('id',$id)->update($params);
       if ($result) {
           Session::flash('success','sửa thành công ');
           return redirect()->route('admin.book',['id'=>$id]);
       }
    }
		return view('admin.book.edit', compact('book', 'authors', 'genres', 'promotions'));
	}

	public function destroy($id)
	{
		$book = book::find($id);
		delete_file($book->image);
		$book->delete();
		return redirect()->route('admin.book')->with('success', 'book Deleted Successfully');
	}
}
