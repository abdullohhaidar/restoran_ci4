<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class LoginPelanggan extends BaseController
{
	public function index()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$model = new Pelanggan_M();
			$pelanggan = $model->where(['email' => $email, 'aktif' => 1])->first();
	

			if (empty($pelanggan)) {
				$data['info'] = "Email salah";
			} else {
				if ($password == $pelanggan['password']) {
					
					$this->setSession($pelanggan);
					
				 	return redirect()->to(base_url("/home"));
				} else {
					$data['info'] = "Password salah";
				}
			}
			
			
		} else {
			
		}
		
		
		return view('loginPelanggan',$data);
	}

	public function setSession($pelanggan)
	{
		$data = [
			'pelanggan' => $pelanggan['pelanggan'],
			'email' => $pelanggan['email'],
			'loggedIn' => true
		];
		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/home'));
	}

	//--------------------------------------------------------------------

}
