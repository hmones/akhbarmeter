<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SummarySheet implements FromArray, WithTitle, WithHeadings
{
    public function __construct(protected array $summary)
    {
    }

    public function array(): array
    {
        $summary = [];
        foreach ($this->summary as $question => $options) {
            foreach ($options as $option => $publishersCount) {
                foreach ($publishersCount as $publisherName => $count) {
                    $summary[] = compact('question', 'option', 'publisherName', 'count');
                }
            }
        }

        return $summary;
    }

    public function headings(): array
    {
        return [
            'Question',
            'Option',
            'NewsPaper',
            'Number of articles',
        ];
    }

    public function title(): string
    {
        return 'Overview';
    }
}
