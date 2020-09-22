<?php

namespace App\GraphQL\Directives;

use Log;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class UpdateProjectInputValidationDirective extends ValidationDirective 
{
	public function rules(): array
	{
		// $version = $this->args['version'];
		$id = $this->args['id'];
		return [
			// 'id' => [
			// 	'required',
			// 	Rule::exists('projects','id')->where(function ($query) use ($version) {
			// 		$query->where('version', $version);
			// 	}),
			// ],
			'version' => [
				'required',
				Rule::exists('projects','version')->where(function ($query) use ($id) {
					$query->where('id', $id);
				}),
			],
		];
	}	

	public function messages(): array
	{
		return [
			// 'id.exists' => 'The version in the server does not match your copy',
			'version.exists' => 'The version in the server does not match your copy',
		];
	}
}
