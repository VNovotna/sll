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
        $last = null;

        while ($current !== null) {
            if ($current->value > $item->value) {
                $item->setNext($current);
                if ($last === null) {
                    $this->firstItem = $item;
                } else {
                    $last->setNext($item);
                }
                return;
            }
            $last = $current;
            $current = $current->getNext();
        }

        $last->setNext($item);
    }

    public function dumpArray(): array
    {
        $ret = [];
        if ($this->firstItem === null) {
            return $ret;
        }

        $current = $this->firstItem;
        do {
            $ret[] = $current->value;
        } while ($current = $current->getNext());
        return $ret;
    }

    public function dump(): void
    {
        $values = $this->dumpArray();
        if (empty($values)) {
            echo "[list is empty]" . PHP_EOL;
            return;
        }

        foreach ($values as $value) {
            echo $value . PHP_EOL;
        }
    }
}