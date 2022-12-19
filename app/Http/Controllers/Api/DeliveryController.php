<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\DeliveryFilter;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\StoreDeliveryUnitRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Http\Requests\UpdateDeliveryUnitRequest;
use App\Http\Resources\DeliveryResource;
use App\Models\Delivery;
use App\Models\DeliveryUnit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * @param DeliveryFilter $filter
     * @return AnonymousResourceCollection
     */
    public function index(DeliveryFilter $filter)
    {
        $deliveries = Delivery::filter($filter)->get();
        return DeliveryResource::collection($deliveries);
    }


    /**
     * @param StoreDeliveryRequest $request
     * @return JsonResponse
     */
    public function store(StoreDeliveryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $delivery = new Delivery();
            $delivery->fill($request->all());
            $delivery->save();
            DB::commit();

            return response()->json([
                'message' => 'Delivery ' . $delivery->id .  ' has been created successful.',
                'data' => $delivery,
            ]);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage() . 'Something went wrong, try again.',
            ], 500);
        }
    }

    public function storeDeliveryUnit(StoreDeliveryUnitRequest $request, Delivery $delivery): JsonResponse
    {
        try {
            DB::beginTransaction();
            $unit = new DeliveryUnit();
            $unit->delivery_id = $delivery->id;
            $unit->fill($request->all());
            $unit->save();
            DB::commit();

            return response()->json([
                'message' => 'Delivery unit ' . $unit->id .  ' has been created successful.',
                'data' => $unit,
            ]);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage() . 'Something went wrong, try again.',
            ], 500);
        }
    }


    /**
     * @param UpdateDeliveryRequest $request
     * @param Delivery $delivery
     * @return JsonResponse
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery): JsonResponse
    {
        try {
            DB::beginTransaction();
            $delivery->fill($request->all());
            $delivery->save();
            DB::commit();

            return response()->json([
                'message' => 'Delivery ' . $delivery->id .  ' has been updated successful.',
                'data' => $delivery,
            ]);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage() . 'Something went wrong, try again.',
            ], 500);
        }
    }
    /**
     * TO DO update
     * "units": [
    {
    "unit_type": 1,
    "unit_value": 4.5,
    "unit_from": 0,
    "unit_to": 1,
    "price": 2
    }
    ]
     */
    /**
     * @param UpdateDeliveryUnitRequest $request
     * @param Delivery $delivery
     * @param DeliveryUnit $unit
     * @return JsonResponse
     */
    public function updateDeliveryUnit(UpdateDeliveryUnitRequest $request, Delivery $delivery, DeliveryUnit $unit): JsonResponse
    {
        try {
            DB::beginTransaction();
            $unit->fill($request->all());
            $unit->save();
            DB::commit();

            return response()->json([
                'message' => 'Delivery unit ' . $unit->id .  ' has been updated successful.',
                'data' => $unit,
            ]);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage() . 'Something went wrong, try again.',
            ], 500);
        }
    }

}
