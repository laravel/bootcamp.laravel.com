<?php

namespace App\Markdown;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\Node;

class TabContent extends AbstractBlock
{
    public function __construct(public readonly string $name, Node $node)
    {
        $this->replaceChildren([$node]);
    }
}
