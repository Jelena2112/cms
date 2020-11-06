<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{

    const STATUS_ACTIVE = 'active';
    const STATUS_DELETED = 'deleted';
    const STATUS_PENDING = 'pending';

    const ACTION_CREATED = 'created';
    const ACTION_DELETED = 'deleted';
    const ACTION_EDITED = 'edited';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=64)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @var string
     * @ORM\Column (type="string", length=36)
     */
    private $author;

    /**
     * @var \DateTime
     * @ORM\Column (type="datetime", name="created_on")
     */
    private $createdOn;

    /**
     * @var string
     * @ORM\Column (type="string", length=20)
     */
    private $status;

    /**
     * @var string
     * @ORM\Column (type="string", length=20, name="last_action")
     */
    private $lastAction;

    /**
     * @var \DateTime
     * @ORM\Column (type="datetime", name="last_action_date")
     */
    private $lastActionDate;

    /**
     * @return \DateTime
     */
    public function getLastActionDate(): \DateTime
    {
        return $this->lastActionDate;
    }

    /**
     * @param \DateTime $lastActionDate
     */
    public function setLastActionDate(\DateTime $lastActionDate): void
    {
        $this->lastActionDate = $lastActionDate;
    }

    /**
     * @return string
     */
    public function getLastAction(): string
    {
        return $this->lastAction;
    }

    /**
     * @param string $lastAction
     */
    public function setLastAction(string $lastAction): void
    {
        $this->lastAction = $lastAction;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn(): \DateTime
    {
        return $this->created_on;
    }

    /**
     * @param \DateTime $created_on
     */
    public function setCreatedOn(\DateTime $created_on): void
    {
        $this->created_on = $created_on;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }
}
