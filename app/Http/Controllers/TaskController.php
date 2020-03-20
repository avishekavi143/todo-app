<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{
    // index loads todo pending list
    public function index()
    {
        $tasks = Task::where('status',0)->paginate(5);
        return view('index', compact('tasks'));
    }
    // loads todo add page
    public function add()
    {
        return view('add');
    }
    // stores new todo
    public function store(Request $request)
    {
        $this->validate( $request, [
            'taskTitle' => 'required|min:5|max:100',
        ]);

        $task = new Task;
        $task->task_title = $request->taskTitle;
        $task->task_detail = $request->taskDetail;
        $task->save();

        Session::flash('success', 'New Todo Task is added Successfully');

        return redirect()->route('task');
    }
    // Loads todo edit page
    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit')->with('taskToEdit',$task);
    }
    // Update todo task
    public function update(Request $request, $id)
    {
        $this->validate( $request, [
            'updatedTask' => 'required|min:5|max:100',
        ]);

        $task = Task::find($id);
        $task->task_title = $request->updatedTask;
        $task->task_detail = $request->updatedTaskDetail;
        $task->save();

        Session::flash('success', 'Todo Task is Updated Successfully');
        return redirect()->route('task');
    }
    // destroy todo task
    public function destroy(Request $request, $id)
    {
        $page = ($request->hidden != '') ? $request->hidden : '';

        $task = Task::find($id);
        $task->delete();

        Session::flash('success', 'Todo Task is Deleted Successfully');

        if($page != ''){
            return redirect()->route('task.completedlist');
        }else{
            return redirect()->route('task');
        }
        
    }
    // loads completed todo tasks
    public function completedList()
    {
        $tasksCompleted = Task::where('status',1)->paginate(5);
        return view('completed', compact('tasksCompleted'));
    }
    // Makes todo task as completed
    public function setCompleted($id)
    {
        $task = Task::find($id);
        $task->status = 1;
        $task->save();

        Session::flash('success', 'Todo Task is updated as Complete');
        return redirect()->route('task');
    }
    // Makes todo task as Pending
    public function setIncompleted($id)
    {
        $task = Task::find($id);
        $task->status = 0;
        $task->save();

        Session::flash('success', 'Todo Task is Updated as Pending');
        return redirect()->route('task.completedlist');
    }
    // Display detail of todo task
    public function show(Request $request){
        $task = Task::find($request->task_id);
        $html = '<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">'.$task->task_title.'</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">'.$task->task_detail.'</div>';

          return $html;
    }

}