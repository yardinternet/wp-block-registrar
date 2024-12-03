<?php

declare(strict_types=1);

return [
    /**
     * Register a block type with the same parameters as the `register_block_type` function.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */
    'client-side-block' => [
        'blockType' => 'htdocs/theme/block',
        'args' => [],
    ],
    'server-side-block' => [
        'blockType' => 'theme/block',
        'args' => [
            'render_callback' => 'renderCallback',
        ],
    ],
];
