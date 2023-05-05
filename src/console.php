<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';


use Symfony\Component\Console\SingleCommandApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use App\SortedLinkedList;
use App\ListItem;

(new SingleCommandApplication())
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        echo "Enter empty input to show List contents" . PHP_EOL;
        echo "Enter -e to exit" . PHP_EOL;

        $list = new SortedLinkedList();

            $helper = $this->getHelper('question');
        while (true) {
            $question = new Question('Add item to list: ');
            $itemValue = $helper->ask($input, $output, $question);

            if (empty($itemValue)) {
                $list->dump();
            } else if ($itemValue === '-e') {
                break;
            } else {
                echo "Adding '{$itemValue}'" . PHP_EOL;
                $list->add(new ListItem($itemValue));
            }
        }
    })
    ->run();