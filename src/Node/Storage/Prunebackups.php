<?php

namespace VineVax\PVE\Node\Storage;

use VineVax\PVE\Proxmox;

class Prunebackups
{
    public function __construct(
        private string $node,
        private string $storage,
    ) { }

    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/prunebackups", $options)
        );
    }

    public function delete(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/storage/{$this->storage}/prunebackups", $options)
        );
    }
}
