<?php

declare(strict_types=1);

namespace Yard\Block;

class Registrar
{
    /** @var array<int, string>  */
    private array $errors = [];

    public function __construct()
    {
        add_action('init', $this->registerBlocks(...));
        add_action('admin_notices', $this->adminErrors(...));
    }

    public function adminErrors(): void
    {
        foreach ($this->errors as $error) {
            wp_admin_notice($error, ['type'=> 'error']);
        }
    }

    public function registerBlocks(): void
    {
        /** @var array<string, array<string,mixed>> */
        $blocks = config('blocks');

        foreach ($blocks as $block) {
            /** @var string|\WP_Block_Type */
            $blockType = $block['block_type'];

            if (is_string($blockType) && ! file_exists($blockType)) {
                $blockTypeAsset = asset($blockType);

                if (! $blockTypeAsset->exists()) {
                    $this->errors[] = "wp-block-registrar: The {$blockType} block cannot be registered because the file does not exist.";

                    continue;
                }

                $blockType = $blockTypeAsset->path();
            }

            /** @var array<string,mixed> */
            $blockArgs = $block['args'];

            // @phpstan-ignore argument.type
            \register_block_type($blockType, $blockArgs);
        }
    }
}
