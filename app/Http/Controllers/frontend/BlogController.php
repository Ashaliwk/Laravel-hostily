<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\BlogModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = $this->publishedBlogs();

        return view('frontend.blogindex', compact('blogs'));
    }

    public function show(string $slug)
    {
        $blogs = $this->publishedBlogs();
        $blog = $blogs->firstWhere('slug', $slug);

        abort_if(! $blog, 404);

        $relatedBlogs = $blogs->where('slug', '!=', $slug)->take(3)->values();

        return view('frontend.blogdetails', compact('blog', 'relatedBlogs'));
    }

    private function publishedBlogs(): Collection
    {
        $dbBlogs = BlogModel::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->get();

        if ($dbBlogs->isNotEmpty()) {
            return $dbBlogs->map(function ($blog) {
                $blog->title = $blog->title ?: Str::headline($blog->name ?: 'Hostily Journal');
                $blog->slug = $blog->slug ?: Str::slug($blog->title . '-' . $blog->id);
                $blog->excerpt = $blog->excerpt ?: Str::limit(strip_tags((string) ($blog->content ?: $blog->message)), 140);
                $blog->content = $blog->content ?: nl2br(e((string) ($blog->message ?: $blog->excerpt)));
                $blog->image = $blog->image ?: 'assets/img/blog/blog-1.jpg';
                $blog->read_time = $blog->read_time ?: '4 min read';
                $blog->category = $blog->category ?: 'Hotel Guide';
                $blog->published_at = $blog->published_at ?: $blog->created_at;

                return $blog;
            });
        }

        return collect([
            (object) [
                'id' => 1,
                'title' => 'How to Choose the Best Hotel Deal for a Weekend Stay',
                'slug' => 'best-hotel-deal-weekend-stay',
                'category' => 'Travel Tips',
                'excerpt' => 'A quick guide to balancing price, location, amenities, and flexible booking terms before you commit.',
                'content' => 'The best hotel deals are rarely just the lowest price. For a short stay, focus on location, included breakfast, cancellation flexibility, and the amenities you will actually use. Hostily recommends comparing the total value of a room rather than the nightly rate alone. A room with Wi-Fi, breakfast, and airport transfer often saves more than a cheaper option with add-on fees. When you book early and keep your dates flexible, you give yourself far more choices.',
                'image' => 'assets/img/blog/blog-1.jpg',
                'read_time' => '4 min read',
                'published_at' => Carbon::parse('2026-04-15'),
            ],
            (object) [
                'id' => 2,
                'title' => 'Five Hotel Amenities Guests Actually Remember',
                'slug' => 'hotel-amenities-guests-remember',
                'category' => 'Guest Experience',
                'excerpt' => 'Guests remember comfort details more than flashy promises. Here are the amenities that keep earning repeat bookings.',
                'content' => 'Clean rooms, fast Wi-Fi, responsive service, a good breakfast, and easy parking still win. These are the details that reduce friction and make a stay feel effortless. At Hostily, those basics are paired with thoughtful extras like concierge help, airport transfers, and room options for different budgets. The result is a stay that feels reliable from arrival to checkout.',
                'image' => 'assets/img/blog/blog-2.jpg',
                'read_time' => '3 min read',
                'published_at' => Carbon::parse('2026-04-09'),
            ],
            (object) [
                'id' => 3,
                'title' => 'What Families Should Check Before Booking a Room',
                'slug' => 'family-room-booking-checklist',
                'category' => 'Family Travel',
                'excerpt' => 'A family booking works best when room capacity, bed setup, meal plans, and nearby services line up before arrival.',
                'content' => 'Families should confirm capacity, bed layout, breakfast options, and whether there is easy access to parking, play areas, and late-night food. If you are traveling with children, choosing a room with enough space matters more than squeezing into a lower nightly rate. Hostily family rooms are designed to make those longer stays easier, with meal plans and service support built in.',
                'image' => 'assets/img/blog/blog-3.jpg',
                'read_time' => '5 min read',
                'published_at' => Carbon::parse('2026-04-03'),
            ],
        ]);
    }
}
