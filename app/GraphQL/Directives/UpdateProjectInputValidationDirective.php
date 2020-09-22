<?php

namespace App\GraphQL\Directives;

use Log;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;

class UpdateProjectInputValidationDirective extends BaseDirective 
{
	public function rules(): array
	{
		Log::info(['$this->args ',json_encode($this->args)]);
		return [
			'id' => [
				'required',
				Rule::exists('projects')->where(function ($query) use ($version) {
					$query->where('version', $version);
				}),
			]
		];
	}	

	public function messages(): array
	{
		return [
			'id' => 'The version in the server does not match your copy'
		];
	}
}
