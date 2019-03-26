<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\Payment\Security;

use EasyWeChat\Payment\Application;
use EasyWeChat\Payment\Security\Client;
use EasyWeChat\Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * Make Application.
     *
     * @param array $config
     *
     * @return \EasyWeChat\Payment\Application
     */
    

    public function testGetPublicKey()
    {
        $app = $this->makeApp();

        $client = $this->mockApiClient(Client::class, ['safeRequest'], $app)->makePartial();

        $client->expects()->safeRequest('https://fraud.mch.weixin.qq.com/risk/getpublickey', [
            'sign_type' => 'MD5',
        ])->andReturn('mock-result');

        $this->assertSame('mock-result', $client->getPublicKey());
    }
}
