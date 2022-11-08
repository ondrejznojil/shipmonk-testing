<?php declare(strict_types = 1);

namespace App\Api\Controller\FindBoxSize;

class InputValidator
{

    public function __construct(
        private readonly \Nette\Schema\Processor $schemaProcessor,
    ) {}

    public function validate(array $data): void
    {
        $this->schemaProcessor->process($this->getSchema(), $data);
    }

    private function getSchema(): \Nette\Schema\Schema
    {
        return \Nette\Schema\Expect::structure([
            'items' => \Nette\Schema\Expect::arrayOf(\Nette\Schema\Expect::structure([
                'width' => \Nette\Schema\Expect::float(),
                'height' => \Nette\Schema\Expect::float(),
                'length' => \Nette\Schema\Expect::float(),
                'weight' => \Nette\Schema\Expect::float(),
            ])),
        ]);
    }

}
