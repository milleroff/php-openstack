<?php

namespace OpenStack\Test\Subneting\v2\Models;

use GuzzleHttp\Psr7\Response;
use OpenStack\Networking\v2\Api;
use OpenStack\Networking\v2\Models\Port;
use OpenStack\Test\TestCase;

class PortTest extends TestCase
{
    const NETWORK_ID = 'a87cc70a-3e15-4acf-8205-9b711a3531b7';
    const PORT_ID = 'a87cc70a-3e15-4acf-8205-9b711a3531b8';

    /** @var Port */
    private $port;

    public function setUp()
    {
        parent::setUp();

        $this->rootFixturesDir = dirname(__DIR__);

        $this->port = new Port($this->client->reveal(), new Api());
        $this->port->id = self::PORT_ID;
        $this->port->networkId = self::NETWORK_ID;
    }

    public function test_it_updates()
    {
        $opts = [
            'name'         => 'newName',
            'networkId'    => self::NETWORK_ID,
            'adminStateUp' => false,
        ];

        $expectedJson = ['port' => [
            'name'           => $opts['name'],
            'network_id'     => $opts['networkId'],
            'admin_state_up' => $opts['adminStateUp'],
        ]];

        $this->setupMock('PUT', 'v2.0/ports/' . self::PORT_ID, $expectedJson, [], 'GET_port');

        $this->port->adminStateUp = false;
        $this->port->name = 'newName';
        $this->port->update();
    }

    public function test_it_retrieves()
    {
        $this->setupMock('GET', 'v2.0/ports/' . self::PORT_ID, null, [], new Response(204));

        $this->port->retrieve();
    }

    public function test_it_deletes()
    {
        $this->setupMock('DELETE', 'v2.0/ports/' . self::PORT_ID, null, [], new Response(204));

        $this->port->delete();
    }
}
