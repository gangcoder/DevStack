<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__.'/src/Autoloader.php';

Predis\Autoloader::register();

// $client = new Predis\client();
// $client->set('foo', 'bar');
// $value = $client->get('foo');
// $value = $client->get('ab');
// echo "$value";