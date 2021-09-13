<?php

namespace App\Http\Controllers\Common;

use App\Models\ImagePostModel;
use App\Models\PostModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventsCommonController extends Controller
{
    protected $user_id = '';
    protected $post_id = '';

    public function SaveImage($data, $files) {
        $base_file_name = $data['title'] . '_' . $data['event_date'] . '_' . time();
        $image_path = public_path('storage\images');

        if (!empty($files)) {
            $count = 0;
            foreach ($files as $file) {
                $image_name = $base_file_name . '_' . $count . '.jpg';
                $file->move($image_path, $image_name);

                $image_post = new ImagePostModel();
                $image_post->post_id = $this->post_id;
                $image_post->image_name = $image_name;
                $image_post->save();
                DB::commit();

                $count += 1;
            }
        }
    }

    public function UpdateEvent($data, $description) {
        $description_path = "public\descriptions\\";

        Storage::disk('local')->put($description_path . $description, $data['description']);

        PostModel::where('id', $this->post_id)
            ->update([
                'user_id' => $this->user_id,
                'title' => $data['title'],
                'event_date' => $data['event_date'],
            ]);
    }

    public function RemovePhoto($images) {
        foreach ($images as $image) {
            ImagePostModel::where('id', $image)
                ->delete();
        }
    }
}
