<?php

namespace App\Markdown;

use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;

class FencedCodeAttributeParser
{
    /**
     * @return array<string, string|bool>
     */
    public function parse(FencedCode $node): array
    {
        $info = $node->getInfo();

        if ($info === null) {
            return [];
        }

        preg_match('/^(\w+\b(?!=))(?:\s(.*))?/', $info, $matches);

        $language = $matches[1] ?? null;
        $attributes = $matches[2] ?? null;

        if ($attributes === null) {
            return [];
        }

        return $this->parseAttributes($attributes);
    }

    /**
     * @return array<string, string|bool>
     */
    protected function parseAttributes(string $attributes): array
    {
        preg_match_all(
            '/([^=\s]+)(?:=(?:["\']?((?:.(?!["\']?\s+(?:\S+)=|\s*\/?[>"\']))+.)["\']?))?/',
            $attributes,
            $matches,
            PREG_UNMATCHED_AS_NULL
        );

        $result = [];

        foreach ($matches[1] as $i => $key) {
            $result[$key] = $matches[2][$i] ?? true;
        }

        return $result;
    }
}
