<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dt_feeder
{
	
	private $ci;
	private $columns;
	private $table;

	private $filter;
	private $offset;
	private $order;
	private $limit;

	public function __construct()
	{
		//$this->ci =& get_instance();
		if($CI =& get_instance())
 		{
 			$this->input	= $CI->input;
			$this->load		= $CI->load;
			$this->config	= $CI->config;
			$this->lang		= $CI->lang;

			$CI->load->library('session');
			$this->session	= $CI->session;

			$CI->load->model('m_feeder');
			$this->m_feeder = $CI->m_feeder;

			$this->limit = $this->config->item('limit');
			$this->filter = $this->config->item('filter');
			$this->order = $this->config->item('order');
			$this->offset = $this->config->item('offset');

			return;
		}
	}

	public function select($columns)
	{
		/*foreach($this->explode(',', $columns) as $val)
		{
			$column = trim(preg_replace('/(.*)\s+as\s+(\w*)/i', '$2', $val));
			$column = preg_replace('/.*\.(.*)/i', '$1', $column); // get name after `.`
			$this->columns[] =  $column;
			$this->select[$column] =  trim(preg_replace('/(.*)\s+as\s+(\w*)/i', '$1', $val));
		}*/
		//$this->ci->db->select($columns);
		$this->columns = $columns;
		return $this;
	}

	public function from($table)
	{
		$this->table = $table;
		return $this;
	}

	public function generate()
	{
		//echo $this->columns."<br />".$this->table;
		return $this->proses();
	}

	public function proses()
	{
		$temp_column = explode(',', $this->columns);
		$column_array = array();
		foreach ($temp_column as $key) {
			$column = trim(preg_replace('/(.*)\s+as\s+(\w*)/i', '$2', $key));
			$column = preg_replace('/.*\.(.*)/i', '$1', $column); // get name after `.`
			$column_array[] =  $column;
		}
		var_dump($temp_column);
		$temp_search = $this->input->get('search');
		$sSearch = trim($temp_search['value']);

		$iStart = $this->input->get('start');
		$iLength = $this->input->get('length');

		$this->limit = $iLength;
		$this->offset = $iStart?$iStart : 0;
		$temp_total = $this->m_feeder->count_all($this->session->userdata('token'),$this->table,$this->filter);
		$totalData = $temp_total['result'];
		$totalFiltered = $totalData;

		if ($sSearch!='') {
			//$this->filter = "nm_kk like '%".$sSearch."%' OR id_kk=".$sSearch;
			$this->filter = "nm_kk like '%".$sSearch."%'";
			$temp_rec = $this->m_feeder->getrset($this->session->userdata('token'),
												$this->table, $this->filter,
												'', $this->limit,$this->offset
						);
			$totalFiltered = count($temp_rec['result']);
		} else {
			$temp_rec = $this->m_feeder->getrset($this->session->userdata('token'),
												$this->table, $this->filter,
												10, $this->limit,$this->offset
						);
		}
		$temp_error_code = $temp_rec['error_code'];
		$temp_error_desc = $temp_rec['error_desc'];

		if (($temp_error_code==0) && ($temp_error_desc=='')) {
			$temp_data = array();
			$i=0;
			foreach ($temp_rec['result'] as $key) {
				$temps = array();
				foreach ($column_array as $value) {
					//$temps[] = ++$i;
					//$temps[] = '';
					$temps[] = $key[$value];
					//var_dump($value);
				}
				$temp_data[] = $temps;
				//var_dump($key);
			}
			//var_dump($temp_data);
			//var_dump($temps);
			$temp_output = array(
									'draw' => intval($this->input->get('draw')),
									'recordsTotal' => intval( $totalData ),
									'recordsFiltered' => intval( $totalFiltered ),
									'data' => $temp_data
				);
			//echo json_encode($temp_output);
			return json_encode($temp_output);
		}
	}

	


}