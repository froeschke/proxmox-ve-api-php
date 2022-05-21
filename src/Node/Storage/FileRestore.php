<?php

namespace VineVax\PVE\Node\Storage;

use VineVax\PVE\Proxmox;

class FileRestore
{
    public function __construct(
        private string $node,
        private string $storage,
    ) { }

    public function download(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/file-restore/download", $options)
        );
    }

    public function list(array $options = [])
    {
        return Proxmox::json(
            Proxmox::get("nodes/{$this->node}/storage/{$this->storage}/file-restore/list", $options)
        );
    }
}
