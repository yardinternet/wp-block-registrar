<?php

declare(strict_types=1);

namespace Yard\Block;

class Registrar
{
	/** @var array<int, string> */
	private array $errors = [];

	public function __construct()
	{
		add_action('init', $this->registerBlocks(...));
		add_action('admin_notices', $this->adminErrors(...));
	}

	public function adminErrors(): void
	{
		foreach ($this->errors as $error) {
			wp_admin_notice($error, ['type' => 'error']);
		}
	}

	public function registerBlocks(): void
	{
		/** @var array<string, array<string,mixed>> */
		$blocks = config('blocks');

		foreach ($blocks as $blockName => $block) {
			/** @var array<string,mixed> */
			$blockArgs = $block['args'];

			if ($this->shouldAutoRegister($blockArgs)) {
				$namespace = wp_get_theme()->get('TextDomain') ?? 'theme';

				\register_block_type("{$namespace}/{$blockName}", $blockArgs);

				continue;
			}

			/** @var string|\WP_Block_Type */
			$blockType = $block['block_type'];

			if (is_string($blockType) && ! file_exists($blockType)) {
				$blockType = get_theme_file_path('public/' . $blockType);

				if (! file_exists($blockType)) {
					$this->errors[] = "wp-block-registrar: The {$blockType} block cannot be registered because the file does not exist.";

					continue;
				}
			}

			// @phpstan-ignore argument.type
			\register_block_type($blockType, $blockArgs);
		}
	}

	private function shouldAutoRegister(array $blockArgs): bool
	{
		return ! empty($blockArgs['supports']['autoRegister']);
	}
}
