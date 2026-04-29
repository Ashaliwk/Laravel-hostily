<?php

namespace App\Services;

use App\Models\backend\Reviews;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ReviewInsightService
{
    public function summarizeCollection(Collection $reviews): array
    {
        $sentiments = [
            'positive' => $reviews->where('sentiment', 'positive')->count(),
            'mixed' => $reviews->where('sentiment', 'mixed')->count(),
            'negative' => $reviews->where('sentiment', 'negative')->count(),
        ];

        $issues = $reviews->pluck('summary')
            ->filter()
            ->flatMap(fn ($summary) => preg_split('/[,.]/', (string) $summary))
            ->map(fn ($issue) => trim((string) $issue))
            ->filter(fn ($issue) => Str::length($issue) > 8)
            ->countBy()
            ->sortDesc()
            ->take(3)
            ->keys()
            ->values();

        return [
            'total' => $reviews->count(),
            'average_rating' => round((float) $reviews->avg('rating'), 1),
            'sentiments' => $sentiments,
            'top_issues' => $issues,
        ];
    }

    public function analyzeText(string $text, ?GeminiHotelAssistantService $assistant = null): array
    {
        $analysis = $assistant?->analyzeReview($text);

        if (is_array($analysis) && ! empty($analysis['sentiment'])) {
            return [
                'sentiment' => $analysis['sentiment'],
                'summary' => $analysis['summary'] ?? Str::limit($text, 140),
            ];
        }

        $lower = Str::lower($text);
        $positiveTerms = ['great', 'excellent', 'clean', 'friendly', 'amazing', 'comfortable', 'perfect', 'love'];
        $negativeTerms = ['slow', 'bad', 'dirty', 'poor', 'late', 'noise', 'noisy', 'issue', 'problem'];

        $positiveHits = collect($positiveTerms)->filter(fn ($term) => Str::contains($lower, $term))->count();
        $negativeHits = collect($negativeTerms)->filter(fn ($term) => Str::contains($lower, $term))->count();

        $sentiment = match (true) {
            $positiveHits > $negativeHits => 'positive',
            $negativeHits > $positiveHits => 'negative',
            default => 'mixed',
        };

        return [
            'sentiment' => $sentiment,
            'summary' => Str::limit(trim($text), 140),
        ];
    }
}
