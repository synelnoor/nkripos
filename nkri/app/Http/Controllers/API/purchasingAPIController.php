<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepurchasingAPIRequest;
use App\Http\Requests\API\UpdatepurchasingAPIRequest;
use App\Models\purchasing;
use App\Repositories\purchasingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class purchasingController
 * @package App\Http\Controllers\API
 */

class purchasingAPIController extends AppBaseController
{
    /** @var  purchasingRepository */
    private $purchasingRepository;

    public function __construct(purchasingRepository $purchasingRepo)
    {
        $this->purchasingRepository = $purchasingRepo;
    }

    /**
     * Display a listing of the purchasing.
     * GET|HEAD /purchasings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchasingRepository->pushCriteria(new RequestCriteria($request));
        $this->purchasingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $purchasings = $this->purchasingRepository->all();

        return $this->sendResponse($purchasings->toArray(), 'Purchasings retrieved successfully');
    }

    /**
     * Store a newly created purchasing in storage.
     * POST /purchasings
     *
     * @param CreatepurchasingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepurchasingAPIRequest $request)
    {
        $input = $request->all();

        $purchasings = $this->purchasingRepository->create($input);

        return $this->sendResponse($purchasings->toArray(), 'Purchasing saved successfully');
    }

    /**
     * Display the specified purchasing.
     * GET|HEAD /purchasings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var purchasing $purchasing */
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            return $this->sendError('Purchasing not found');
        }

        return $this->sendResponse($purchasing->toArray(), 'Purchasing retrieved successfully');
    }

    /**
     * Update the specified purchasing in storage.
     * PUT/PATCH /purchasings/{id}
     *
     * @param  int $id
     * @param UpdatepurchasingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepurchasingAPIRequest $request)
    {
        $input = $request->all();

        /** @var purchasing $purchasing */
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            return $this->sendError('Purchasing not found');
        }

        $purchasing = $this->purchasingRepository->update($input, $id);

        return $this->sendResponse($purchasing->toArray(), 'purchasing updated successfully');
    }

    /**
     * Remove the specified purchasing from storage.
     * DELETE /purchasings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var purchasing $purchasing */
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            return $this->sendError('Purchasing not found');
        }

        $purchasing->delete();

        return $this->sendResponse($id, 'Purchasing deleted successfully');
    }
}
