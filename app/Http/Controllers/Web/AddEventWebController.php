<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Common\EventsCommonController;
use App\Models\ImagePostModel;
use App\Models\PostModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AddEventWebController extends EventsCommonController
{
    public function index(Request $request) {
        try {
            $data = $request->all();
            $base_file_name = $data['title'] . '_' . $data['event_date'] . '_' . time();
            $description_path = "public\descriptions\\";
            $description_file_name = $base_file_name . '.txt';
            $user_id = $request->session()->get('user_session');
            $files = $request->file('images');

            Storage::disk('local')->put($description_path . $description_file_name, $data['description']);

            $post = new PostModel();
            $post->user_id = $user_id;
            $post->title = $data['title'];
            $post->event_date = $data['event_date'];
            $post->descriptions = $description_file_name;
            $post->save();
            DB::commit();

            $post_id = PostModel::select('id')
                ->where('user_id', $user_id)
                ->where('title', $data['title'])
                ->where('event_date', $data['event_date'])
                ->where('descriptions', $description_file_name)
                ->first()['id'];

            $this->SaveImage($data, $files, $post_id);

//            if ($files = $request->file('images')) {
//                $count = 0;
//                foreach ($files as $file) {
//                    $image_name = $base_file_name . '_' . $count . '.jpg';
//                    $file->move($image_path, $image_name);
//
//                    $image_post = new ImagePostModel();
//                    $image_post->post_id = $post_id;
//                    $image_post->image_name = $image_name;
//                    $image_post->save();
//                    DB::commit();
//
//                    $count += 1;
//                }
//            }
        } catch (\Exception $e) {
            redirect('/events/add');
        }
    }

    public function SaveImageToStorage($image_url) {

    }

    public function SaveHDImageToStorage() {

    }

    public function SaveImageToDB() {

    }
}
