<?php

declare(strict_types=1);

namespace App;

class ListItem
{

    private ?self $next = null;

    public function __construct(public readonly int|string $value)
    {
    }

    public function getValue(): int|string
    {
        return $this->value;
    }

    public function getNext(): ?self
    {
        return $this->next;
    }

    public function setNext(self $next): void
    {
        $this->next = $next;
    }
}