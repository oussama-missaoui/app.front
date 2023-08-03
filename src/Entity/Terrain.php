<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: TerrainRepository::class)]
#[Vich\Uploadable]
class Terrain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $dimension = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[Vich\UploadableField(mapping: 'Terrains', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string')]
    private ?string $imageName = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'terrain', targetEntity: RendezVous::class)]
    private Collection $RendezVousid;

    #[ORM\Column]
    private ?int $capacite = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    public function __construct()
    {
        $this->RendezVousid = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    public function setDimension(string $dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }



    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezVousid(): Collection
    {
        return $this->RendezVousid;
    }

    public function addRendezVousid(RendezVous $rendezVousid): self
    {
        if (!$this->RendezVousid->contains($rendezVousid)) {
            $this->RendezVousid->add($rendezVousid);
            $rendezVousid->setTerrain($this);
        }

        return $this;
    }

    public function removeRendezVousid(RendezVous $rendezVousid): self
    {
        if ($this->RendezVousid->removeElement($rendezVousid)) {
            // set the owning side to null (unless already changed)
            if ($rendezVousid->getTerrain() === $this) {
                $rendezVousid->setTerrain(null);
            }
        }

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

}
