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

            if (is_string($blockType) && ! file_exists($blockType)) {
                $blockTypeAsset = asset($blockType);
                if ($blockTypeAsset->exists() ) {
                    $blockType = $blockTypeAsset->path();
                }
            }

            /** @var array<string,mixed> */
            $blockArgs = $block['args'];

            // @phpstan-ignore argument.type
            \register_block_type($blockType, $blockArgs);
        }
    }
}
