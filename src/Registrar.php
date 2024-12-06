<?php

declare(strict_types=1);

namespace Yard\Block;

class Registrar
{
    public function __construct()
    {
        add_action('init', $this->registerBlocks(...));
    }

    public function registerBlocks(): void
    {
        /** @var array<string, array<string,mixed>> */
        $blocks = config('blocks');

        foreach ($blocks as $block) {
            /** @var string|\WP_Block_Type */
            $blockType = $block['blockType'];
            /** @var array<string,mixed> */
            $blockArgs = $block['args'];

            $args = new \Args\WP_Block_Type();
            $args->fromArray($blockArgs);


            // @phpstan-ignore argument.type
            \register_block_type($blockType, $args->toArray());

        }
    }
}
