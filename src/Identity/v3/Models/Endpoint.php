<?php declare (strict_types=1);

namespace OpenStack\Identity\v3\Models;

use OpenCloud\Common\Resource\AbstractResource;
use OpenCloud\Common\Resource\Creatable;
use OpenCloud\Common\Resource\Deletable;
use OpenCloud\Common\Resource\Updateable;

/**
 * @property \OpenStack\Identity\v3\Api $api
 */
class Endpoint extends AbstractResource implements Creatable, Updateable, Deletable
{
    /** @var string */
    public $id;

    /** @var string */
    public $interface;

    /** @var string */
    public $name;

    /** @var string */
    public $serviceId;

    /** @var string */
    public $region;

    /** @var array */
    public $links;

    /** @var string */
    public $url;

    protected $resourceKey = 'endpoint';
    protected $resourcesKey = 'endpoints';
    protected $aliases = ['service_id' => 'serviceId'];

    /**
     * {@inheritDoc}
     *
     * @param array $data {@see \OpenStack\Identity\v3\Api::postEndpoints}
     */
    public function create(array $data): Creatable
    {
        $response = $this->execute($this->api->postEndpoints(), $data);
        return $this->populateFromResponse($response);
    }

    /**
     * {@inheritDoc}
     */
    public function update()
    {
        $response = $this->executeWithState($this->api->patchEndpoint());
        $this->populateFromResponse($response);
    }

    /**
     * {@inheritDoc}
     */
    public function delete()
    {
        $this->execute($this->api->deleteEndpoint(), $this->getAttrs(['id']));
    }

    public function regionMatches(string $value): bool
    {
        return $this->region && $this->region == $value;
    }

    public function interfaceMatches(string $value): bool
    {
        return $this->interface && $this->interface == $value;
    }
}
