<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function save(\Symfony\Component\HttpFoundation\Request $request) {
        $validatedData = Validator::make($request->all(), [
                    'task' => 'required',
                        ]
        );
        if ($validatedData->fails()) {
            return redirect('home')
                            ->withErrors($validatedData->errors()->all())
                            ->withInput();
        }

        $task = $request->input('task');
        $data = array('task_name' => $task, "task_status" => 'incomplete');
        DB::table('task')->insert($data);
        echo "Record inserted successfully.<br/>";
        return redirect('/home');
    }

    public function delete($id) {
        DB::delete('delete from task where id = ?', [$id]);
        return redirect('/home');
    }

    public function status($id) {

        $data = DB::table('task')->where('id', $id)->first();

        $task_status = "";
        if ($data->task_status == 'incomplete') {
            $task_status = "complete";
        }
        if ($data->task_status == 'complete') {
            $task_status = "incomplete";
        }
        DB::table('task')
                ->where("id", '=', $id)
                ->update(['task_status' => $task_status]);
        return redirect('/home');
    }

    public function updateGet($id) {
        $task = DB::table('task')
                        ->where("id", '=', $id)->first();
        $data = array(
            'update' => true,
            'task' => $task
        );
//        return view('home', array('task' => $task, 'update' => true));
//        dd($data);
//        return View::make('home')->with($data);
        return redirect('/home')->with('task',$task);
        return redirect()->to('/home')->with('update', true);
    }

    public function updatePost(Request $request) {
        dd($request);
        $validatedData = Validator::make($request->all(), [
                    'task' => 'required',
                        ]
        );
        if ($validatedData->fails()) {
            return redirect('home')
                            ->withErrors($validatedData->errors()->all())
                            ->withInput();
        }

        $task = $request->input('task');
        $data = array('task_name' => $task);
        DB::table('task')
                ->where("id", '=', $id)
                ->update(['task_name' => $task]);
        return redirect('/home');
    }

}
