<?php namespace App\Controllers;

use App\Models\ImagesModel;

class Home extends BaseController
{
	public function index()
	{
		return view('upload');
	}

	public function imageUpload()
    {
        $imageModel = new ImagesModel();
        helper(['text','inflector']);
        $file = $this->request->getFile('file');
        $path = 'public/uploads';
        $name = convert_accented_characters(underscore($file->getName()));
        $file->move(ROOTPATH . $path, $name);

        $data = [
            'image_name' => $name,
            'image_url' => $path . '/' . $name,
            'image_type' => $file->getClientMimeType()
        ];

        $insert = $imageModel->insert($data);
        $errors = $imageModel->errors();
        if(!$errors){
            return $this->response->setJSON([
                'message' => 'Resim yükleme işlemi başarılı bir şekilde tamamlandı',
                'data' => [
                    'id' => $insert,
                    'url' => $data['image_url'],
                    'name' => $data['image_name']
                ]
            ]);
        }

    }
}
