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
    #[MongoDB\Field(type: 'string')]
    private ?string $id_device;
    #[MongoDB\Field(type: 'string')]
    private ?string $name_device;
    #[MongoDB\Field(type: 'collection')]
    private ?string $videos;

    public function getIdDevice(): ?string
    {
        return $this->id_device;
    }

    public function setIdDevice(string $id_device): static
    {
        $this->id_device = $id_device;

        return $this;
    }

    public function getNameDevice(): ?string
    {
        return $this->name_device;
    }

    public function setNameDevice(string $name_device): static
    {
        $this->name_device = $name_device;

        return $this;
    }
    public function getVideos(): ?array
    {
        return $this->videos;
    }

    public function setVideos(array $videos): static
    {
        $this->videos = $videos;
        return $this;
    }

    public function addVideo(string $video): static
    {
        $this->videos[] = $video;
        return $this;
    }
}