<?php

namespace Sweetchuck\Robo\Git;

trait GitTaskLoader
{
    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitBranchListTask
     */
    protected function taskGitBranchList(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitBranchListTask $task */
        $task = $this->task(Task\GitBranchListTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitCurrentBranchTask
     */
    protected function taskGitCurrentBranch(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitCurrentBranchTask $task */
        $task = $this->task(Task\GitCurrentBranchTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitListFilesTask
     */
    protected function taskGitListFiles(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitListFilesTask $task */
        $task = $this->task(Task\GitListFilesTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitReadStagedFilesTask
     */
    protected function taskGitReadStagedFiles(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitReadStagedFilesTask $task */
        $task = $this->task(Task\GitReadStagedFilesTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitListStagedFilesTask
     */
    protected function taskGitListStagedFiles(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitListStagedFilesTask $task */
        $task = $this->task(Task\GitListStagedFilesTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitNumOfCommitsBetweenTask
     */
    protected function taskGitNumOfCommitsBetween(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitNumOfCommitsBetweenTask $task */
        $task = $this->task(Task\GitNumOfCommitsBetweenTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|\Sweetchuck\Robo\Git\Task\GitTagListTask
     */
    protected function taskGitTagList(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitTagListTask $task */
        $task = $this->task(Task\GitTagListTask::class);
        $task->setOptions($options);

        return $task;
    }

    /**
     * @return \Robo\Collection\CollectionBuilder|Task\GitTopLevelTask
     */
    protected function taskGitTopLevel(array $options = [])
    {
        /** @var \Sweetchuck\Robo\Git\Task\GitTopLevelTask $task */
        $task = $this->task(Task\GitTopLevelTask::class);
        $task->setOptions($options);

        return $task;
    }
}
