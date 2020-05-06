<?php
class JobController {
	private $jobsTable;

	public function __construct($jobsTable) {
		$this->jobsTable = $jobsTable;
	}

	public function listAll() {
        $jobs = $this->jobsTable->$jobs = findAllOrder('closingDate', 'ASC', 10);

		return ['template' => 'home.html.php', 
				'title' => 'Home',
				'variables' => [
						'jobs' => $jobs
					]
				];
    }
    
	public function listByLocation() {
		$jobs = $this->$jobsTable->findAllOneFieldNoDuplicates('location');
		
		return ['template' => 'category.html.php', 
				'variables' => [
						'jobs' => $jobs
					]
				];
    }
    

    public function listByLocation() {

        $date = new DateTime();
        if(isset($_POST['job_filter'])) {
            $jobs = $this->$jobsTable->findWithThreeFieldCustom('categoryId', '=', $_GET['id'], 'closingDate', '>', $date->format('Y-m-d'), 'location', '=', $_POST['job_filter']);
        } 
        else {
            $jobs = $this->$jobsTable->findWithTwoFieldCustom('categoryId', '=', $_GET['id'], 'closingDate', '>', $date->format('Y-m-d'));
        }
        
		$jobs = $this->$jobsTable->findAllOneFieldNoDuplicates('location');
		
		return ['template' => 'category.html.php', 
				'variables' => [
						'jobs' => $jobs
					]
				];
    }
	
}
