<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Common\EventsCommonController;
use App\Models\ImagePostModel;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditEventWebController extends EventsCommonController
{
    public function index($id)
    {
        $post_details = PostModel::where('id', $id)
            ->first();
        $post_images = ImagePostModel::where('post_id', $post_details['id'])
            ->get();

        $description_path = "public\descriptions\\";
        $description_content = Storage::get($description_path . $post_details['descriptions']);

        return view('officer.edit-event')->with(array(
            'post_details' => $post_details,
            'post_images' => $post_images,
            'description' => $description_content,
            'image_path' => url('/') . '/storage/images/',
        ));
    }

    public function update($id, $description, $list_of_image=[], Request $request) {
        $data = $request->all();
        $files = $request->file('images');
        $this->post_id = $id;
        $this->user_id = $request->session()->get('user_session');

        $this->UpdateEvent($data, $description);
        $this->SaveImage($data, $files);

        if (!empty($list_of_image)) {
            $images = explode('-', $list_of_image);
            $this->RemovePhoto($images);
        }

        return redirect('events');
    }
}
