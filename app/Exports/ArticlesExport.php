<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArticlesExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct(protected Collection $articles, protected array $summary)
    {
    }

    public function sheets(): array
    {
        return [
            new SummarySheet($this->summary),
            new ArticlesSheet($this->articles),
        ];
    }
}
