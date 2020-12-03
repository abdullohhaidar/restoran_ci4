<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\Pelanggan_M;



class Daftar extends BaseController
{

	public function index()
	{
		$pager	= \Config\Services::pager();
		$model	= new Kategori_M();
		$modelmenu = new Menu_M();
		
		$menu = $modelmenu;

		$data = [
			'judul'		=> 'KATEGORI',
			'kategori'	=> $model->paginate(),
			'menu'		=> $menu->paginate(3, 'page'),
			'pager'		=> $menu->pager
		];
		return view('daftar', $data);
    }
    
    public function insert()
	{
		if (isset($_POST['password'])) {
			$data = [
                'pelanggan' 	=> $_POST['pelanggan'],
                'alamat' 		=> $_POST['alamat'],
                'telp' 	    	=> $_POST['telp'],
				'email' 		=> $_POST['email'],
				'password' 		=> $_POST['password'],
				'konfirmasi' 	=> $_POST['konfirmasi'],
				'aktif' 	=> 1
			];

			$model = new Pelanggan_M();

			if ($model->insert($data)===false) {
				$error = $model->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(base_url("/daftar/create"));
			} else {
				return redirect()->to(base_url("/loginpelanggan"));
			}
		}
	}

	

	//--------------------------------------------------------------------

}
