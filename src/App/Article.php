<?php
namespace App;

class Article
{

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $content;

    /**
     * @var string
     */
    private string $slug;

    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->title = "";
        $this->content = "";
        $this->createSlug();
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
        $this->createSlug();
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    private function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    private function createSlug(): void
    {
        $this->setSlug(preg_replace('/\s+/', "_", $this->title));
        $this->setSlug(preg_replace('/[^\w]+/', "", $this->slug));
        $this->setSlug(trim($this->slug, "_"));
    }

}