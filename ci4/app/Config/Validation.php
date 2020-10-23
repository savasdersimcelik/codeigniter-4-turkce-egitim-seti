<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $user_new = [
		'name' => [
			'rules' => 'alpha_space|max_length[100]|min_length[5]',
			'errors' => [
				'alpha_space' => 'İsim soyisim alfabetik karakter olabilir.',
				'max_length' => 'İsim soyisim en fazla 100 karakter olabilir.',
				'min_length' => 'İsim soyisim en az 5 karakter olabilir.',
			]
		],
		'email' => [
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => 'Eposta Bu alan zorunludur.',
				'valid_email' => 'Girmiş olduğunuz değer eposta kurallarına uygun değildir.',
			]
		],
		'username' => [
			'rules' => 'required|alpha|max_length[25]|min_length[3]',
			'errors' => [
				'required' => 'Kullanıcı Adı zorunlu alandır.',
				'alpha' => 'Kullanıcı Adı sadece alfabetik karakter olabilir.',
				'max_length' => 'İsim soyisim en fazla 25 karakter olabilir.',
				'min_length' => 'İsim soyisim en az 3 karakter olabilir.',
			]
		],
		'phone' => [
			'rules' => 'numeric|max_length[11]|min_length[10]',
			'errors' => [
				'numeric' => 'Telefon Numarası sadece rakamlardan oluşabilir.',
				'max_length' => 'Telefon numarası en fazla 11 karakter olabilir.',
				'min_length' => 'Telefon numarası en az 10 karakter olabilir',
			]
		]
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
