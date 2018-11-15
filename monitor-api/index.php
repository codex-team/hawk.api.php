<?php

declare(strict_types=1);

namespace App;

use App\Schema\TypeRegistry;
use Dotenv\Dotenv;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;

/**
 * Define project's root
 */
define('ROOT', __DIR__);

/**
 * Load Composer Autoloader
 */
require_once ROOT . '/vendor/autoload.php';

/**
 * Load .env
 */
if (is_file(ROOT . '/.env')) {
    $de = new Dotenv(ROOT);
    $de->load();
}

try {
    //получаем данные запроса в формате JSON
    $rawInput = file_get_contents('php://input');
    //декодируем JSON в ассоциативный массив
    $input = json_decode($rawInput, true);
    //получаем запрос из массива
    $query = $input['query'];

    //создаем схему для GraphQL
    $schema = new Schema([
        'query' => TypeRegistry::query(),
        'mutation' => TypeRegistry::mutation()
    ]);

    //исполняем запрос
    $result = GraphQL::executeQuery($schema, $query)->toArray();
} catch (\Exception $e) {
    $result = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

//возвращаем ответ в виде JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result);
