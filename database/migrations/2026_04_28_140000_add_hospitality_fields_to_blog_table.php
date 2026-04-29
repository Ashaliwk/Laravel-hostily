<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('slug')->nullable()->unique()->after('title');
            $table->string('category')->nullable()->after('slug');
            $table->text('excerpt')->nullable()->after('category');
            $table->longText('content')->nullable()->after('excerpt');
            $table->string('image')->nullable()->after('content');
            $table->string('read_time')->nullable()->after('image');
            $table->boolean('is_published')->default(true)->after('read_time');
            $table->timestamp('published_at')->nullable()->after('is_published');
        });
    }

    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn([
                'title',
                'slug',
                'category',
                'excerpt',
                'content',
                'image',
                'read_time',
                'is_published',
                'published_at',
            ]);
        });
    }
};
