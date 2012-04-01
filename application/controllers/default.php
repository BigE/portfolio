<?php
/**
 * Description of default
 *
 * @author eric
 */
class DefaultController extends \Portfolio\Controller\Base
{
	protected $_layout = 'general.tpl';

	public function contact()
	{
		if (\SiTech\Filter::isPost()) {
			$filter = new \SiTech\Filter(\SiTech\Filter::INPUT_POST);
			$name = $filter->input('name', \SiTech\Filter::FILTER_SANITIZE_STRING);
			$this->_view->assign('name', $name);
			$email = $filter->input('email', \SiTech\Filter::FILTER_VALIDATE_EMAIL);
			$this->_view->assign('email', $email);
			$message = $filter->input('message', \SiTech\Filter::FILTER_SANITIZE_STRING);
			$this->_view->assign('message', $message);
			$cc = $filter->input('cc', \SiTech\Filter::FILTER_VALIDATE_BOOLEAN);

			if (empty($name)) {
				$this->_errors['name'] = 'Please enter your name so I know who you are.';
			}

			if (empty($email) || $email === false) {
				$this->_errors['email'] = 'Please use your e-mail address so I can reply to you.';
			}

			if (empty($message)) {
				$this->_errors['message'] = 'Enter a message... please?';
			}

			if (empty($this->_errors)) {
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: $name <$email>\r\n";
				if (!empty($cc)) {
					$headers .= "Cc: $name <$email>\r\n";
				}
				$headers .= "Reply-To: $name <$email>\r\n";
				$headers .= "X-Mailer: PHP/".phpversion();
				$body = "Dear Eric,<br /><br />$name has contacted you from your portfolio!<hr />$message";
				$config = \Portfolio\ConfigParser::singleton();
				mail($config->get('base', 'email'), 'Portfolio Contact', $body, $headers);
				if ($this->_isXHR) echo '1';
				return(false);
			}
		}
	}

	public function index()
	{
	}
}
