<?php

declare(strict_types=1);

namespace Forum\Storage;

use Laminas\Db\ResultSet\ResultSetInterface;

final class ForumEntity
{
    private int|null $categoryId;
    private int|null $forumId;
    private string|null $title;
    private int $userId;
    private int $created;
    private string|null $description;
    private ResultSetInterface|array $boards;

}
