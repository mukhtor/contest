<?php

namespace App\Http\Controllers;
use App\Models\Questions;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $model = Questions::paginate(1);
        return view('sayt.index',
            [
               'model'=>$model,
            ]);
    }
}
