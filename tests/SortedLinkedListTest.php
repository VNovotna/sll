<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

/**
 * @covers SortedLinkedList
 */
class SortedLinkedListTest extends TestCase
{
    /**
     * @dataProvider addDataProvider
     */
    public function testAdd(array $input, array $expected): void
    {
        $list = new SortedLinkedList();
        foreach ($input as $item) {
            $list->add(new ListItem($item));
        }

        $this->assertSame($expected, $list->dumpArray());
    }

    public static function addDataProvider(): array
    {
        return [
            'base strings' => [
                'input' => ['f', 'a', 'z', 'g', 'x'],
                'expected' => ['a', 'f', 'g', 'x', 'z'],
            ],
            'empty' => [
                'input' => [],
                'expected' => [],
            ],
            'base ints' => [
                'input' => [16, 8, 1, 7, 3],
                'expected' => [1, 3, 7, 8, 16],
            ],
            'mixed garble' => [
                'input' => [16, 8, 'x', 1, 7, 'f', 3],
                'expected' => [1, 3, 7, 8, 16, 'f', 'x'],
            ],
            'sorted' => [
                'input' => ['a', 'f', 'g', 'x', 'z'],
                'expected' => ['a', 'f', 'g', 'x', 'z'],
            ],
        ];
    }
}