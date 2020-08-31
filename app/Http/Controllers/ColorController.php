<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\InputValidationException;
use App\Services\ColorService;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

final class ColorController extends Controller
{
    /**
     * @var ColorService
     */
    private $colorService;

    /**
     * ColorController constructor.
     *
     * @param ColorService $colorService
     */
    public function __construct(
        ColorService $colorService
    )
    {
        $this->colorService = $colorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success($this->colorService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

//        if ($validator->fails()) {
//            throw new InputValidationException($validator->getMessageBag());
//        }

        return $this->success($this->colorService->create($request->get('name')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id Color id
     * @return JsonResponse
     * @throws InputValidationException
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (! $id) {
            throw new InputValidationException('The color id is necessary.');
        }

        if ($validator->fails()) {
            throw new InputValidationException($validator->getMessageBag());
        }

        return $this->success($this->colorService->update($id, $request->get('name')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id Color id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        return $this->success($this->colorService->delete($id));
    }
}
