<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Resources\UsersCollection;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Users"},
     *     path="/admin/users",
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
    public function index()
    {
        return response()->json([
            'data' => UsersCollection::collection(User::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        try{
            $user = $user->create($request->only('name'));

            return response()->json([
                'data' => UsersCollection::make($user)
            ]);
        }catch ( QueryException $exception){
            return response()->json(['error' => 'User already exists']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => UsersCollection::make($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            return response()->json(['status' => $user->update(
                $request->only('name', 'email', 'role', 'city_id', 'phone', 'rating', 'currency', 'balance')
            )]);
        }catch ( QueryException $exception){
            return response()->json(['error' => 'Country already exists']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete_status = true;
        return response()->json(['status' => $user->save()]);
    }
}
