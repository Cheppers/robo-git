<?php

namespace Sweetchuck\Robo\Git\Tests\Unit\Task;

use Sweetchuck\Robo\Git\Task\GitBranchListTask;
use Codeception\Test\Unit;

class GitBranchListTaskTest extends Unit
{
    /**
     * @var \Sweetchuck\Robo\Git\Test\UnitTester
     */
    protected $tester;

    public function casesGetCommand(): array
    {
        return [
            'basic' => [
                "git branch --format 'none'",
                [
                    'format' => 'none',
                ],
            ],
            'workingDirectory' => [
                "cd 'foo' && git branch --format 'none'",
                [
                    'workingDirectory' => 'foo',
                    'format' => 'none',
                ],
            ],
            'gitExecutable' => [
                "my-git branch --format 'none'",
                [
                    'gitExecutable' => 'my-git',
                    'format' => 'none',
                ],
            ],
            'merged true empty' => [
                "git branch --format 'none' --merged",
                [
                    'format' => 'none',
                    'mergedState' => true,
                ],
            ],
            'merged true foo' => [
                "git branch --format 'none' --merged 'foo'",
                [
                    'format' => 'none',
                    'mergedState' => true,
                    'mergedValue' => 'foo',
                ],
            ],
            'merged false empty' => [
                "git branch --format 'none' --no-merged",
                [
                    'format' => 'none',
                    'mergedState' => false,
                ],
            ],
            'merged false foo' => [
                "git branch --format 'none' --no-merged 'foo'",
                [
                    'format' => 'none',
                    'mergedState' => false,
                    'mergedValue' => 'foo',
                ],
            ],
            'sort' => [
                "git branch --format 'none' --sort 'foo'",
                [
                    'format' => 'none',
                    'sort' => 'foo',
                ],
            ],
            'list vector' => [
                "git branch --format 'none' --list 'a' 'b'",
                [
                    'format' => 'none',
                    'listPatterns' => ['a', 'b'],
                ],
            ],
            'list assoc' => [
                "git branch --format 'none' --list 'a' 'c'",
                [
                    'format' => 'none',
                    'listPatterns' => ['a' => true, 'b' => false, 'c' => true],
                ],
            ],
            'contains true empty' => [
                "git branch --contains --format 'none'",
                [
                    'containsState' => true,
                    'containsValue' => '',
                    'format' => 'none',
                ],
            ],
            'contains false empty' => [
                "git branch --no-contains --format 'none'",
                [
                    'containsState' => false,
                    'containsValue' => '',
                    'format' => 'none',
                ],
            ],
            'contains true foo' => [
                "git branch --contains 'foo' --format 'none'",
                [
                    'containsState' => true,
                    'containsValue' => 'foo',
                    'format' => 'none',
                ],
            ],
            'contains false foo' => [
                "git branch --no-contains 'foo' --format 'none'",
                [
                    'containsState' => false,
                    'containsValue' => 'foo',
                    'format' => 'none',
                ],
            ],
            'pointsAt foo' => [
                "git branch --format 'none' --points-at 'foo'",
                [
                    'format' => 'none',
                    'pointsAt' => 'foo',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetCommand
     */
    public function testGetCommand(string $expected, array $options): void
    {
        $task = new GitBranchListTask();
        $task->setOptions($options);
        $this->assertEquals($expected, $task->getCommand());
    }

    public function testGetSetListPatterns(): void
    {
        $options = [
            'listPatterns' => [],
        ];
        $task = new GitBranchListTask();
        $task->setOptions($options);
        $task->addListPatterns(['a']);
        $task->addListPatterns(['b' => true]);
        $this->assertEquals(['a' => true, 'b' => true], $task->getListPatterns());

        $task->addListPattern('c');
        $this->assertEquals(['a' => true, 'b' => true, 'c' => true], $task->getListPatterns());

        $task->removeListPatterns(['a', 'c']);
        $this->assertEquals(['a' => false, 'b' => true, 'c' => false], $task->getListPatterns());

        $task->removeListPattern('b');
        $this->assertEquals(['a' => false, 'b' => false, 'c' => false], $task->getListPatterns());
    }
}
