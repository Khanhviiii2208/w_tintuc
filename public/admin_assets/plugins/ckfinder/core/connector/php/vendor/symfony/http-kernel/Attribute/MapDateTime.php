<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// namespace Symfony\Component\HttpKernel\Attribute;

/**
 * Controller parameter tag to configure DateTime arguments.
 */
// #[\Attribute(\Attribute::TARGET_PARAMETER)]
// class MapDateTime
// {
//     public function __construct(
//         public readonly string $format = null
//     ) {
//     }
// }<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Attribute;

/**
 * Controller parameter tag to configure DateTime arguments.
 */
#[\Attribute(\Attribute::TARGET_PARAMETER)]
class MapDateTime
{
    public function __construct(
        public ?string $format = null
    ) {
    }
}