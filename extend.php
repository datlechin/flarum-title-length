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

use Flarum\Discussion\DiscussionValidator;
use Flarum\Extend;

return [

    (new Extend\Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js'),

    new Extend\Locales(__DIR__ . '/locale'),

    (new Extend\Validator(DiscussionValidator::class))
        ->configure(AddDiscussionValidation::class),

    (new Extend\Settings())
        ->default('datlechin-title-length.limit', true)
        ->default('datlechin-title-length.min', 3)
        ->default('datlechin-title-length.max', 80),
];
