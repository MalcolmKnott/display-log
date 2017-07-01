<?php

namespace Malcolmknott\Displaylog;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisplayLogController extends Controller
{
    private $css_map;

    public function __construct()
    {
        $this->css_map = [
            'DEBUG:'        => 'info',
            'INFO:'         => 'success',
            'NOTICE:'       => 'info',
            'WARNING:'      => 'warning',
            'ERROR:'        => 'danger',
            'CRITICAL:'     => 'danger',
            'ALERT:'        => 'danger',
            'EMERGENCY:'    => 'danger',
        ];
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $lines = [];
        $css_map = $this->css_map;

        if(Storage::disk('storage')->exists('/logs/laravel.log')) {

            $log = collect(explode(PHP_EOL, Storage::disk('storage')->get('/logs/laravel.log')));

            $lines = $log->filter(function ($line){
                return starts_with($line, '[');
            })->map(function ($line) {
                return collect(explode(' ', $line, 4));
            })->each(function ($line) {
                $line['status'] = collect(explode('.', $line[2]))->last();
            })->reverse();

        }

        return view('displaylog::log.show', compact('lines', 'css_map'));
    }
}
