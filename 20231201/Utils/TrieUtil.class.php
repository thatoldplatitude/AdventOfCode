<?php

class TrieNode {
	public bool $isEnd = false;
	public array $children = [];
}

class Trie {
	public ?TrieNode $node = null;

	public function __construct() {
		$this->node = new TrieNode();
	}

	public function insert(string $str) {
		$strLength = strlen($str);
		$node = $this->node;
		for ($i=0; $i < $strLength; $i++) { 
			$char = $str[$i];
			if(array_key_exists($char,$node->children)) {
				$node = $node->children[$char];
				continue;
			}
			$node->children[$char] = new TrieNode();
			$node = $node->children[$char];
		}
		$node->isEnd = true;

	}

	public function search(string $str, int $offset) {
		$strLength = strlen($str);
		$node = $this->node;
		$len = 0;

		for ($i=$offset; $i < $strLength; $i++) { 
			$char = $str[$i];
			// echo "Str: ${str}. I: ${i}. Offset: ${offset}. Node char: ${char}. Node: " . json_encode($node);
			if(!array_key_exists($char, $node->children) || $node->isEnd) {
				break;
			}
			$node = $node->children[$char];
			$len++;
		}

		return [
			"isEnd"		=> $node->isEnd,
			"length"	=> $len
		];
	}
}


