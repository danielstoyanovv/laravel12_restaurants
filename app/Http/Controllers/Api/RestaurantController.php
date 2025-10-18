<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        // Optional: add pagination
        $restaurants = Restaurant::orderBy('id', 'desc')->paginate(15);
        return RestaurantResource::collection($restaurants);
    }

    public function store(RestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->validated());
        return new RestaurantResource($restaurant);
    }

    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->validated());
        return new RestaurantResource($restaurant);
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response()->json(null, 204);
    }
    public function deleteRestaurant(int $id)
    {
        $restaurant = Restaurant::where('magento_id', $id)->first();
        $restaurant->delete();
        return response()->json(null, 204);
    }

}
