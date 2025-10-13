<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    /**
     * Imposta il nome della tabella associata al modello.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
     * Disabilita i campi timestamp (created_at, updated_at) poiché la tabella 'jobs' non li utilizza.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * I campi che possono essere manipolati in massa.
     * Adatta i campi alla struttura "jobs" se necessario.
     *
     * @var array
     */
    protected $fillable = [
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at',
    ];

    protected $casts = [
        'payload' => 'array'
    ];

    public static function getJobs($className)
    {
        $jobs = [];
        foreach(self::orderBy('created_at')->get() as $job){
            $payload = $job->payload;
            if (Arr::get($payload, 'displayName') == $className){
                $jobs[] = $job;
            }
        }
        return $jobs;
    }

    public static function getTrackedJob($className){
        $jobInQueue = self::getJobs($className);
        $job = null;
        if (count($jobInQueue)) {
            $job = $jobInQueue[0];
        }
        $trackedJob = null;
        if ($job) {
            $trackedJob = $job->tracked_job;
        }
        self::clearTrackedJob($className);
        return $trackedJob;
    }

    public function getJobIdAttribute(){
        return unserialize(Arr::get($this->payload, 'data.command'))->jobId ?? null;
    }

    public function getTrackedJobAttribute(){

        if ($this->job_id){
            return TrackedJob::where('job_id', $this->job_id)->first();
        }
        return null;
    }

    public static function clearTrackedJob($className): void
    {
        $jobIds = [];
        $jobs = self::getJobs($className);
        foreach($jobs as $job){
            $jobIds[] = $job->job_id;
        }
        TrackedJob::whereNotIn('job_id', $jobIds)->delete();
    }

}