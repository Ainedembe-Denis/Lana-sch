<?php

namespace App\Console\Commands;

use App\Models\Frontend;
use App\Models\GeneralSetting;
use Illuminate\Console\Command;

class SeedAnnualProgramBookSlots extends Command
{
    protected $signature = 'annual-program:seed-book-slots {--force : Replace existing rows}';
    protected $description = 'Seed default "Book a slot" rows for the Annual Program table';

    public function handle()
    {
        $template = GeneralSetting::first()->active_template ?? 'basic';

        $rows = [
            ['level' => 'Level A1', 'exam_type' => 'ÖSD A1', 'color_class' => 'orange', 'book_url' => '#'],
            ['level' => 'Level A1', 'exam_type' => 'Goethe Zertifikat A1', 'color_class' => 'blue', 'book_url' => '#'],
            ['level' => 'Level A2', 'exam_type' => 'ÖSD A2', 'color_class' => 'orange', 'book_url' => '#'],
            ['level' => 'Level A2', 'exam_type' => 'Goethe Zertifikat A2', 'color_class' => 'blue', 'book_url' => '#'],
            ['level' => 'Level B1', 'exam_type' => 'ÖSD B1', 'color_class' => 'orange', 'book_url' => '#'],
            ['level' => 'Level B1', 'exam_type' => 'Goethe Zertifikat B1', 'color_class' => 'blue', 'book_url' => '#'],
            ['level' => 'Level B1', 'exam_type' => 'Telc B1', 'color_class' => 'green', 'book_url' => '#'],
            ['level' => 'Level B2', 'exam_type' => 'ÖSD B2', 'color_class' => 'orange', 'book_url' => '#'],
            ['level' => 'Level B2', 'exam_type' => 'Goethe Zertifikat B2', 'color_class' => 'blue', 'book_url' => '#'],
            ['level' => 'Level B2', 'exam_type' => 'Telc B2', 'color_class' => 'green', 'book_url' => '#'],
            ['level' => 'Level B2', 'exam_type' => 'Test-DaF', 'color_class' => 'purple', 'book_url' => '#'],
            ['level' => 'Level C1', 'exam_type' => 'ÖSD C1', 'color_class' => 'orange', 'book_url' => '#'],
            ['level' => 'Level C1', 'exam_type' => 'Goethe Zertifikat C1', 'color_class' => 'blue', 'book_url' => '#'],
            ['level' => 'Level C1', 'exam_type' => 'Telc C1', 'color_class' => 'green', 'book_url' => '#'],
            ['level' => 'Level C1', 'exam_type' => 'Telc-Hochschule', 'color_class' => 'gray', 'book_url' => '#'],
            ['level' => 'Level C1', 'exam_type' => 'Test-DaF C1', 'color_class' => 'purple', 'book_url' => '#'],
        ];

        $existing = Frontend::where('data_keys', 'annual_program.element')
            ->where('tempname', $template)
            ->count();

        if ($existing > 0) {
            $this->warn("Annual Program already has {$existing} book slot rows. Run with --force to replace.");
            if (!$this->option('force')) {
                return 0;
            }
            Frontend::where('data_keys', 'annual_program.element')
                ->where('tempname', $template)
                ->delete();
        }

        foreach ($rows as $row) {
            $frontend = new Frontend();
            $frontend->data_keys = 'annual_program.element';
            $frontend->tempname = $template;
            $frontend->data_values = $row;
            $frontend->slug = '';
            $frontend->save();
        }

        $this->info('Seeded ' . count($rows) . ' book slot rows for Annual Program.');
        return 0;
    }
}
