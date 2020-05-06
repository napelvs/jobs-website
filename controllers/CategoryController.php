<?php
class CategoryController {
	private $categoryTable;

	public function __construct($categoryTable) {
		$this->categoryTable = $categoryTable;
	}

	public function listAll() {
        $category = $this->categoryTable->findAll();

		return ['template' => 'home.html.php', 
				'title' => 'Home',
				'variables' => [
						'category' => $category
					]
				];
	}

	public function listByID() {
		$category = $this->categoryTable->findWithOneField('id', $_GET['id']);
		
		return ['template' => 'category.html.php', 
				'title' => $category['name'],
				'variables' => [
						'category' => $category
					]
				];
	}

}
