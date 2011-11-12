<?
class FrontProfiler {
	
	private $profiler;
	private $db = '';
	
	public function __construct() {
		$this->profiler = new PhpQuickProfiler(PhpQuickProfiler::getMicroTime());
	}
	
	public function init() {
		$this->sampleConsoleData();
		$this->sampleDatabaseData();
		$this->sampleMemoryLeak();
		$this->sampleSpeedComparison();
	}
	
	/*-------------------------------------------
	     EXAMPLES OF THE 4 CONSOLE FUNCTIONS
	-------------------------------------------*/
	
	public function sampleConsoleData() {
		try {
			Console::log('Begin logging data');
			Console::logMemory($this, 'PQP Example Class : Line '.__LINE__);
			Console::logSpeed('Time taken to get to line '.__LINE__);
			Console::log(array('Name' => 'Ryan', 'Last' => 'Campbell'));
			Console::logSpeed('Time taken to get to line '.__LINE__);
			Console::logMemory($this, 'PQP Example Class : Line '.__LINE__);
			Console::log('Ending log below with a sample error.');
			throw new Exception('Unable to write to log!');
		}
		catch(Exception $e) {
			Console::logError($e, 'Sample error logging.');
		}
	}
	
	/*-------------------------------------
	     DATABASE OBJECT TO LOG QUERIES
	--------------------------------------*/
	
	public function sampleDatabaseData() {
		$this->db = new SqlProfiler(
			'localhost',
			'root',
			'QAb3-NJu');
		$this->db->connect(true);
		$this->db->changeDatabase('fuel_activite');
		
		foreach ($GLOBALS['query_profiler'] as $query) {
			$rs = $this->db->query($query);
		}
	}
	
	/*-----------------------------------
	     EXAMPLE MEMORY LEAK DETECTED
	------------------------------------*/
	
	public function sampleMemoryLeak() {
		$ret = '';
		$longString = 'This is a really long string that when appended with the . symbol 
					  will cause memory to be duplicated in order to create the new string.';
		for($i = 0; $i < 10; $i++) {
			$ret = $ret . $longString;
			Console::logMemory($ret, 'Watch memory leak -- iteration '.$i);
		}
	}
	
	/*-----------------------------------
	     POINT IN TIME SPEED MARKS
	------------------------------------*/
	
	public function sampleSpeedComparison() {
		Console::logSpeed('Time taken to get to line '.__LINE__);
		Console::logSpeed('Time taken to get to line '.__LINE__);
		Console::logSpeed('Time taken to get to line '.__LINE__);
		Console::logSpeed('Time taken to get to line '.__LINE__);
		Console::logSpeed('Time taken to get to line '.__LINE__);
		Console::logSpeed('Time taken to get to line '.__LINE__);
	}
	
	public function __destruct() {
		$this->profiler->display($this->db);
		echo $this->profiler->display($this->db);
	}
	
}