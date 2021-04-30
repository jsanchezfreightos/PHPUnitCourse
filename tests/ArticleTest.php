<?php


use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new Article;
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->getTitle());
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }
    /*
        public function testSlugHasSpacesReplacedByUnderscores()
        {
            $this->article->setTitle("An example article");
            $this->assertEquals($this->article->getSlug(), "An_example_article");
        }

        public function testSlugHasWhiteSpaceReplacedBySingleUnderscore()
        {
            $this->article->setTitle("An    example  \n  article");
            $this->assertEquals($this->article->getSlug(), "An_example_article");
        }

        public function testSlugDoesNotStartOrEndWithAnUnderscore()
        {
            $this->article->setTitle(" An    example  \n  article ");
            $this->assertEquals($this->article->getSlug(), "An_example_article");
        }

        public function testSlugDoesNotHaveAnyNonWordCharacters()
        {
            $this->article->setTitle(" An    example!  \n  article& ");
            $this->assertEquals($this->article->getSlug(), "An_example_article");
        }
    */

    public function titleProvider()
    {
        return [
            "Slug Has Spaces Replaced By Underscores" => ["An example article", "An_example_article"],
            "Slug Has White Space Replaced By Single Underscore" => ["An    example  \n  article", "An_example_article"],
            "Slug Does Not Start Or End With An Underscore" => [" An    example  \n  article ", "An_example_article"],
            "Slug Does Not Have Any Non Word Characters" => [" An    example!  \n  article& ", "An_example_article"]
        ];
    }

    /**
     * @dataProvider titleProvider
     * @param string $title
     * @param string $slug
     */
    public function testSlug(string $title, string $slug)
    {
        $this->article->setTitle($title);
        $this->assertEquals($this->article->getSlug(), $slug);
    }
}