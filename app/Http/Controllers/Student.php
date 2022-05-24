<?php

namespace App\Http\Controllers;

use App\Models\Student as ModelsStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image;
use Intervention\Image\ImageManagerStatic;

class Student extends Controller
{
    public function index()
    {
        return ModelsStudent::orderBy('created_at', 'DESC')->get();
    }
    public function store(Request $request)
    {
        // $pictureInfo = $request->file('pic');
        if($request->image) {
            return $request->image->getClientOriginalName();
        }else{
            return 'no pic found';
        }
        // return $pictureInfo;
    }
    public function search(Request $request)
    {
        $student = ModelsStudent::where('name', 'like', '%'.$request->form['searchText'].'%')->get();
        if($student) {
            return $student;
        }
    }
    public function edit($id)
    {
        $student = ModelsStudent::findOrFail($id);
        if($student) {
            return $student;
        }else{
            return "error finding user";
        }
    }
    public function update(Request $request, $id)
    {
        $student = ModelsStudent::findOrFail($id);
        if($student) {
            $student->name = $request->singleStudent['name'];
            $student->contact = $request->singleStudent['contact'];
            return $student->save();
        }
    }
    public function destroy($id)
    {
        $student = ModelsStudent::findOrFail($id);
        if($student) {
            $student->delete();
        }
    }
}
