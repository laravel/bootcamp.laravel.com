<?php

namespace App\Markdown;

use League\CommonMark\Node\Block\AbstractBlock;

class TabContainer extends AbstractBlock
{
    public readonly string $group;

    public function __construct($children, string $group = null)
    {
        $this->group = $group ?? $this->generateTabHash($children);

        $this->replaceChildren($children);
    }

    protected function generateTabHash(array $children)
    {
        return md5(implode('', array_map(fn ($child) => $child->name ?? '', $children)));
    }
}
