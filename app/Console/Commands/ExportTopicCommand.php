<?php

namespace App\Console\Commands;

use App\Models\TeamMember;
use App\Models\Topic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ExportTopicCommand extends Command
{
    protected $signature = 'email:topic-export';
    protected $description = 'temp command to export topic data';

    public function handle()
    {
        $filename = 'topics_export_' . now()->format('Ymd_His') . '.csv';
        $path = 'exports/' . $filename;

        $csvData = "id,team_member_id\n";

        // Fetch topics and append to CSV data
        Topic::select('id', 'team_member_id')
            ->chunk(100, function ($topics) use (&$csvData) {
                foreach ($topics as $topic) {
                    $csvData .= "{$topic->id},{$topic->team_member_id}\n";
                }
            });

        Storage::disk(config('filesystems.default'))->put($path, $csvData);
        try {
            Mail::raw('Please find the exported topics data attached.', function ($message) use ($path, $filename) {
                $message->to(TeamMember::find(1))
                    ->bcc(TeamMember::find(12))
                    ->subject('Topics Data Export')
                    ->attach(Storage::disk(config('filesystems.default'))->path($path), [
                        'as' => $filename,
                        'mime' => 'text/csv',
                    ]);
            });

            $this->info('CSV file has been exported and emailed successfully.');
            Storage::delete($path);
        } catch (\Exception $e) {
            $this->error('Failed to send email: ' . $e->getMessage());
            // Clean up in case of failure
            Storage::delete($path);
        }
    }
}
