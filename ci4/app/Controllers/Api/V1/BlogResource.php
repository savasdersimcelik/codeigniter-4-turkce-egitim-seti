<?php 

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class BlogResource extends ResourceController
{

	protected $modelName = 'App\Models\Photos';
	protected $format    = 'json';


	public function new()
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		$title = $this->request->getGet('title');
		$desc = $this->request->getGet('desc');

		array_push($blogs, [
			'id' => 6,
			'title' => $title,
			'desc' => $desc
		]);

		return $this->respond($blogs);

	}

	public function create()
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		$title = $this->request->getPost('title');
		$desc = $this->request->getPost('desc');

		array_push($blogs, [
			'id' => 6,
			'title' => $title,
			'desc' => $desc
		]);

		return $this->respond($blogs);
	}

	public function index()
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		return $this->respond($blogs);

	}

	public function show($id = null)
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		return $this->respond($blogs[$id]);

	}

	public function edit($id = null)
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		$title = $this->request->getGet('title');
		$desc = $this->request->getGet('desc');

		$blogs[$id] = [
			'id' => $id,
			'title' => $title,
			'desc' => $desc
		];

		return $this->respond($blogs);

	}

	public function update($id = null)
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		$data = $this->request->getJSON();

		$blogs[$id] = [
			'id' => $id,
			'title' => $data->title,
			'desc' => $data->desc
		];

		return $this->respond($blogs);
	}

	public function delete($id = null)
	{
		$blogs = [
			['id' => 0, 'title' => 'Blog 0', 'desc' => 'Blog 0 Özet'],
			['id' => 1, 'title' => 'Blog 1', 'desc' => 'Blog 1 Özet'],
			['id' => 2, 'title' => 'Blog 2', 'desc' => 'Blog 2 Özet'],
			['id' => 3, 'title' => 'Blog 3', 'desc' => 'Blog 3 Özet'],
			['id' => 4, 'title' => 'Blog 4', 'desc' => 'Blog 4 Özet'],
			['id' => 5, 'title' => 'Blog 5', 'desc' => 'Blog 5 Özet'],
		];

		unset($blogs[$id]);

		return $this->respond($blogs);

	}
}