<?php

/*
 * This file is part of datlechin/flarum-title-length.
 *
 * Copyright (c) 2022 Ngo Quoc Dat.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Datlechin\TitleLength;

use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Validation\Validator;
use Symfony\Contracts\Translation\TranslatorInterface;

class AddDiscussionValidation
{
    /**
     * @var SettingsRepositoryInterface
     */
    protected $translator;


    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param Validator $validator
     */
    public function __invoke($flarumValidator, Validator $validator)
    {
        $rules = $validator->getRules();

        if (!array_key_exists('title', $rules)) {
            return;
        }

        if ($this->settings->get('datlechin-title-length.limit')) {
            $rules['title'] = array_map(function (string $rule) {
                if (\Illuminate\Support\Str::startsWith($rule, 'min:')) {
                    return 'min:' . $this->settings->get('datlechin-title-length.min');
                }

                if (\Illuminate\Support\Str::startsWith($rule, 'max:')) {
                    return 'max:' . $this->settings->get('datlechin-title-length.max');
                }

                return $rule;
            }, $rules['title']);
        }

        $validator->setRules($rules);
    }
}
