<?php

namespace App\Http\Controllers;

use App\Exceptions\ApplicationException;
use App\Exceptions\InputValidationException;
use App\Exceptions\ResourceNotFoundException;
use App\Services\CategorySizeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorySizeController extends Controller
{
    /**
     * @var CategorySizeService
     */
    private $categorySizeService;

    /**
     * CategorySizeController constructor.
     *
     * @param CategorySizeService $categorySizeService
     */
    public function __construct(
        CategorySizeService $categorySizeService
    )
    {
        $this->categorySizeService = $categorySizeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success($this->categorySizeService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws InputValidationException|ApplicationException
     */
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'category_id' => 'integer|required',
            'size' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new InputValidationException($validator->getMessageBag()->toJson());
        }

        return $this->success(
            $this->categorySizeService->create($request->get('category_id'), $request->get('size'))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id Category size id
     * @return JsonResponse
     * @throws InputValidationException|ResourceNotFoundException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $rules = [
            'category_id' => 'integer|required',
            'size' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (! $id) {
            throw new InputValidationException('The category size id is required.');
        }

        if ($validator->fails()) {
            throw new InputValidationException($validator->getMessageBag()->toJson());
        }

        return $this->success(
            $this->categorySizeService->update($id, $request->get('category_id'), $request->get('size'))
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id Category size id
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function destroy(int $id): JsonResponse
    {
        if (! $id) {
            throw new InputValidationException('The category id is required.');
        }

        return $this->success($this->categorySizeService->delete($id));
    }

    /**
     * Get sizes by category id
     *
     * @param int $categoryId Category id
     * @return JsonResponse
     * @throws InputValidationException|ResourceNotFoundException
     */
    public function getSizesByCategory(int $categoryId): JsonResponse
    {
        if (! $categoryId) {
            throw new InputValidationException('The category id is required.');
        }

        return $this->success($this->categorySizeService->getSizesByCategory($categoryId)->all());
    }
}
