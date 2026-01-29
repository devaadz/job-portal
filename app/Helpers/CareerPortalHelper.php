<?php

/**
 * Career Portal MVP - Configuration Helper
 * 
 * Helper functions and constants used throughout the application
 */

// User Roles
const ROLE_ADMIN = 'admin';
const ROLE_APPLICANT = 'applicant';

// Application Status
const STATUS_APPLIED = 'applied';
const STATUS_SCREENING = 'screening';
const STATUS_INTERVIEW = 'interview';
const STATUS_ACCEPTED = 'accepted';
const STATUS_REJECTED = 'rejected';

const APPLICATION_STATUSES = [
    'applied' => 'Melamar',
    'screening' => 'Screening',
    'interview' => 'Interview',
    'accepted' => 'Diterima',
    'rejected' => 'Ditolak',
];

// Screening Results
const SCREENING_MATCH = 'match';
const SCREENING_PARTIAL = 'partial';
const SCREENING_NOT_MATCH = 'not_match';

const SCREENING_RESULTS = [
    'match' => 'Cocok Semua',
    'partial' => 'Sebagian Cocok',
    'not_match' => 'Tidak Cocok',
];

// Application Steps
const STEP_SCREENING = 'screening';
const STEP_INTERVIEW = 'interview';
const STEP_FINAL = 'final';

const APPLICATION_STEPS = [
    'screening' => 'Screening',
    'interview' => 'Interview',
    'final' => 'Final',
];

/**
 * Get status label in Indonesian
 */
function getStatusLabel($status) {
    return APPLICATION_STATUSES[$status] ?? $status;
}

/**
 * Get screening result label in Indonesian
 */
function getScreeningResultLabel($result) {
    return SCREENING_RESULTS[$result] ?? $result;
}

/**
 * Check if user is admin
 */
function isAdmin($user = null) {
    $user = $user ?? auth()->user();
    return $user && $user->role === ROLE_ADMIN;
}

/**
 * Check if user is applicant
 */
function isApplicant($user = null) {
    $user = $user ?? auth()->user();
    return $user && $user->role === ROLE_APPLICANT;
}

/**
 * Format work duration from dates
 */
function formatWorkDuration($startMonth, $startYear, $endMonth, $endYear) {
    $months = ($endYear - $startYear) * 12 + ($endMonth - $startMonth);
    $years = floor($months / 12);
    $remainingMonths = $months % 12;

    if ($years > 0 && $remainingMonths > 0) {
        return "{$years} tahun {$remainingMonths} bulan";
    } elseif ($years > 0) {
        return "{$years} tahun";
    } else {
        return "{$remainingMonths} bulan";
    }
}

/**
 * Get matching percentage
 */
function getMatchPercentage($matchingCount, $requiredCount) {
    if ($requiredCount === 0) {
        return 100;
    }
    return round(($matchingCount / $requiredCount) * 100, 2);
}
