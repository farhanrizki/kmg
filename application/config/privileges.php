<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	$config['privileges']	= array(
		'nama class' => array(
			'nama method dalam class' => array('user group 1', 'user group 2')
		),
	);
	
	--- atau ---
	
	$config['privileges']['lokasi']['get_semua_lokasi'] = array('*');
	
	-- user group --
	[*]. semua, termasuk yg tidak login
	[1]. superadmin
	[2]. adminkdr
    [3]. staffkdr
    [4]. kabagkdr
    [5]. nonadmin
*/

//Privileges menu home
$config['privileges']['home']['index'] = array('*');

//Privileges menu auth
$config['privileges']['auth']['index']  = array('*');
$config['privileges']['auth']['login']  = array('*');
$config['privileges']['auth']['logout'] = array('*');

//Privileges menu register
$config['privileges']['register']['index'] = array('*');
$config['privileges']['register']['input'] = array('*');

//Privileges menu forgot password
$config['privileges']['forgot_password']['index'] = array('*');
$config['privileges']['forgot_password']['cek'] = array('*');

//Privileges menu staff app
$config['privileges']['staff_app']['index']       = array('1','2','3','4');
$config['privileges']['staff_app']['tambahstaff'] = array('1','2','3','4');
$config['privileges']['staff_app']['updatestaff'] = array('1','2','3','4');
$config['privileges']['staff_app']['hapusstaff']  = array('1','2','3','4');
$config['privileges']['staff_app']['import']      = array('1','2','3','4');

//Privileges menu bagian
$config['privileges']['bagian']['index']        = array('1','2','3','4');
$config['privileges']['bagian']['tambahbagian'] = array('1','2','3','4');
$config['privileges']['bagian']['updatebagian'] = array('1','2','3','4');
$config['privileges']['bagian']['hapusbagian']  = array('1','2','3','4');

//Privileges menu bidang
$config['privileges']['bidang']['index']        = array('1','2','3','4');
$config['privileges']['bidang']['tambahbidang'] = array('1','2','3','4');
$config['privileges']['bidang']['updatebidang'] = array('1','2','3','4');
$config['privileges']['bidang']['hapusbidang']  = array('1','2','3','4');

//Privileges menu self learning
$config['privileges']['self_learning']['index']          = array('1','2','3','4');
$config['privileges']['self_learning']['tambahlearning'] = array('1','2','3','4');
$config['privileges']['self_learning']['updatelearning'] = array('1','2','3','4');
$config['privileges']['self_learning']['hapuslearning']  = array('1','2','3','4');

//Privileges menu nilai self learning
$config['privileges']['nilai_learning']['index']      = array('1','2','3','4');
$config['privileges']['nilai_learning']['import']     = array('1','2','3','4');
$config['privileges']['nilai_learning']['hapusnilai'] = array('1','2','3','4');


//Privileges menu error
$config['privileges']['error']['index'] = array('*');
$config['privileges']['error']['e404']  = array('*');
$config['privileges']['error']['e403']  = array('*');

$config['privileges']['pagenotfound']['index'] = array('*');

/* End of file config.php */
/* Location: ./application/config/config.php */