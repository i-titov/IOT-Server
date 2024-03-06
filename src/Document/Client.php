<?php

namespace App\Document;
use App\Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="client")
 */
#[MongoDB\Document]

class Client extends User
{
    #[MongoDB\Field(type: 'collection')]
    private ?string $videos;
    #[MongoDB\Field(type: 'collection')]
    private ?string $devices;

    public function setNameDevice(string $name_device): static
    {
        $this->name_device = $name_device;

        return $this;
    }
    public function getVideos(): ?array
    {
        return $this->videos;
    }

    public function addVideo(string $video): static
    {
        $this->videos[] = $video;
        return $this;
    }


    public function getDevices(): ?array
    {
        return $this->devices;
    }

    public function addDevices(string $device): static
    {
        $this->devices = array_push($this->devices, $device);
        return $this;
    }
}