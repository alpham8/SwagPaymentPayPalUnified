<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace SwagPaymentPayPalUnified\SDK\Resources;

use SwagPaymentPayPalUnified\SDK\RequestType;
use SwagPaymentPayPalUnified\SDK\Services\ClientService;

class WebhookResource
{
    const WEBHOOK_RESOURCE = 'notifications/webhooks';

    /** @var ClientService $client */
    private $client;

    /**
     * @param ClientService $client
     */
    public function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->client->sendRequest(RequestType::GET, self::WEBHOOK_RESOURCE);
    }

    /**
     * @param string $url
     * @param array $events
     * @return array
     */
    public function create($url, array $events)
    {
        $data = [
            'url' => $url,
            'event_types' => []
        ];

        foreach ($events as $event) {
            $data['event_types'][] = [
                'name' => $event
            ];
        }

        return $this->client->sendRequest(RequestType::POST, self::WEBHOOK_RESOURCE, $data);
    }
}