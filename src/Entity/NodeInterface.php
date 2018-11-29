<?php
namespace SkarZM\Structure\Entity;

interface NodeInterface {
	public function getName(): string;
	public function getPath(): string;
	public function getController(): string;
	public function getAction(): string;
	public function getParams(): array;
	public function getTitle(): string;
	public function getMetaDescription(): string;
	public function getMetaKeywords(): string;
}
