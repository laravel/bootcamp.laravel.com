<?php

namespace App\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Node\Node;
use League\CommonMark\Node\Query;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use Stringable;

class TabbedCodeExtension implements ExtensionInterface, NodeRendererInterface
{
    public function __construct(
        protected FencedCodeAttributeParser $fencedCodeAttributeParser = new FencedCodeAttributeParser()
    ) {}

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, [$this, 'onDocumentParsed']);
        $environment->addRenderer(TabContainer::class, $this);
        $environment->addRenderer(TabContent::class, $this);
    }

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $nodes = (new Query())
            ->where(Query::type(FencedCode::class))
            ->findAll($event->getDocument());

        foreach ($nodes as $node) {
            $this->contain($node);
        }
    }

    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return match(true) {
            $node instanceof TabContainer => $this->renderTabContainer($node, $childRenderer),
            $node instanceof TabContent => $this->renderTabContent($node, $childRenderer),
        };
    }

    protected function renderTabContainer(TabContainer $tabContainer, ChildNodeRendererInterface $childRenderer): Stringable
    {
        return new HtmlElement(
            'div',
            [
                'class' => 'tab-container',
                'data-tab-group' => $tabContainer->group,
            ],
            [
                new HtmlElement(
                    'div',
                    ['class' => 'tab-nav'],
                    array_map(fn (TabContent $tabContent) => new HtmlElement(
                        'button',
                        [
                            'class' => implode(' ', array_filter([
                                'tab-button',
                                $tabContent->previous() === null ? 'active' : null
                            ])),
                            'data-tab' => $tabContent->name,
                            'onClick' => "setTab('{$tabContent->name}', '{$tabContainer->group}')",
                        ],
                        $tabContent->name,
                    ), $tabContainer->children())
                ),
                new HtmlElement(
                    'div',
                    ['class' => 'tab-body'],
                    $childRenderer->renderNodes($tabContainer->children())
                ),
            ]
        );
    }

    protected function renderTabContent(TabContent $tabContent, ChildNodeRendererInterface $childRenderer): Stringable
    {
        $attributes = $this->fencedCodeAttributeParser->parse($tabContent->firstChild());

        return new HtmlElement(
            'div',
            [
                'class' => implode(' ', array_filter([
                    'tab-content',
                    $tabContent->previous() === null ? 'active' : null
                ])),
                'data-tab' => $tabContent->name,
            ],
            [
                isset($attributes['filename']) ? new HtmlElement('div', ['class' => 'tab-filename'], $attributes['filename'] ?? '') : null,
                $childRenderer->renderNodes($tabContent->children()),
            ]
        );
    }

    protected function contain(FencedCode $node): void
    {
        if (! $node->parent() instanceof Document) {
            return;
        }

        $attributes = $this->fencedCodeAttributeParser->parse($node);

        if (!isset($attributes['tab'])) {
            return;
        }

        $firstNode = $node;

        $tabs = [
            $this->makeTabContent(clone $firstNode)
        ];

        while ($node->next() instanceof FencedCode) {
            $node = $node->next();
            $tabs[] = $this->makeTabContent(clone $node);
            $node->detach();
        }

        $tabContainer = new TabContainer($tabs, $attributes['group'] ?? null);

        $firstNode->replaceWith($tabContainer);
    }

    protected function makeTabContent(FencedCode $fencedCode): TabContent
    {
        $attributes = $this->fencedCodeAttributeParser->parse($fencedCode);

        return new TabContent($attributes['tab'], $fencedCode);
    }
}
