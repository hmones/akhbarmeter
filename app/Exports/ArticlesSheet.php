<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class ArticlesSheet implements FromCollection, WithTitle, WithMapping, WithHeadings
{
    public function __construct(protected Collection $articles)
    {
    }

    public function collection(): Collection
    {
        return $this->articles;
    }

    public function map($row): array
    {
        return [
            'id'          => $row->id,
            'title'       => $row->title,
            'created_at'  => $row->created_at,
            'score'       => $row->review->score ?? "No Review",
            'score_1'     => $row->review->score_1 ?? "No Review",
            'score_2'     => $row->review->score_2 ?? "No Review",
            'score_3'     => $row->review->score_3 ?? "No Review",
            'publisher'   => $row->publisher->name,
            'type'        => $row->type->title ?? "No type",
            'topic'	      => $row->topic->title ?? "No topic",
            'reviewed_by' => $row->user->name ?? "No user",
            'author'      => $row->author ?? "No Author",
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'Title',
            'Article created at',
            'Overall score',
            'Professionalism score',
            'Credibility score',
            'Human Rights score',
            'Newspaper',
            'Type',
            'Topic',
            'Reviewed by',
            'Article author',
        ];
    }

    public function title(): string
    {
        return 'Articles';
    }
}
