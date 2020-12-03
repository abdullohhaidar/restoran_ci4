<?php namespace App\Controllers;

use App\Controllers\BaseController;

use App\Controllers\Admin\Kategori;
use App\Models\Kategori_M;
use App\Models\Menu_M;


class Home extends BaseController
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
		return view('home', $data);
	}

	public function select($id)
	{
		$pager = \Config\Services::pager();

		$model	= new Kategori_M();
		$modelMenu = new Menu_M();

		$jumlah = $modelMenu->where('idkategori', $id)->findAll();
		$count = count($jumlah);

		$tampil = 3;
		$mulai = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
		}

		$menu = $modelMenu->where('idkategori', $id)->findAll($tampil, $mulai);

		$data = [
			'judul'		=> 'DAFTAR MENU',
			'kategori'	=> $model->findAll(),
			'menu'		=> $menu,
			'pager'		=> $pager,
			'tampil'	=> $tampil,
			'total'		=> $count
		];

		return view('cari', $data);
	}

	//--------------------------------------------------------------------

}
