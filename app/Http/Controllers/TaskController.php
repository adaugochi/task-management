<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\ProjectService;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    protected TaskService $service;
    protected ProjectService $projectService;

    public function __construct(
        TaskService $taskService,
        ProjectService $projectService
    ) {
        $this->service = $taskService;
        $this->projectService = $projectService;
    }

    public function index(Request $request)
    {
        $project_id = $request->get('project_id');
        $tasks = $this->service->getTasks($project_id);
        $projects = $this->projectService->getProjects();
        return view('welcome', compact('tasks', 'projects'));
    }

    public function save(TaskRequest $request)
    {
        try {
            $result = $this->service->saveTask($request->all());
            if ($result) {
                return redirect('/')->with(['message' => 'Task successfully saved', 'status' => 'success']);
            }
            return redirect('/')->with(['message' => 'Whoops!!! an error occurred', 'status' => 'danger']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with(['message' => 'Whoops!!! an error occurred', 'status' => 'danger']);
        }
    }

    public function reorder(Request $request): JsonResponse
    {
        try {
            $result = $this->service->saveTask($request->all());
            if ($result) {
                return response()->json(['message' => 'Task successfully reordered', 'status' => 'success']);
            }
            return response()->json(['message' => 'Whoops!!! an error occurred', 'status' => 'danger']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['message' => 'Whoops!!! an error occurred', 'status' => 'danger']);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            $res = $this->service->deleteTask($id);
            if ($res) {
                return redirect('/')->with(['message' => 'Task successfully deleted', 'status' => 'success']);
            }
            return redirect('/')->with(['message' => 'Whoops!!! an error occurred', 'status' => 'danger']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/')->with(['message' => 'Whoops!!! an error occurred', 'status' => 'danger']);
        }
    }
}
