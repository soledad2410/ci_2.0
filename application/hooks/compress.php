<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function compress()
{
	$CI =& get_instance();
	$buffer = $CI->output->get_output();
	 $search = array(
        //'([^:][\/]{2}[^\n]*)', 
        '(\s[\/]{2}[^\n]*)', //không bat loi truong hop viet lien comment because: <!DOCTYPE html PUBLIC "-//W3C//DTD ....
		'/\n/',
        '/\t/',
        '/\r/',			
		// 	'/(\s)+/s',	//	 shorten multiple whitespace sequences
        '/\s{3}+/',
        '/\<!--(.|\s)*?--\>/' // Remove comment html ,
      );
 
	 $replace = array(
        ' ',
		'',
        '',
        '',	
	// 	'$1',
        ' ',
        ''
      );



	$buffer = preg_replace($search, $replace, $buffer);
    $CI->output->set_output($buffer);
	$CI->output->_display();
}
 
/* End of file compress.php */
?>