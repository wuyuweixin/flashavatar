<?php
/**
 * ͼƬ�ϴ����� PHP
 */

$rs = array();

switch(addcslashes($_GET['action'])){

	//�ϴ�ͷ��
	case 'uploadavatar':
		$input = file_get_contents('php://input');
		$data = explode('--------------------', $input);
		//data[0] Ϊ���ź��ͼƬ �����С�Ļ�ȡ����
		@file_put_contents('./avatar_small.jpg', $data[0]);
		//data[1] Ϊ�ϴ���ԭͼ
		@file_put_contents('./avatar.jpg', $data[0]);
		//ͨ�������ź��ͼƬ������������ ����ʵ�ְ��������Ų����ּ��еȲ���
        $core->cutphoto($big_file, $small_file, 50, 50);
        
		$rs['status'] = 1;
	break;

}

echo json_encode($rs);

?>
