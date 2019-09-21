<?php
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Lapki API",
 *      description="Lapki API description",
 *      @OA\Contact(
 *          email="test@test.com"
 *      )
 * )
 */

/**
 *  @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Lapki API host server"
 *  )
 */

/**
 * @OA\Tag(
 *     name="user",
 *     description="Operations about user",
 *     @OA\ExternalDocumentation(
 *         description="Find out more about",
 *         url="http://swagger.io"
 *     )
 * )
 */

/**
 * @OA\Get(
 *      path="/projects",
 *      operationId="getProjectsList",
 *      tags={"Projects"},
 *      summary="Get list of projects",
 *      description="Returns list of projects",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=400, description="Bad request"),
 *       security={
 *           {"api_key_security_example": {}}
 *       }
 *     )
 *
 * Returns list of projects
 */