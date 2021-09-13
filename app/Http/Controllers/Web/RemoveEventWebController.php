<?php

namespace App\Http\Controllers\Web;

use App\Models\ImagePostModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RemoveEventWebController extends Controller
{
    public function index($multiple_image_id, Request $request)
    {
//        $data = $request->all();

        return $multiple_image_id;

//        ImagePostModel::where('id', $id_photo)
//            ->delete();

//        return redirect('/events');
    }
}
