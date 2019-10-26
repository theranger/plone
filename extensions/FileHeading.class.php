<?php
/**
 * Copyright 2019 by Baltnet Communications (https://www.baltnet.ee)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *        http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class FileHeading {
	function __invoke($content, $block) {
		return $this->prepend($content, $block);
	}

	private function prepend($content, $block) {
		if ($block['blockName'] !== "core/file") return $content;

		return '<h2 class="wp-block-file">' . __("Files") . '</h2>' . $content;
	}
}
