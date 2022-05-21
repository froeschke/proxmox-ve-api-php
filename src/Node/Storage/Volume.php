<?php

namespace VineVax\PVE\Node\Storage;

use VineVax\PVE\Proxmox;

class Volume
{
    public function __construct(
        private string $node,
        private string $storage,
        private string $volume,
    ) { }

    public function get()
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/content/{$this->volume}")
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/storage/{$this->storage}/content/{$this->volume}", $options)
        );
    }

    public function put(array $options = [])
    {
        return Proxmox::json(
            Proxmox::put("nodes/{$this->node}/storage/{$this->storage}/content/{$this->volume}", $options)
        );
    }

    public function delete(array $options = [])
    {
        return Proxmox::json(
            Proxmox::delete("nodes/{$this->node}/storage/{$this->storage}/content/{$this->volume}", $options)
        );
    }
}
