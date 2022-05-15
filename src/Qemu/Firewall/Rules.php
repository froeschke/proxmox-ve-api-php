<?php

namespace VineVax\PVE\Qemu\Firewall;

use VineVax\PVE\Proxmox;
use VineVax\PVE\Qemu\Base;

class Rules
{
    public function __construct(
        public string $node,
        public int $vmid,
        public ?int $pos
    ) {}

    public function get(array $options = [])
    {
        if ($this->pos) {
            return Proxmox::json(
                Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/firewall/rules/{$this->pos}", $options)
            );
        }

        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/qemu/{$this->vmid}/firewall/rules", $options)
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/qemu/{$this->vmid}/firewall/rules", $options)
        );
    }

    public function put(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/qemu/{$this->vmid}/firewall/rules/{$this->pos}", $options)
        );
    }

    public function delete(array $options = [])
    {
        return Proxmox::json(
            Proxmox::delete("nodes/{$this->node}/qemu/{$this->vmid}/firewall/rules/{$this->pos}", $options)
        );
    }
}
