<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\TeacherDataTable;
use App\Models\Teacher;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DataTables;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
      if ($request->ajax()) {
            $data = Teacher::select('id', 'fullName', 'major', 'dateHired')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>';
                    $button .= '   <button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i> Delete</button>';
                    return $button;
                })
                ->make(true);
        }

        return view('home');
    }

    public function store(Request $request)
    {
        $rules = array(
            'fullName'    =>  'required',
            'dateHired'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
          'fullName'    =>  $request->fullName,
          'major'     =>  $request->major,
          'dateHired'     =>  $request->dateHired
        );
        Teacher::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Teacher ::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
          'fullName'    =>  'required',
          'dateHired'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'fullName'    =>  $request->fullName,
            'major'     =>  $request->major,
            'dateHired'     =>  $request->dateHired
        );

        Teacher::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = Teacher::findOrFail($id);
        $data->delete();
    }
}
