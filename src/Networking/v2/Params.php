<?php declare (strict_types=1);

namespace OpenStack\Networking\v2;

use OpenCloud\Common\Api\AbstractParams;

class Params extends AbstractParams
{
    public function urlId($type): array
    {
        return array_merge(parent::id($type), [
            'required' => true,
            'location' => self::URL,
        ]);
    }

    public function shared(): array
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::JSON,
            'description' => 'Indicates whether this network is shared across all tenants',
        ];
    }

    public function adminStateUp(): array
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'admin_state_up',
            'description' => 'The administrative state of the network',
        ];
    }

    public function networkId(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'required'    => true,
            'sentAs'      => 'network_id',
            'description' => 'The ID of the attached network',
        ];
    }

    public function ipVersion(): array
    {
        return [
            'type'        => self::INT_TYPE,
            'required'    => true,
            'sentAs'      => 'ip_version',
            'description' => 'The IP version, which is 4 or 6',
        ];
    }

    public function cidr(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'required'    => true,
            'sentAs'      => 'cidr',
            'description' => 'The CIDR',
        ];
    }

    public function tenantId(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'sentAs'      => 'tenant_id',
            'description' => 'The ID of the tenant who owns the network. Only administrative users can specify a tenant ID other than their own. You cannot change this value through authorization policies',
        ];
    }

    public function gatewayIp(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'sentAs'      => 'gateway_ip',
            'description' => 'The gateway IP address',
        ];
    }

    public function enableDhcp(): array
    {
        return [
            'type'        => self::BOOL_TYPE,
            'sentAs'      => 'enable_dhcp',
            'description' => 'Set to true if DHCP is enabled and false if DHCP is disabled.',
        ];
    }

    public function dnsNameservers(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'sentAs'      => 'dns_nameservers',
            'description' => 'A list of DNS name servers for the subnet.',
        ];
    }

    public function allocationPools(): array
    {
        return [
            'type'        => self::ARRAY_TYPE,
            'sentAs'      => 'allocation_pools',
            'items'       => [
                'type'       => self::OBJECT_TYPE,
                'properties' => [
                    'start' => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'The start address for the allocation pools',
                    ],
                    'end'   => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'The end address for the allocation pools',
                    ],
                ],
            ],
            'description' => 'The start and end addresses for the allocation pools',
        ];
    }

    public function hostRoutes(): array
    {
        return [
            'type'        => self::ARRAY_TYPE,
            'sentAs'      => 'host_routes',
            'items'       => [
                'type'       => self::OBJECT_TYPE,
                'properties' => [
                    'destination' => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'Destination for static route',
                    ],
                    'nexthop'     => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'Nexthop for the destination',
                    ],
                ],
            ],
            'description' => 'A list of host route dictionaries for the subnet',
        ];
    }

    public function statusQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'description' => 'Allows filtering by port status.',
            'enum'        => ['ACTIVE', 'DOWN'],
        ];
    }

    public function displayNameQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'display_name',
            'description' => 'Allows filtering by port name.',
        ];
    }

    public function adminStateQuery(): array
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'admin_state',
            'description' => 'Allows filtering by admin state.',
        ];
    }

    public function networkIdQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'network_id',
            'description' => 'Allows filtering by network ID.',
        ];
    }

    public function tenantIdQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'tenant_id',
            'description' => 'Allows filtering by tenant ID.',
        ];
    }

    public function deviceOwnerQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'device_owner',
            'description' => 'Allows filtering by device owner.',
        ];
    }

    public function macAddrQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'mac_address',
            'description' => 'Allows filtering by MAC address.',
        ];
    }

    public function portIdQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'port_id',
            'description' => 'Allows filtering by port UUID.',
        ];
    }

    public function secGroupsQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'security_groups',
            'description' => 'Allows filtering by device owner. Format should be a comma-delimeted list.',
        ];
    }

    public function deviceIdQuery(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'device_id',
            'description' => 'The UUID of the device that uses this port. For example, a virtual server.',
        ];
    }

    public function macAddr(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'mac_address',
            'description' => 'The MAC address. If you specify an address that is not valid, a Bad Request (400) status code is returned. If you do not specify a MAC address, OpenStack Networking tries to allocate one. If a failure occurs, a Service Unavailable (503) response code is returned.',
        ];
    }

    public function fixedIps(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'fixed_ips',
            'description' => 'If you specify only a subnet UUID, OpenStack Networking allocates an available IP from that subnet to the port. If you specify both a subnet UUID and an IP address, OpenStack Networking tries to allocate the address to the port.',
        ];
    }

    public function subnetId(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'subnet_id',
            'description' => 'If you specify only a subnet UUID, OpenStack Networking allocates an available IP from that subnet to the port. If you specify both a subnet UUID and an IP address, OpenStack Networking tries to allocate the address to the port.',
        ];
    }

    public function ipAddress(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'ip_address',
            'description' => 'If you specify both a subnet UUID and an IP address, OpenStack Networking tries to allocate the address to the port.',
        ];
    }

    public function secGroupIds(): array
    {
        return [
            'type'     => self::ARRAY_TYPE,
            'location' => self::JSON,
            'items'    => [
                'type'        => self::STRING_TYPE,
                'description' => 'The UUID of the security group',
            ],
        ];
    }

    public function allowedAddrPairs(): array
    {
        return [
            'type'        => self::ARRAY_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'allowed_address_pairs',
            'description' => 'Address pairs extend the port attribute to enable you to specify arbitrary mac_address/ip_address(cidr) pairs that are allowed to pass through a port regardless of the subnet associated with the network.',
            'items'       => [
                'type'        => self::OBJECT_TYPE,
                'description' => 'A MAC addr/IP addr pair',
                'properties'  => [
                    'ipAddress'  => [
                        'sentAs'   => 'ip_address',
                        'type'     => self::STRING_TYPE,
                        'location' => self::JSON,
                    ],
                    'macAddress' => [
                        'sentAs'   => 'mac_address',
                        'type'     => self::STRING_TYPE,
                        'location' => self::JSON,
                    ],
                ],
            ],
        ];
    }

    public function deviceOwner(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'device_owner',
            'description' => 'The UUID of the entity that uses this port. For example, a DHCP agent.',
        ];
    }

    public function deviceId(): array
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'device_id',
            'description' => 'The UUID of the device that uses this port. For example, a virtual server.',
        ];
    }
}
