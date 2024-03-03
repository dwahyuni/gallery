<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

  // public function likePhoto(LikeRequest $request)
  // {
  //   $userId = $request->input('userid');
  //   $photoId = $request->input('id_photo');


  //   // Check if the user already liked the photo
  //   $like = Like::where('userid', $userId)
  //     ->where('id_photo', $photoId)
  //     ->first();

  //   if ($like) {
  //     // User already liked, so unlike
  //     $like->delete();
  //     return redirect()->back();
  //   } else {
  //     // User didn't like, so like
  //     Like::create([
  //       'userid' => $userId,
  //       'id_photo' => $photoId,
  //     ]);

  //     return redirect()->back();
  //   }
  // }

  public function store(Request $request)
  {

    $request->validate([
      'description' => 'required',
      'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
    ]);

    $post = new Post;
    $post->description = $request->description;
    $post->user_id = auth()->user()->id;

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $destinationaPath = public_path('/image');
      $file->move($destinationaPath, $fileName);
      $post->image = $fileName;
    }

    $post->save();
    return back()->withMessage('Upload Foto Berhasil Terkirim!');
  }

  public function delete($id)
  {
    $post = Post::find($id);

    if (!$post) {
      return back()->withError('Foto Tidak Ditemukan!');
    }

    // hapus gambar dari penyimpanan
    $image_path = public_path('/image/' . $post->image);
    if (file_exists($image_path)) {
      unlink($image_path);
    }

    $post->delete();

    return back()->withMessage('Foto Berhasil DiHapus!');
  }
}
