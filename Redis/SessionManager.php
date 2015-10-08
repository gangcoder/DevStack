<?php 
	/**
	* SessionManager
	*/
	class SessionManager
	{
		private $redis;
		private $sessionSavePath;
		private $sessionName;
		private $sessionExpireTime = 30;

		function __construct()
		{
			$this->redis = new Predis\client();
			$this->redis->connect('127.0.0.1', 6379);

			$retval = session_set_save_handler(
				array($this, "open"),
				array($this, "close"),
				array($this, "read"),
				array($this, "write"),
				array($this, "destroy"),
				array($this, "gc")
				);

			session_start();
		}

		public function open($patn, $name){
			return true;
		}

		public function close()
		{
			return true;
		}

		public function read($id)
		{
			$value = $this->redis->get($id);
			if ($value) {
				return $value;
			}else{
				return '';
			}
		}

		public function write($id, $data)
		{
			var_dump($id);
			if ($this->redis->set($id, $data)) {
				$this->redis->expire($id, $this->sessionExpireTime);
				return true;
			}
			return false;
		}

		public function destroy($id)
		{
			if ($this->redis->delete($id)) {
				return true;
			}
			return false;
		}

		public function gc($maxlifetime)
		{
			return true;
		}

		public function __destruct()
		{
			session_write_close();
		}
	}
 ?>