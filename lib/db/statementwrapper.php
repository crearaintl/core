<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

/**
 * small wrapper around \Doctrine\DBAL\Driver\Statement to make it behave, more like an MDB2 Statement
 */
class OC_DB_StatementWrapper {
	/**
	 * @var \Doctrine\DBAL\Driver\Statement
	 */
	private $statement = null;
	private $isManipulation = false;
	private $lastArguments = array();

	public function __construct($statement, $isManipulation) {
		$this->statement = $statement;
		$this->isManipulation = $isManipulation;
	}

	/**
	 * pass all other function directly to the \Doctrine\DBAL\Driver\Statement
	 */
	public function __call($name,$arguments) {
		return call_user_func_array(array($this->statement,$name), $arguments);
	}

	/**
	 * provide numRows
	 */
	public function numRows() {
		$type = OC_Config::getValue( "dbtype", "sqlite" );
		if ($type == 'oci') {
			// OCI doesn't have a queryString, just do a rowCount for now
			return $this->statement->rowCount();
		}
		$regex = '/^SELECT\s+(?:ALL\s+|DISTINCT\s+)?(?:.*?)\s+FROM\s+(.*)$/i';
		$queryString = $this->statement->getWrappedStatement()->queryString;
		if (preg_match($regex, $queryString, $output) > 0) {
			$query = OC_DB::prepare("SELECT COUNT(*) FROM {$output[1]}");
			return $query->execute($this->lastArguments)->fetchColumn();
		}else{
			return $this->statement->rowCount();
		}
	}

	/**
	 * make execute return the result instead of a bool
	 */
	public function execute($input=array()) {
		if(OC_Config::getValue( "log_query", false)) {
			$params_str = str_replace("\n"," ",var_export($input,true));
			OC_Log::write('core', 'DB execute with arguments : '.$params_str, OC_Log::DEBUG);
		}
		$this->lastArguments = $input;
		if (count($input) > 0) {

			if (!isset($type)) {
				$type = OC_Config::getValue( "dbtype", "sqlite" );
			}

			if ($type == 'mssql') {
				$input = $this->tryFixSubstringLastArgumentDataForMSSQL($input);
			}

			$result = $this->statement->execute($input);
		} else {
			$result = $this->statement->execute();
		}
		
		if ($result === false) {
			return false;
		}
		if ($this->isManipulation) {
			return $this->statement->rowCount();
		} else {
			return $this;
		}
	}

	private function tryFixSubstringLastArgumentDataForMSSQL($input) {
		$query = $this->statement->getWrappedStatement()->queryString;
		$pos = stripos ($query, 'SUBSTRING');

		if ( $pos === false) {
			return $input;
		}

		try {
			$newQuery = '';

			$cArg = 0;

			$inSubstring = false;

			// Create new query
			for ($i = 0; $i < strlen ($query); $i++) {
				if ($inSubstring == false) {
					// Defines when we should start inserting values
					if (substr ($query, $i, 9) == 'SUBSTRING') {
						$inSubstring = true;
					}
				} else {
					// Defines when we should stop inserting values
					if (substr ($query, $i, 1) == ')') {
						$inSubstring = false;
					}
				}

				if (substr ($query, $i, 1) == '?') {
					// We found a question mark
					if ($inSubstring) {
						$newQuery .= $input[$cArg];

						//
						// Remove from input array
						//
						array_splice ($input, $cArg, 1);
					} else {
						$newQuery .= substr ($query, $i, 1);
						$cArg++;
					}
				} else {
					$newQuery .= substr ($query, $i, 1);
				}
			}

			// The global data we need
			$name = OC_Config::getValue( "dbname", "owncloud" );
			$host = OC_Config::getValue( "dbhost", "" );
			$user = OC_Config::getValue( "dbuser", "" );
			$pass = OC_Config::getValue( "dbpassword", "" );
			if (strpos($host,':')) {
				list($host, $port) = explode(':', $host, 2);
			} else {
				$port = false;
			}
			$opts = array();

			if ($port) {
				$dsn = 'sqlsrv:Server='.$host.','.$port.';Database='.$name;
			} else {
				$dsn = 'sqlsrv:Server='.$host.';Database='.$name;
			}

			$PDO = new PDO($dsn, $user, $pass, $opts);
			$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->statement = $PDO->prepare($newQuery);

			$this->lastArguments = $input;

			return $input;
		} catch (PDOException $e){
			$entry = 'PDO DB Error: "'.$e->getMessage().'"<br />';
			$entry .= 'Offending command was: '.$this->statement->queryString .'<br />';
			$entry .= 'Input parameters: ' .print_r($input, true).'<br />';
			$entry .= 'Stack trace: ' .$e->getTraceAsString().'<br />';
			OC_Log::write('core', $entry, OC_Log::FATAL);
			OC_User::setUserId(null);

			// send http status 503
			header('HTTP/1.1 503 Service Temporarily Unavailable');
			header('Status: 503 Service Temporarily Unavailable');
			OC_Template::printErrorPage('Failed to connect to database');
			die ($entry);
		}
	}
    
	/**
	 * provide an alias for fetch
	 */
	public function fetchRow() {
		return $this->statement->fetch();
	}

	/**
	 * Provide a simple fetchOne.
	 * fetch single column from the next row
	 * @param int $colnum the column number to fetch
	 * @return string
	 */
	public function fetchOne($colnum = 0) {
		return $this->statement->fetchColumn($colnum);
	}
}
