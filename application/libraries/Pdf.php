<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        // print_r(__FILE__."/../../media/front/images/bg-1.png");
        // die();
        // directory
        $file_path = dirname(__FILE__).DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."media".DIRECTORY_SEPARATOR ."front".DIRECTORY_SEPARATOR ."images".DIRECTORY_SEPARATOR ."bg-1.jpg";

        // $this->Image(base_url()."media/front/images/bg-1.jpg", 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);;
        $this->Image($file_path, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);;
//        $img_file = K_PATH_IMAGES.'image_demo.jpg';
//        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}
/*Author:Tutsway.com */  
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */