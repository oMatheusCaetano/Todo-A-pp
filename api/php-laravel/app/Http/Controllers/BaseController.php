<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected string $modelClass;
    protected Model $model;
    protected string $updateRequest;
    protected string $storeRequest;

    public function __construct()
    {
        $this->model = resolve($this->modelClass);
    }

    public function index(): JsonResponse
    {
        return response()->json($this->model->all());
    }

    public function show(int $id): JsonResponse
    {
        $resource = $this->model->find($id);
        return $resource
            ? response()->json($resource)
            : response()->json(['Message' => 'Resource Not Found'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        resolve($this->storeRequest)->validate([$request->all()]);
        return response()->json($this->model->create($request->all()));
    }

    public function update(int $id, Request $request): JsonResponse
    {
        resolve($this->updateRequest)->validate([$request->all()]);

        if (! $resource = $this->model->find($id)) {
            return response()->json(['Message' => 'Resource Not Found'], 404);
        }

        $resource->fill($request->all())->save();
        $resource->refresh();
        return response()->json($resource);
    }

    public function destroy(int $id): JsonResponse
    {   
        if (! $resource = $this->model->find($id)) {
            return response()->json(['Message' => 'Resource Not Found'], 404);
        }

        $resource->delete();
        return response()->json();
    }
}
