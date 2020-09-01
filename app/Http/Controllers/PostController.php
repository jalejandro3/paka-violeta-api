<?php

namespace App\Http\Controllers;

use App\Exceptions\InputValidationException;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostController constructor.
     *
     * @param PostService $postService
     */
    public function __construct(
        PostService $postService
    )
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success($this->postService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new InputValidationException($validator->getMessageBag()->toJson());
        }

        return $this->success($this->postService->create($request->get('name')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id Post id
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (! $id) {
            throw new InputValidationException('The post id is required.');
        }

        if ($validator->fails()) {
            throw new InputValidationException($validator->getMessageBag()->toJson());
        }

        return $this->success($this->postService->update($id, $request->get('name')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id Color id
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function destroy(int $id): JsonResponse
    {
        if (! $id) {
            throw new InputValidationException('The post id is required.');
        }

        return $this->success($this->postService->delete($id));
    }
}
