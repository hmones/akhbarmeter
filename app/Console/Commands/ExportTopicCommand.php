<?php

namespace App\Console\Commands;

use App\Models\TeamMember;
use App\Models\Topic;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ExportTopicCommand extends Command
{
    protected $signature = 'email:topic-export';
    protected $description = 'temp command to export topic data';

    public function handle(): void
    {
        $filename = 'topics_export_' . now()->format('Ymd_His') . '.csv';
        $path = 'uploades/' . $filename;
        $csvData = "id,team_member_id,title\n";
        Topic::select('id', 'team_member_id','title')
            ->chunk(100, function ($topics) use (&$csvData) {
                foreach ($topics as $topic) {
                    $csvData .= "{$topic->id},{$topic->team_member_id},{$topic->title}\n";
                }
            });
        Storage::put($path, $csvData, 'public');
        try {
//            Mail::raw('Please find the exported topics data attached.', function ($message) use ($path, $filename) {
//                $message->to(TeamMember::find(1)->email)
//                    ->bcc(TeamMember::find(12)->email)
//                    ->subject('Topics Data Export')
//                    ->attachData(Storage::get($path), [
//                        'as' => $filename,
//                        'mime' => 'text/csv',
//                    ]);
//            });
//            Mail::raw('Please find the exported topics data attached.', function ($message) use ($path, $filename) {$message->to(TeamMember::find(1)->email)->bcc(TeamMember::find(12)->email)->subject('Topics Data Export')->attachData(Storage::get('uploades/topics_export_20250511_183623.csv'), $filename, ['mime' => 'text/csv']);});

            $this->info('CSV file has been exported and emailed successfully.');
            Storage::delete($path);
        } catch (Exception $e) {
            $this->error('Failed to send email: ' . $e->getMessage());
            Storage::delete($path);
        }
    }
}
