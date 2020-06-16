<?php

session_write_close();
ignore_user_abort(false);
set_time_limit(40);

try {
	// connect to the db ($mysqli)
	include_once 'include/config.php';

	
	if (isset($_GET['last_time']) && $_GET['last_time']>0){
		$time_ini = $_GET['last_time'];
	}else{
		$time_ini = time();
	}

	
	while (true) {


		$result = $mysqli -> query('SELECT * FROM chat WHERE time > '.$time_ini.' ORDER BY time ASC');

		if ($result && $result->num_rows) {
			
			$output = array();
			$lastId = 0;
			
			while ($row = $result->fetch_object()){
				$output[] = array(
					'usuario' => $row->usuario, 
					'mensaje' => $row->mensaje,
					'color' => $row->color,
					'time' => $row->time
				);
			}			

			echo json_encode(array('status' => true,'data' => $output));
			exit;
		}



		// db queries are heavy. So 2 seconds
		sleep(1);
	}

} catch (Exception $e) {

	exit(
		json_encode(
			array('status' => false,'data' => $e -> getMessage())
		)
	);

}