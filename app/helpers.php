<?php

use App\Models\ActivityLog;

function logActivity($description) {
    $activityLog = new ActivityLog;
    $activityLog->user_id = auth()->user()->id;
    $activityLog->description = $description;
    $activityLog->save();
}
