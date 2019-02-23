<?php

declare(strict_types=1);

namespace App\Schema\Types\Requests;

use App\Components\Models\{
    Project,
    User
};
use App\Schema\TypeRegistry;
use GraphQL\Type\Definition\{
    ObjectType,
    Type
};

/**
 * Class Query
 *
 * @package App\Schema\Types
 */
class Query extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'user' => [
                        'type' => TypeRegistry::user(),
                        'description' => 'Return User by _id',
                        'args' => [
                            '_id' => Type::nonNull(Type::id()),
                        ],
                        'resolve' => function ($root, $args) {
                            $user = new User();

                            $user->findById($args['_id']);

                            return $user;
                        }
                    ],
                    'project' => [
                        'type' => TypeRegistry::project(),
                        'description' => 'Return Project by _id',
                        'args' => [
                            '_id' => Type::nonNull(Type::id()),
                        ],
                        'resolve' => function ($root, $args) {
                            $user = new Project();

                            $user->findById($args['_id']);

                            return $user;
                        }
                    ],
//                    'projects' => [
//                        'type' => Type::listOf(TypeRegistry::project()),
//                        'description' => 'Return all projects',
//                        'resolve' => function ($root, $args) {
//                            $projects = new Project();
//
//                            return $projects->all();
//                        }
//                    ]
                ];
            }
        ];

        parent::__construct($config);
    }
}
