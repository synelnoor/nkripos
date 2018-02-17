<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePurchaseAPIRequest;
use App\Http\Requests\API\UpdatePurchaseAPIRequest;
use App\Models\Purchase;
use App\Repositories\PurchaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PurchaseController
 * @package App\Http\Controllers\API
 */

class PurchaseAPIController extends AppBaseController
{
    /** @var  PurchaseRepository */
    private $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepo)
    {
        $this->purchaseRepository = $purchaseRepo;
    }

    /**
     * Display a listing of the Purchase.
     * GET|HEAD /purchases
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchaseRepository->pushCriteria(new RequestCriteria($request));
        $this->purchaseRepository->pushCriteria(new LimitOffsetCriteria($request));
        $purchases = $this->purchaseRepository->all();

        return $this->sendResponse($purchases->toArray(), 'Purchases retrieved successfully');
    }

    /**
     * Store a newly created Purchase in storage.
     * POST /purchases
     *
     * @param CreatePurchaseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseAPIRequest $request)
    {
        $input = $request->all();

        $purchases = $this->purchaseRepository->create($input);

        return $this->sendResponse($purchases->toArray(), 'Purchase saved successfully');
    }

    /**
     * Display the specified Purchase.
     * GET|HEAD /purchases/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Purchase $purchase */
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            return $this->sendError('Purchase not found');
        }

        return $this->sendResponse($purchase->toArray(), 'Purchase retrieved successfully');
    }

    /**
     * Update the specified Purchase in storage.
     * PUT/PATCH /purchases/{id}
     *
     * @param  int $id
     * @param UpdatePurchaseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Purchase $purchase */
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            return $this->sendError('Purchase not found');
        }

        $purchase = $this->purchaseRepository->update($input, $id);

        return $this->sendResponse($purchase->toArray(), 'Purchase updated successfully');
    }

    /**
     * Remove the specified Purchase from storage.
     * DELETE /purchases/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Purchase $purchase */
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            return $this->sendError('Purchase not found');
        }

        $purchase->delete();

        return $this->sendResponse($id, 'Purchase deleted successfully');
    }
}
