<?php

namespace Helmab\TransMessage\Commands;

use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TransMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helmab:trans-message
                            {trans_text : Text need to translate.}
                            {source=en : Translate from English.}
                            {target=km : Translate to Khmer.}
                            {format? : The format of the translation result.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A simple translate laravel command.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $tr = new GoogleTranslate();
            $tr->setSource($this->argument('source'));
            $tr->setTarget($this->argument('target'));
            $trans_text = trim($this->argument('trans_text'));
            $result = $tr->translate($trans_text);
            $format = $this->argument('format');
            if (isset($format)) {
                switch ($format) {
                    case 'error':
                        return dump([
                            'message_' . $this->argument('source') => $trans_text,
                            'message_' . $this->argument('target') => $result,
                        ]);
                        break;
                    default:
                        break;
                }
            }
            $this->table(["Result"], [
                [$trans_text],
                [$result],
            ]);
        } catch (\Exception $exception) {
            $this->error("😭 Failed : " . $exception->getMessage());
        }
    }
}
