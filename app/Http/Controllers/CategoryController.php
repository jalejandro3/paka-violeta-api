<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\InputValidationException;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

final class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * CategoryController constructor.
     *
     * @param CategoryService $categoryService
     */
    public function __construct(
        CategoryService $categoryService
    )
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success($this->categoryService->getAll());
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

        return $this->success($this->categoryService->create($request->get('name')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id Category id
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
            throw new InputValidationException('The category id is required.');
        }

        if ($validator->fails()) {
            throw new InputValidationException($validator->getMessageBag()->toJson());
        }

        return $this->success($this->categoryService->update($id, $request->get('name')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id Category id
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function destroy(int $id): JsonResponse
    {
        if (! $id) {
            throw new InputValidationException('The category id is required.');
        }

        return $this->success($this->categoryService->delete($id));
    }
}
