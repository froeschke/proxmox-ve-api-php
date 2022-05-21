<?php

namespace VineVax\PVE\Node\Storage;

use VineVax\PVE\Proxmox;

class Content
{
    public function __construct(
        private string $node,
        private string $storage,
    ) { }

    public function get(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/content", $options)
        );
    }

    public function post(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/storage/{$this->storage}/content", $options)
        );
    }

    public function volume(string $volume)
    {
        return new Volume(
            $this->node,
            $this->storage,
            $volume
        );
    }
}
