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

use Flarum\Api\Schema\Str;
use Flarum\Settings\SettingsRepositoryInterface;

class OverrideTitleLength
{
    public function __construct(
        protected SettingsRepositoryInterface $settings,
    ) {
    }

    public function __invoke(Str $field): Str
    {
        if (! (bool) $this->settings->get('datlechin-title-length.limit')) {
            return $field;
        }

        $kept = array_values(array_filter($field->getRules(), function (array $r): bool {
            return ! (is_string($r['rule'])
                && (str_starts_with($r['rule'], 'min:') || str_starts_with($r['rule'], 'max:')));
        }));

        $field->rules([], true, true);

        foreach ($kept as $r) {
            $field->rule($r['rule'], $r['condition']);
        }

        return $field
            ->minLength((int) $this->settings->get('datlechin-title-length.min'))
            ->maxLength((int) $this->settings->get('datlechin-title-length.max'));
    }
}
