<?php

declare(strict_types=1);

namespace Forum\Storage;

interface Schema
{
    public const BOARD_TABLE        = 'board';
    public const FORUM_TABLE        = 'forum';
    public const THREAD_TABLE       = 'thread';
    public const THREAD_REPLY_TABLE = 'thread_reply';
}
