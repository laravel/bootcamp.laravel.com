<?php

namespace App\Markdown;

use League\CommonMark\Node\Block\AbstractBlock;

class TabContainer extends AbstractBlock
{
    public readonly string $group;

    public function __construct($children, string $group = null)
    {
        $this->group = $group ?? uniqid();

        $this->replaceChildren($children);
    }
}
