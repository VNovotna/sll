<?php

declare(strict_types=1);

namespace App;

class SortedLinkedList
{

    private ?ListItem $firstItem = null;

    public function add(ListItem $item): void
    {
        if ($this->firstItem === null) {
            $this->firstItem = $item;
            return;
        }

        $current = $this->firstItem;
        while ($current->getNext() !== null) {
            $current = $current->getNext();
        }
        $current->setNext($item);
    }

    public function dump(): void
    {
        if ($this->firstItem === null) {
            echo "[list is empty]" . PHP_EOL;
            return;
        }

        $current = $this->firstItem;
        do {
            echo $current->value . PHP_EOL;
        } while ($current = $current->getNext());
    }
}