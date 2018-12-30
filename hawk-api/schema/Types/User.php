<?php

declare(strict_types=1);

namespace App\Schema\Types;

use App\Schema\TypeRegistry;
use GraphQL\Type\Definition\{
    ObjectType,
    Type
};

/**
 * Class User
 *
 * @package App\Schema\Types
 */
class User extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    '_id' => [
                        'type' => Type::id(),
                        'description' => 'User\'s unique identifier'
                    ],
                    'email' => [
                        'type' => Type::string(),
                        'description' => 'Email address'
                    ],
                    'password' => [
                        'type' => Type::string(),
                        'description' => 'Password'
                    ],
                    'projects' => [
                        'type' => Type::listOf(TypeRegistry::project()),
                        'description' => 'User\'s projects',
                        'resolve' => function ($root, $args) {
                            return [
                                //проекты пользователей
                            ];
                        }
                    ]
                ];
            }
        ];

        parent::__construct($config);
    }
}
