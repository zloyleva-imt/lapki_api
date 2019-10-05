<?php

namespace App\Http\Controllers\API\Admin;

use App\Events\CreateCountryEvent;
use App\Http\Resources\CountriesCollection;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{

    /**
     * @OA\Get(
     *     tags={"Country"},
     *     path="/admin/countries",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Get current user"
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return response()->json([
            'data' => CountriesCollection::collection(Country::all())
        ]);
    }


    /**
     * @OA\Post(
     *     tags={"Country"},
     *     path="/admin/countries",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response="200",
     *          description="Get current user"
     *     ),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      required={"true"},
     *                      default="Ukraine"
     *                  )
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * @param Request $request
     * @param Country $country
     * @return CountriesCollection|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Country $country)
    {
        try{
            $country = $country->create($request->only('name'));

        return response()->json([
                'data' => CountriesCollection::make($country)
        ]);
        }catch ( QueryException $exception){
            return response()->json(['error' => 'Country already exists']);
        }
    }

    /**
     * @OA\Get(
     *     tags={"Country"},
     *     path="/admin/countries/{country}",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="country",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Get current user"
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * @param Country $country
     * @return CountriesCollection
     */
    public function show(Country $country)
    {
        return response()->json([
            'data' => CountriesCollection::make($country)
        ]);
    }


    /**
     * @OA\Put(
     *     tags={"Country"},
     *     path="/admin/countries/{country}",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="country",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Get current user"
     *     ),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      required={"true"},
     *                      default="Ukraine"
     *                  )
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * @param Request $request
     * @param Country $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Country $country)
    {
        try{
            return response()->json(['status' => $country->update($request->only('name', 'delete_status'))]);
        }catch ( QueryException $exception){
            return response()->json(['error' => 'Country already exists']);
        }
    }


    /**
     * @OA\Delete(
     *     tags={"Country"},
     *     path="/admin/countries/{country}",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="country",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Get current user"
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete_status = true;
        return response()->json(['status' => $country->save()]);
    }
}
