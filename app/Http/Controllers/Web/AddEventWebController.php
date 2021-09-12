<?php

namespace App\Http\Controllers\Web;

use App\Models\ImagePostModel;
use App\Models\PostModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AddEventWebController extends Controller
{
    public function index(Request $request) {
        $post = new PostModel();
        $image_post = new ImagePostModel();
        $data = $request->all();
        $base_file_name = $data['title'] . '_' . $data['event_date'] . '_' . time();
        $image_path = public_path('storage\images');
        $description_path = "public\descriptions\\";
        $description_file_name = $base_file_name . '.txt';
        $user_id = $request->session()->get('user_session');

        Storage::disk('local')->put($description_path . $description_file_name, $data['description']);

        $post->user_id = $user_id;
        $post->title = $data['title'];
        $post->event_date = $data['event_date'];
        $post->descriptions = $description_file_name;
        $post->save();

        $post_id = PostModel::select('id')
            ->where('omis_posts.user_id', $user_id)
            ->where('omis_posts.title', $data['title'])
            ->where('omis_posts.event_date', $data['event_date'])
            ->where('omis_posts.descriptions', $description_file_name)
            ->first()['id'];

        if ($files = $request->file('images')) {
            $count = 0;
            foreach ($files as $file) {
                $image_name = $base_file_name . '_' . $count . '.jpg';
                $file->move($image_path, $image_name);
                $image_post->post_id = $post_id;
                $image_post->image_name = $image_name;
                $image_post->save();
                $count += 1;
            }
        }
    }

    public function SaveImageToStorage($image_url) {

    }

    public function SaveHDImageToStorage() {

    }
}
