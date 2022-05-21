<?php

namespace VineVax\PVE\Node\Storage;

use VineVax\PVE\Exceptions\NotImplementedException;
use VineVax\PVE\Proxmox;

class Storage
{
    public function __construct(
        private string $node,
        private ?string $storage,
    ) { }

    public function content(): Content
    {
        return new Content($this->node, $this->storage);
    }

    public function fileRestore(): FileRestore
    {
        return new FileRestore($this->node, $this->storage);
    }

    public function get()
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage")
        );
    }

    public function downloadUrl(array $options = [])
    {
        return Proxmox::json(
            Proxmox::post("nodes/{$this->node}/storage/{$this->storage}/download-url", $options)
        );
    }

    public function prunebackups(): Prunebackups
    {
        return new Prunebackups($this->node, $this->storage);
    }

    public function rrd()
    {
        throw new NotImplementedException();
    }

    public function rrddata(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/rrddata", $options)
        );
    }

    public function status()
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/status")
        );
    }

    public function upload()
    {
        throw new NotImplementedException();
    }
}
