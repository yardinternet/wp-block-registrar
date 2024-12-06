<?php

declare(strict_types=1);

return [
    /**
     * Register a block type with the same parameters as the `register_block_type` function.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */
    'client-side-block' => [
        'blockType' => asset('client-side-block')->path(),
        'args' => [],
    ],
    'server-side-block' => [
        'blockType' => asset('server-side-block')->path(),
        'args' => [
            'render_callback' => '__return_empty_string',
        ],
    ],
];
