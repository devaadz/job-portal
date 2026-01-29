<?php

namespace App\Services;

use App\Models\Application;

class ScreeningService
{
    /**
     * Screen an application based on skill matching
     *
     * @param Application $application
     * @return string - 'match', 'partial', or 'not_match'
     */
    public function screenApplication(Application $application): string
    {
        $applicantSkills = $application->applicant->skills->pluck('id')->toArray();
        $jobSkills = $application->job->skills->pluck('id')->toArray();

        if (empty($jobSkills)) {
            return 'match';
        }

        if (empty($applicantSkills)) {
            return 'not_match';
        }

        // Count matching skills
        $matchingSkills = array_intersect($applicantSkills, $jobSkills);
        $matchCount = count($matchingSkills);
        $requiredCount = count($jobSkills);

        if ($matchCount === $requiredCount) {
            return 'match';
        } elseif ($matchCount > 0) {
            return 'partial';
        } else {
            return 'not_match';
        }
    }

    /**
     * Get skill matching percentage
     *
     * @param Application $application
     * @return float - Percentage from 0 to 100
     */
    public function getMatchingPercentage(Application $application): float
    {
        $applicantSkills = $application->applicant->skills->pluck('id')->toArray();
        $jobSkills = $application->job->skills->pluck('id')->toArray();

        if (empty($jobSkills)) {
            return 100.0;
        }

        $matchingSkills = array_intersect($applicantSkills, $jobSkills);
        return round((count($matchingSkills) / count($jobSkills)) * 100, 2);
    }
}
