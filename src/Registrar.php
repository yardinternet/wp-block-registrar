<?php

declare(strict_types=1);

namespace Yard\Block;

class Registrar
{
    public function __construct()
    {
        add_action('init', $this->registerBlocks());
    }

    public function registerBlocks(): void
    {
        $blocks = config('blocks');

        foreach ($blocks as $block) {
            \register_block_type($block['blockType'], $block['args']);
        }
    }
}
