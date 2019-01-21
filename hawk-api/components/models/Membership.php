<?php

declare(strict_types=1);

namespace App\Components\Models;

class Membership extends BaseModel
{
    protected const COLLECTION_NAME = 'membership:';

    /**
     * Membership's unique identifier
     *
     * @var string|null
     */
    public $_id;

    /**
     * Project's id where user take part
     *
     * @var string|null
     */
    public $projectId;

    /**
     * Project's URI where user take part
     *
     * @var string|null
     */
    public $projectUri;

    /**
     * Contains notifications mode
     *
     * @var array|null
     */
    public $notifies;

    /**
     * Telegram's hook to notify
     *
     * @var string|null
     */
    public $tgHook;

    /**
     * Slack's hook to notify
     *
     * @var string|null
     */
    public $slackHook;

    /**
     * Project._id at collection name, that team belongs to
     *
     * @var string
     */
    public $userId;

    /**
     * Membership constructor.
     *
     * @param string $userId Associated user identifier
     * @param array  $args   Values as assoc array to fill model
     */
    public function __construct(string $userId, array $args = [])
    {
        $this->userId = $userId;
        parent::__construct($args);
    }

    public function all(array $filter = []): array
    {
        return []; // TODO: Change the autogenerated stub
    }

    /**
     * Return collection name
     *
     * @return string
     */
    public function collectionName(): string
    {
        return self::COLLECTION_NAME . $this->userId;
    }
}
