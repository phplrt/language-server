<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\DescriptionFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\NativeTypeFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\PhpDocFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\SnakeCaseFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\TraitsFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\UpperSnakeCaseFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\TagFilterCallback;
use Phplrt\LanguageServer\CodeGenerator\Target\Twig\PhpDocTypeFilterCallback;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

/**
 * @template TContext of Statement
 */
abstract class CodeGenerator implements CodeGeneratorInterface
{
    /**
     * @var non-empty-string
     */
    protected const DEFAULT_TEMPLATE_PATHNAME = __DIR__ . '/../resources';

    /**
     * @param array<array-key, Statement> $types
     * @param TContext $ctx
     */
    public function __construct(
        protected readonly array $types,
        protected readonly Statement $ctx,
    ) {
    }

    /**
     * @param non-empty-string $template
     * @param array<non-empty-string, mixed> $args
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    protected function render(string $template, array $args = []): string
    {
        $environment = new Environment(new FilesystemLoader(
            static::DEFAULT_TEMPLATE_PATHNAME,
        ));

        $environment->addFilter(new TwigFilter(
            name: 'description',
            callable: new DescriptionFilterCallback(),
        ));

        $environment->addFilter(new TwigFilter(
            name: 'tag',
            callable: new TagFilterCallback(),
        ));

        $environment->addFilter(new TwigFilter(
            name: 'phpdoc_type',
            callable: new PhpDocTypeFilterCallback($this->types),
        ));

        $environment->addFilter(new TwigFilter(
            name: 'type',
            callable: new NativeTypeFilterCallback($this->types),
        ));

        $environment->addFilter(new TwigFilter(
            name: 'to_snake_case',
            callable: new SnakeCaseFilterCallback(),
        ));

        $environment->addFilter(new TwigFilter(
            name: 'to_upper_snake_case',
            callable: new UpperSnakeCaseFilterCallback(),
        ));

        $environment->addFilter(new TwigFilter(
            name: 'phpdoc',
            callable: new PhpDocFilterCallback(),
        ));

        return $environment->render($template, \array_merge([
            'ctx' => $this->ctx
        ], $args));
    }
}
